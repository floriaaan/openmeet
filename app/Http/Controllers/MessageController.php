<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;


class MessageController extends Controller
{
    public function showUserConversations($userId)
    {
        $conv=new Message();
        $personalconversations=$conv->getPersonnalConversationsForUser($userId);
        $groupconversations=$conv->getGroupConversationsForUser($userId);

    }
}
