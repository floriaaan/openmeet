<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MessageController extends Controller
{

    public function __construct()
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
        return view('message.index');
    }
    
    public function show($user_id)
    {
        return view('message.index', [
            'conversation' => Message::conversation($user_id)
        ]);
    }
}
