<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\MessageCreateRequest;
use App\Message;
use App\Subscription;
use App\User;
use App\Participation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;


class MessageController extends Controller
{
    public function createMessage(MessageCreateRequest $request)
    {
        $post = $request->input();
        $message = new Message();
        $message->receiver = $post['mReceiver'];
        $message->forgroup = $post['mForgroup'];
        $message->sender = auth()->id();
        $message->isread = 0;
        $message->content = $post['mContent'];
        $message->date = date('Y-m-d H:i:s');

        $message->push();
        if ($post['mForgroup'] == 1) {
            return redirect('/messages/group/' . $post['mReceiver']);
        } else {
            return redirect('/messages/user/' . $post['mReceiver']);
        }
    }


    public function showChat($typeConversation, $correspondant)
    {
        $userId = auth()->id();

        //=============================================================
        //Liste des conversations
        //=============================================================

        $conv = new Message();
        $personalConversations = $conv->getPersonnalConversationsForUser($userId);

        $personalInfoConversations = [];
        $personalLastMessages = [];
        foreach ($personalConversations as $personalConversation) {
            $user = new User();
            $personalInfoConversations[] = $user->getOne($personalConversation);
            $message = new Message();
            $personalLastMessages[$message->getLastMessageForPersonalConv($userId, $personalConversation)->id] = $message->getLastMessageForPersonalConv($userId, $personalConversation);
        }
        //tri des derniers messages personnels par id<=>date d'envoi
        krsort($personalLastMessages);

        /*
        echo('personalInfoConv =');
        var_dump($personalInfoConversations);
        echo('personalLastMessages =');
        var_dump($personalLastMessages);
        die;
        */


        $sub = new Subscription();
        $userSubscriptions = $sub->getUser($userId);

        $groupConversations = [];
        $groupLastMessages = [];
        $groupWithoutLastMessage = [];
        foreach ($userSubscriptions as $subscription) {
            $group = new Group();
            $groupConversations[] = $group->getOne($subscription->id_group);
            $message = new Message();
            try {
                if ($message->getLastMessageForGroupConv($subscription->id_group)->id != 0) {
                    $groupLastMessages[$message->getLastMessageForGroupConv($subscription->id_group)->id] = $message->getLastMessageForGroupConv($subscription->id_group);
                } else {
                    $groupWithoutLastMessage[] = $message->getLastMessageForGroupConv($subscription->id_group);
                }
            } catch (\Exception $e) {
            }
        }
        $groupLastMessagesInfo = [];
        foreach ($groupLastMessages as $groupLastMessage) {
            try {
                if ($groupLastMessage->sender != 0) {
                    $user = new User();
                    $groupLastMessagesInfo[$user->getOne($groupLastMessage->sender)->id] = $user->getOne($groupLastMessage->sender);
                }
            } catch (\Exception $e) {
            }
        }

        //Tri des tableaux des derniers messages de groupe par id<=>date d'envoi
        krsort($groupLastMessages);

        /*
        echo('userSubscriptions =');
        var_dump($userSubscriptions);
        echo('groupConversations =');
        var_dump($groupConversations);
        echo ('groupLastMessages =');
        var_dump($groupLastMessages);
        echo('groupLastMessageInfo =');
        var_dump($groupLastMessageInfo);
        echo('groupWithoutLastMessage');
        var_dump($groupWithoutLastMessage);
        die;
        */

        //=============================================================
        //
        //=============================================================

        //Si c'est une discussion de groupe

        if ($typeConversation == 'group') {
            $group = new Group();
            $groupInfo = $group->getOne($correspondant);
            $message = new Message();
            $listMessages = $message->getGroupChat($correspondant);

            //Si c'est une discussion personnelle

            $listUsers = [];
            foreach ($listMessages as $message) {
                $listUsers[] = $message->sender;
            }
            $listUsers = array_unique($listUsers);
            $usersInfos = [];
            foreach ($listUsers as $id) {
                $user = new User();
                $usersInfos[] = $user->getOne($id);
            }

            /*
            echo('groupInfo =');
            var_dump($groupInfo);
            echo ('listMessage =');
            var_dump($listMessages);
            echo('listUsers =');
            var_dump($listUsers);
            echo('usersInfos');
            var_dump($usersInfos);
            die;
            */

            return view('message.groupchat', [
                "personalInfoConversations" => $personalInfoConversations,
                "personalLastMessages" => $personalLastMessages,
                "groupLastMessagesInfo" => $groupLastMessagesInfo,
                "groupLastMessages" => $groupLastMessages,
                "groupInfoConversations" => $groupConversations,
                "groupWithoutLastMessage" => $groupWithoutLastMessage,
                "listMessages" => $listMessages,
                "usersInfos" => $usersInfos,
                "groupInfo" => $groupInfo
            ]);
        }
        if($typeConversation == 'user'){
            $message = new Message();
            $listMessages = $message->getPersonalChat($correspondant);
            $user=new User();
            $userInfo = $user->getOne($correspondant);

            return view('message.userchat', [
                "personalInfoConversations" => $personalInfoConversations,
                "personalLastMessages" => $personalLastMessages,
                "groupLastMessagesInfo" => $groupLastMessagesInfo,
                "groupLastMessages" => $groupLastMessages,
                "groupInfoConversations" => $groupConversations,
                "groupWithoutLastMessage" => $groupWithoutLastMessage,
                "listMessages" => $listMessages,
                "userInfo" => $userInfo,
            ]);

        }
    }


    public function showUserConversations()
    {

        $userId = auth()->id();
        $conv = new Message();
        $personalConversations = $conv->getPersonnalConversationsForUser($userId);

        $personalInfoConversations = [];
        $personalLastMessages = [];
        foreach ($personalConversations as $personalConversation) {
            $user = new User();
            $personalInfoConversations[] = $user->getOne($personalConversation);
            $message = new Message();
            $personalLastMessages[$message->getLastMessageForPersonalConv($userId, $personalConversation)->id] = $message->getLastMessageForPersonalConv($userId, $personalConversation);
        }
        //tri des derniers messages personnels par id<=>date d'envoi
        krsort($personalLastMessages);


        /*
        echo('personalInfoConv =');
        var_dump($personalInfoConversations);
        echo('personalLastMessages =');
        var_dump($personalLastMessages);
        die;
        */


        $sub = new Subscription();
        $userSubscriptions = $sub->getUser($userId);

        $groupConversations = [];
        $groupLastMessages = [];
        $groupWithoutLastMessage = [];
        foreach ($userSubscriptions as $subscription) {
            $group = new Group();
            $groupConversations[] = $group->getOne($subscription->id_group);
            $message = new Message();
            try {
                if ($message->getLastMessageForGroupConv($subscription->id_group)->id != 0) {
                    $groupLastMessages[$message->getLastMessageForGroupConv($subscription->id_group)->id] = $message->getLastMessageForGroupConv($subscription->id_group);
                } else {
                    $groupWithoutLastMessage[] = $message->getLastMessageForGroupConv($subscription->id_group);
                }
            } catch (\Exception $e) {
            }
        }
        $groupLastMessagesInfo = [];
        foreach ($groupLastMessages as $groupLastMessage) {
            try {
                if ($groupLastMessage->sender != 0) {
                    $user = new User();
                    $groupLastMessagesInfo[$user->getOne($groupLastMessage->sender)->id] = $user->getOne($groupLastMessage->sender);
                }
            } catch (\Exception $e) {
            }
        }

        //Tri des tableaux des derniers messages de groupe par id<=>date d'envoi
        krsort($groupLastMessages);

        /*
        echo('userSubscriptions =');
        var_dump($userSubscriptions);
        echo('groupConversations =');
        var_dump($groupConversations);
        echo ('groupLastMessages =');
        var_dump($groupLastMessages);
        echo('groupLastMessageInfo =');
        var_dump($groupLastMessageInfo);
        echo('groupWithoutLastMessage');
        var_dump($groupWithoutLastMessage);
        die;
        */

        return view('message.conversationslist',
            [
                "personalInfoConversations" => $personalInfoConversations,
                "personalLastMessages" => $personalLastMessages,
                "groupLastMessagesInfo" => $groupLastMessagesInfo,
                "groupLastMessages" => $groupLastMessages,
                "groupInfoConversations" => $groupConversations,
                "groupWithoutLastMessage" => $groupWithoutLastMessage
            ]);

    }
}
