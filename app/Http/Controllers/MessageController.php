<?php

namespace App\Http\Controllers;

use App\Group;
use App\Message;
use App\Subscription;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;


class MessageController extends Controller
{
    public function showUserConversations($userId)
    {
        $conv=new Message();
        $personalConversations=$conv->getPersonnalConversationsForUser($userId);
        $sub=new Subscription();
        $userSubscriptions=$sub->getAllForUser($userId);

        var_dump($personalConversations);
        var_dump($userSubscriptions);

        foreach ($userSubscriptions as $userSubscription)
        {
         $group=new Group();
         $groupConversations[]=$group->getOne($userSubscription->id_group);
        }
        var_dump($groupConversations);
        die;

    }
}
