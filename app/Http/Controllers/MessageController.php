<?php

namespace App\Http\Controllers;

use App\Group;
use App\Message;
use App\Subscription;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;


class MessageController extends Controller
{
    //TODO : Création d'un message.

    public function showUserConversations($userId)
    {
        $conv=new Message();
        $personalConversations=$conv->getPersonnalConversationsForUser($userId);

        $personalInfoConversations=[];
        $personalLastMessages=[];
        foreach ($personalConversations as $personalConversation)
        {
            $user=new User();
            $personalInfoConversations[]=$user->getOne($personalConversation);
            $message=new Message();
            $personalLastMessages[]=$message->getLastMessageForPersonalConv($userId,$personalConversation);
        }

        //Tri des messages personnels
        $personalLastMessages=krsort($personalLastMessages,['id']);

        echo('personalInfoConv =');
        var_dump($personalInfoConversations);
        echo('personalLastMessages =');
        var_dump($personalLastMessages);

        $sub=new Subscription();
        $userSubscriptions=$sub->getAllForUser($userId);

        $groupConversations=[];
        $groupLastMessages=[];
        foreach ($userSubscriptions as $subscription)
        {
         $group=new Group();
         $groupConversations[]=$group->getOne($subscription->id_group);
         $message = new Message();
         $groupLastMessages[] = $message->getLastMessageForGroupConv($subscription->id_group);

        }

        echo('userSubscriptions =');
        var_dump($userSubscriptions);
        echo('groupConversations =');
        var_dump($groupConversations);
        echo ('groupLastMessages =');
        var_dump($groupLastMessages);

        //Tri des tableaux des derniers messages par date

     die;
    }
}
