<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'type', 'object_id', 'content', 'is_read', 'user_id'
    ];

    public static function hasUnread()
    {
        return Notification::where('user_id', Auth::id())->where('is_read', false)->count() > 0;
    }

    public static function message(Message $message)
    {
        return Notification::where('type', 'message')
            ->where('object_id', $message->id)
            ->firstOrFail();
    }
}
