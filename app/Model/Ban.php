<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    protected $fillable = [
        'id',
        'banisher',
        'banned',
        'date',
        'isread',
        'importance',
        'description',
    ];
}
