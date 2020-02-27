<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
 * @mixin Model
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','fname', 'lname', 'bdate', 'email', 'password', 'country',
        'city', 'zip', 'street', 'numstreet', 'phone', 'picrepo', 'picname',
        'isadmin', 'defaultnotif', 'typenotif'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'isadmin', 'defaultnotif', 'typenotif'
    ];



    /**
     * Add a mutator to ensure hashed passwords
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
