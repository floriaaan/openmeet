<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Group extends Model
{

    protected $fillable = [
        'id',
        'user',
        'name',
        'admin',
        'picrepo',
        'picname',
        'datecrea',
    ];


    public function create($name,$userId,$admin,$picrepo,$picname)
    {
        $group=DB::table('groups')
        ->insert([
            'name'=>$name,
            'id_user'=>$userId,
            'admin'=>$admin,
            'picrepo'=>$picrepo,
            'picname'=>$picname,
            'datecrea'=>(date("Y-m-d H:i:s"))
        ]);
    }

    public function showOne($groupId)
    {
        $events  = DB::table('groups')
            ->select('*')
            ->where('id','=',$groupId)
            ->get();

    }

    public function showAll($userId)
    {
        $groups=DB::table('groups')
            ->select('*')
            ->where('id_user',"=",$userId)
            ->get();
        $groupsArray=$groups;
        $listgroups=[];
        foreach ($groupsArray as $groupSQL)
        {
            $listgroups[]=$groupSQL;
        }
        return $listgroups;
    }

    public function updateAdmin ($groupId,$admin)
    {
        $query=DB::table('groups')
            ->where('id','=',$groupId)
            ->update([
                'admin'=>$admin
            ]);

    }

    public function delete()
    {
        $query=DB::table('groups')
            ->delete();
    }


}
