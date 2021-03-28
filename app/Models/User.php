<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Faker\Generator;
use Faker\Factory;

class User extends Authenticatable
{
    
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'spotlight_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    protected static function boot()
    {
        parent::boot();

        // auto-sets values on creation
        static::creating(function ($query) {
            $faker = Factory::create();
            $query->spotlight_token = $faker->word();
        });
    }


    /**
     * Get the groups of the user.
     */
    public function groups()
    {
        $subs = Subscription::where('user_id', $this->id)->get();
        $groups = [];
        //  TODO : single request
        foreach ($subs as $sub) {
            $groups[] = Group::find($sub->group_id);
        }
        return $groups;
    }

    /**
     * Get groups where the user is admin.
     */
    public function groups_admin()
    {
        return Group::where('admin_id', $this->id)->get();
    }

    public function participating_events_incoming() {
        $participations = Participation::where('user_id', $this->id)->get();

        $incoming_events = [];
        foreach($participations as $part) {
            
        }
    }
}
