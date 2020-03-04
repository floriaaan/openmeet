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
        'admin', //DANGER : pas le même que bdd
        'picrepo',
        'picname',
        'datecrea',
    ];


    public function AddGroup($name,$admin,$picrepo,$picname)
    {
        $group=DB::table('groups')
        ->insert([
            'name'=>$name,
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

        return $queryresult[0];

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

    public function getLimit($limit)
    {
        $query=DB::table('groups')
            ->select('*')
            ->limit($limit)
            ->get();


        return $query;

    }

    public function getCount()
    {
        $query=DB::table('groups')
            ->select('*')
            ->get();


        return $query->count();

    }


}
