<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ban extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'id',
        'banned',
        'banisher',
        'date',
        'description'
    ];

    public static function isBan($user, $group)
    {
        $query = Ban::where('banned', '=', $user)
            ->where('banisher', '=', $group)
            ->get();
        return $query->count() > 0;
    }


    public function getAll()
    {
        $query = DB::table('bans')
            ->select('*')
            ->get();

        $listBans = [];
        foreach ($query as $ban) {
            $listBans[] = $ban;
        }
        return $listBans;
    }


    public function getCount()
    {
        $query = DB::table('bans')
            ->select('*')
            ->get();


        return $query->count();
    }

    public function getCountGroup($groupId)
    {
        $query = DB::table('bans')
            ->select('*')
            ->where('banisher', $groupId)
            ->get();


        return $query->count();
    }

    public function getGroup($groupID)
    {
        $query = DB::table('bans')
            ->select('*')
            ->where('banisher', $groupID)
            ->get();
        return $query;
    }

    public function remove($banID)
    {
        try {
            $query = DB::table('bans')
                ->delete($banID);
            return true;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getLimitDesc($limit)
    { {
            $query = DB::table('bans')
                ->select('*')
                ->limit($limit)
                ->orderByDesc('id')
                ->get();


            return $query;
        }
    }

    public function getLimitGroupDesc($userID, $limit)
    {
        $query = DB::table('bans')
            ->select('*')
            ->where('banisher', $userID)
            ->limit($limit)
            ->orderByDesc('id')
            ->get();


        return $query;
    }

    public function getOne($banID)
    {
        $query = DB::table('bans')
            ->select('*')
            ->where('id', '=', $banID)
            ->limit(1)
            ->get();
        return $query[0];
    }
}
