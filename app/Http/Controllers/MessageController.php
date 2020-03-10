<?php

namespace App\Http\Controllers;

use App\Group;
use App\Message;
use App\Subscription;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;


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
            $personalLastMessages[$message->getLastMessageForPersonalConv($userId,$personalConversation)->id]=$message->getLastMessageForPersonalConv($userId,$personalConversation);
        }
        //tri des derniers messages personnels par id<=>date d'envoi
        krsort($personalLastMessages);



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
         try {
             $groupLastMessages[$message->getLastMessageForGroupConv($subscription->id_group)->id] = $message->getLastMessageForGroupConv($subscription->id_group);
         }
         catch (\Exception $e){
             $groupLastMessages[$message->getLastMessageForGroupConv($subscription->id_group)['id']] = $message->getLastMessageForGroupConv($subscription->id_group);
         }
         }
        foreach ($groupLastMessages as $groupLastMessage)
        {
            try {
                if ($groupLastMessage->sender != 0) {
                    $user = new User();
                    $groupLastMessageInfo[$user->getOne($groupLastMessage->sender)->id] = $user->getOne($groupLastMessage->sender);
                }
            }catch (\Exception $e){}
        }

        //Tri des tableaux des derniers messages de groupe par id<=>date d'envoi
        krsort($groupLastMessages);

        echo('userSubscriptions =');
        var_dump($userSubscriptions);
        echo('groupConversations =');
        var_dump($groupConversations);
        echo ('groupLastMessages =');
        var_dump($groupLastMessages);
        echo('groupLastMessageInfo =');
        var_dump($groupLastMessageInfo);



     die;
    }
}
