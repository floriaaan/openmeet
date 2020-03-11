<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ban extends Model
{
    protected $fillable = [
        'id',
        'banned',
        'banisher',
        'date',
        'description'
    ];

    public function getLimit($limit)
    {
        $query=DB::table('bans')
            ->select('*')
            ->limit($limit)
            ->get();


        return $query;

    }

    public function getCount()
    {
        $query=DB::table('bans')
            ->select('*')
            ->get();


        return $query->count();

    }
}
