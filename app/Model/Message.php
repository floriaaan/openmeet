<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    protected $fillable = [
        'id',
        'date',
        'content',
        'receiver',
        'sender',
        'isread',
        'forgroup',
    ];



    public function create()
    {
        //
    }


    public function show()
    {
        //
    }


    public function edit()
    {
        //
    }

    public function delete()
    {
        //
    }
}
