<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banish extends Model
{
    protected $fillable = [
        'id',
        'banished',
        'outcast',
        'date',
        'isread',
        'importance',
        'description',
    ];
}
