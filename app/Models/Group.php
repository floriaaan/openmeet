<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'admin_id', 'users', 'picture_path', 'description', 'tags'
    ];


    /**
     * Get the admin of the group
     */
    public function admin()
    {
        return User::find($this->admin_id);
    }

    /**
     * Get the users of the group
     */
    public function users()
    {
        $subs = Subscription::where('group_id', $this->id)->get();
        $users = [];
        //  TODO : single request
        foreach ($subs as $sub) {
            $users[] = User::find($sub->user_id);
        }
        return $users;
    }

    /**
     * Get the events of the group, sorted by incoming 
     */
    public function events()
    {
        $incoming = Event::where('group_id', $this->id)
            ->where('date_start', ">=", new DateTime())->orderBy("date_start", "ASC")->get();

        $past = Event::where('group_id', $this->id)
            ->where('date_start', "<", new DateTime())->get();

        $events = $incoming;

        foreach ($past as $event) {
            $events[] = $event;
        }

        return $events;
    }
}