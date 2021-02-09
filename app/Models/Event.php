<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'description', 'picture_path', 'date_start', 'date_end', 'location', 'group_id'];

    /**
     * Get the participants of the event
     */
    public function users()
    {
        $parts = Participation::where('event_id', $this->id)->get();
        $users = [];
        //  TODO : single request
        foreach ($parts as $p) {
            $users[] = User::find($p->user_id);
        }
        return $users;
    }
}
