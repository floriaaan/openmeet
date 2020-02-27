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

}
