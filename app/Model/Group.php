<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Group extends Model
{

    protected $fillable = [
        'id',
        'name',
        'admin',
        'picrepo',
        'picname',
        'datecreate',
        'desc',
        'tags'
    ];


    public function getOne($groupId)
    {
        $query = DB::table('groups')
            ->select('*')
            ->where('id', '=', $groupId)
            ->get();

        return $query[0];

    }

    public function updateAdmin($groupId, $newAdmin)
    {
        $query = DB::table('groups')
            ->where('id', '=', $groupId)
            ->update([
                'admin' => $newAdmin
            ]);

    }

    public function delete()
    {
        $query = DB::table('groups')
            ->delete();
    }

    public function getLimit($limit)
    {
        $query = DB::table('groups')
            ->select('*')
            ->limit($limit)
            ->get();


        return $query;

    }

    public function getCount()
    {
        $query = DB::table('groups')
            ->select('*')
            ->get();


        return $query->count();

    }

    public function getAll()
    {
        $query = DB::table('groups')
            ->select('*')
            ->get();

        $listGroup = [];
        foreach ($query as $group) {
            $listGroup[] = $group;
        }

        return $listGroup;
    }

    public function getByAdmin($userID) {
        $query = DB::table('groups')
            ->select('*')
            ->where('admin', '=', $userID)
            ->get();
        $listGroup = [];
        foreach ($query as $group) {
            $listGroup[] = $group;
        }

        return $listGroup;
    }

    public function getLike($str)
    {
        $query = DB::table('groups')
            ->select('*')
            ->where('name', 'LIKE', "%{$str}%")
            ->orWhere('desc', 'LIKE', "%{$str}%")
            ->orWhere('tags', 'LIKE', "%{$str}%")
            ->get();
        $listGroup = [];
        foreach ($query as $group) {
            $listGroup[] = $group;
        }

        return $listGroup;
    }

    public function getAdmin($groupID) {
        $query = DB::table('groups')
            ->select('*')
            ->where('id', $groupID)
            ->get();
        return (new User)->getOne($query[0]->admin);
    }

    public function getLastID() {
        $query = DB::table('groups')
            ->select('id')
            ->limit(1)
            ->orderByDesc('id')
            ->get();

        return $query[0];
    }

    public function getLimitDesc($limit)
    {
        $query=DB::table('groups')
            ->select('*')
            ->limit($limit)
            ->orderByDesc('id')
            ->get();


        return $query;
    }

}
