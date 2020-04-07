<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Alert extends Model
{
    protected $fillable = [
        'id',
        'title',
        'content',
        'link',
        'home',
        'group',
        'event',
        'groupList',
        'disabled',
    ];

    public function getOne($alertID)
    {
        $query = DB::table('alerts')
            ->select('*')
            ->where('id', $alertID)
            ->get();
        return $query;
    }

    public function getHome()
    {
        $query = DB::table('alerts')
            ->select('*')
            ->where('home', '=', 1)
            ->where('disabled', '=', 0)
            ->get();
        return $query;
    }

    public function getGroup()
    {
        $query = DB::table('alerts')
            ->select('*')
            ->where('group', '=', 1)
            ->where('disabled', '=', 0)
            ->get();
        return $query;
    }

    public function getEvent()
    {
        $query = DB::table('alerts')
            ->select('*')
            ->where('event', '=', 1)
            ->where('disabled', '=', 0)
            ->get();
        return $query;
    }

    public function getGroupList()
    {
        $query = DB::table('alerts')
            ->select('*')
            ->where('groupList', '=', 1)
            ->where('disabled', '=', 0)
            ->get();
        return $query;
    }

    public function toggleDisabled($alertID)
    {
        $alert = $this->getOne($alertID);
        if ($alert->disabled) {
            return $query = DB::table('alerts')
                ->where('id', $alertID)
                ->update(['disabled' => 0]);
        } else {
            return $query = DB::table('alerts')
                ->where('id', $alertID)
                ->update(['disabled' => 1]);
        }

    }
}
