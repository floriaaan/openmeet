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

    public function getOne($groupId)
    {
        $query  = DB::table('groups')
            ->select('*')
            ->where('id','=',$groupId)
            ->get();
        $queryresult=$query;

        return $queryresult;

    }

    public function updateAdmin ($groupId,$newAdmin)
    {
        $query=DB::table('groups')
            ->where('id','=',$groupId)
            ->update([
                'admin'=>$newAdmin
            ]);

    }

    public function delete()
    {
        $query=DB::table('groups')
            ->delete();
    }


}
