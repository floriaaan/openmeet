<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Signalement extends Model
{
    protected $fillable = [
        'id',
        'submitter',
        'concerned',
        'date',
        'isread',
        'importance',
        'description',
    ];

    public function getLimit($limit)
    {
        $query=DB::table('signalements')
            ->select('*')
            ->limit($limit)
            ->get();


        return $query;

    }

    public function getCount()
    {
        $query=DB::table('signalements')
            ->select('*')
            ->get();


        return $query->count();

    }

}
