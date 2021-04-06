<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class MessageController extends Controller
{

    private function addConversationList()
    {
        $list = [];
        $users = Message::contacted_users();

        foreach ($users as $user) {
            $list[] = [
                'message' => Message::last($user),
                'user' => User::find($user)
            ];
        }

        View::share('conversations_list', $list);
    }

    public function index()
    {
        $this->addConversationList();
        return view('message.index');
    }

    public function show($user_id)
    {
        $this->addConversationList();
        $conversation = Message::conversation($user_id);

        foreach ($conversation as $message) {
            if ($message->receiver_id == Auth::id()) {
                $message->is_read = true;
                $message->save();

                $notification = Notification::message($message);
                $notification->is_read = true;
                $notification->save();
            }
        }

        return view('message.index', [
            'messages' => $conversation,
            'receiver_id' => $user_id
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'receiver_id' => 'exists:users,id|required'
        ]);

        $message = Message::create([
            'content' => $request->input('content'),
            'receiver_id' => $request->input('receiver_id'),
            'sender_id' => Auth::id(),
        ]);

        $notification = Notification::create([
            'type' => "message",
            'object_id' => $message->id,
            'content' => __('messages.notification.message'),
            'user_id' => $request->input('receiver_id')
        ]);

        return redirect(route('message.show', ['user_id' => $request->input('receiver_id')]));
    }

    public function new()
    {
        $this->addConversationList();
        return view('message.new', ['users' => User::all()]);
    }
}
