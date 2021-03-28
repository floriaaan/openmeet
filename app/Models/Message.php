<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'sender_id', 'receiver_id', 'is_read'
    ];


    public static function contacted_users()
    {
        $users = [];
        $messages = Message::where('sender_id', auth()->id())
            ->orWhere('receiver_id', auth()->id())
            ->get();

        foreach ($messages as $message) {
            if ($message->sender_id == auth()->id()) {
                if(!in_array($message->receiver_id, $users)) {
                    $users[] = $message->receiver_id;
                }
            } else {
                if(!in_array($message->sender_id, $users)) {
                    $users[] = $message->sender_id;
                }
            }
        }

        return $users;
    }


    public static function conversation($user_id)
    {
        return Message::where('sender_id', auth()->id())
            ->where('receiver_id', $user_id)
            ->orWhere('sender_id', $user_id)
            ->where('receiver_id', auth()->id())
            ->orderBy('id', 'ASC')
            ->get();
    }

    public static function last($user_id)
    {
        return Message::where('sender_id', auth()->id())
            ->where('receiver_id', $user_id)
            ->orWhere('sender_id', $user_id)
            ->where('receiver_id', auth()->id())
            ->orderBy('id', 'DESC')
            ->firstOrFail();
    }

    public static function navbar()
    {
        $users = Message::contacted_users();
        $messages = [];

        foreach ($users as $key => $user) {
            if ($key < 3) {
                // $last = Message::last($user);
                // foreach ($last as $message) {
                    $messages[] = Message::last($user);
                // }
            }
        }
        // var_dump($messages);
        return $messages;
    }
}
