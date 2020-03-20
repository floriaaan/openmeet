<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

/**
 * Class User
 * @package App
 * @mixin Model
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'fname', 'lname', 'bdate', 'email', 'country',
        'city', 'zip', 'street', 'numstreet', 'phone', 'picrepo', 'picname',
        'defaultnotif', 'typenotif', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'isadmin', 'defaultnotif', 'typenotif'
    ];


    /**
     * Add a mutator to ensure hashed passwords
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getOne($userId)
    {
        $query = DB::table('users')
            ->select('*')
            ->where('id', '=', $userId)
            ->limit(1)
            ->get();
        return $query[0];

    }

    public function isBan($userId,$groupId)
    {

        $query = DB::table('bans')
            ->select('*')
            ->where('banned', '=', $userId )
            ->where('banisher','=',$groupId)
            ->get();
        return $query->count() > 0;
    }

    public function isBlock($userId,$blockId)
    {

        $query = DB::table('bans')
            ->select('*')
            ->where('target', '=', $userId )
            ->where('blocker','=',$blockId)
            ->get();
        return $query->count() > 0;
    }




    public function getLimit($limit)
    {
        $query = DB::table('users')
            ->select('*')
            ->limit($limit)
            ->get();


        return $query;

    }

    public function getCount()
    {
        $query = DB::table('users')
            ->select('*')
            ->get();

        return $query->count();

    }

    public function getCountUserByGroup()
    {
        $query = DB::table('users')
            ->select('*')
            ->get();

        return $query->count();

    }


    public function getAll()
    {
        $query = DB::table('users')
            ->select('*')
            ->get();

        $listUser = [];
        foreach ($query as $user) {
            $listUser[] = $user;
        }
        return $listUser;
    }

    public function remove($userID)
    {
        try {
            $query = DB::table('users')
                ->delete($userID);
            return true;
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function getLike($str)
    {
        $query = DB::table('users')
            ->select('*')
            ->where('fname', 'LIKE', "%{$str}%")
            ->orWhere('lname', 'LIKE', "%{$str}%")
            ->orWhere('email', 'LIKE', "%{$str}%")
            ->orWhere('country', 'LIKE', "%{$str}%")
            ->orWhere('city', 'LIKE', "%{$str}%")
            ->get();
        $listUser = [];
        foreach ($query as $user) {
            $listUser[] = $user;
        }

        return $listUser;
    }

    public function getLimitDesc($limit)
    {
        $query=DB::table('users')
            ->select('*')
            ->limit($limit)
            ->orderByDesc('id')
            ->get();


        return $query;
    }

    public function updateUser($user) {

        DB::table('users')
            ->where('id', $user->id)
            ->update(['defaultnotif' => $user->defaultnotif]);

        DB::table('users')
            ->where('id', $user->id)
            ->update(['typenotif' => $user->typenotif]);

        DB::table('users')
            ->where('id', $user->id)
            ->update(['picname' => $user->picname]);

        DB::table('users')
            ->where('id', $user->id)
            ->update(['picrepo' => $user->picrepo]);
    }

}
