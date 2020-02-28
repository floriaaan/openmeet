<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;


class MessageController extends Controller
{
    public function ShowUserConversations($userId)
    {
        $conv=new Message();
        $conversations=$conv->GetPe
    }
}
