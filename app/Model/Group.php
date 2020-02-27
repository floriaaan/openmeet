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

    public function show()
    {
        $events  = DB::table('groups')
            ->select('*')
            ->where('id_user')
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

    public function edit ($groupsId)
    {
        $query=DB::table('groups')
            ->update($groupsId);
    }

    public function delete()
    {
        $query=DB::table('groups')
            ->delete();
    }

/*
    public function transfert($groupsId)
    {
        $query=DB::table('groups')
            ->
    }
*/
}
