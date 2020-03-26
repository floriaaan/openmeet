<?php

namespace App\Http\Controllers;

use App\Event;
use App\Group;
use App\Http\Requests\MessageCreateRequest;
use App\Message;
use App\Notification;
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
        if (auth()->user()->isBlock(auth()->user()->id, $post['mReceiver'])) {
            return view('user.block.blockshow');
        } elseif (auth()->user()->isBan(auth()->user()->id, $post['mReceiver'])) {
            return view('user.ban.banshow');
        } else {
            $message->push();

            //Envoi d'une notification
            $contentSplitted = mb_str_split($message->content);
            $contentExt = "";
            $contentExtract = "";

            if (count($contentSplitted) >= 50) {
                for ($i = 0; $i < 50; $i++) {
                    {
                        $contentExt = $contentExt . $contentSplitted[$i];
                    }
                    $contentExtract = $contentExt . ' ...';
                }
            } else {
                $contentExtract = $message->content;
            }

            $notifType = 'mes';
            $notifContent = "Contenu du message : " . $contentExtract;

            if ($post['mForgroup'] == 0) {
                $notifTitle = 'Nouveau message de ' . auth()->user()->fname . ' ' . auth()->user()->lname;
                (new Notification)->CreateNotification($notifType, $notifTitle, $message->receiver, $notifContent, $message->id);
            }
            if ($post['mForgroup'] == 1) {
                $group = new Group();
                $infoGroup = $group->getOne($post['mReceiver']);
                $sub = new Subscription();
                $listSubs = $sub->getGroup($post['mReceiver']);
                $listReceiver = [];
                foreach ($listSubs as $oneSub) {
                    if ($oneSub->user != auth()->id()) {
                        $listReceiver[] = $oneSub->user;
                    }
                }
                $notifTitle = '[' . $infoGroup->name . ']' . 'Message de ' . auth()->user()->fname . ' ' . auth()->user()->lname;

                foreach ($listReceiver as $receiver) {
                    (new Notification)->CreateNotification($notifType, $notifTitle, $receiver, $notifContent, $message->id);
                }
            }


            if ($post['mForgroup'] == 1) {
                return redirect('/messages/group/' . $post['mReceiver']);
            } else {
                return redirect('/messages/user/' . $post['mReceiver']);
            }
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
            $groupConversations[] = $group->getOne($subscription->group);
            $message = new Message();
            try {
                if ($message->getLastMessageForGroupConv($subscription->group)->id != 0) {
                    $groupLastMessages[$message->getLastMessageForGroupConv($subscription->group)->id] = $message->getLastMessageForGroupConv($subscription->group);
                } else {
                    $groupWithoutLastMessage[] = $message->getLastMessageForGroupConv($subscription->group);
                }
            } catch (\Exception $e) {
            }
        }

        $groupLastMessagesInfo = [];
        $concernedNotifs = [];
        foreach ($groupLastMessages as $groupLastMessage) {
            try {
                if ($groupLastMessage->sender != 0) {
                    $user = new User();
                    $groupLastMessagesInfo[$user->getOne($groupLastMessage->sender)->id] = $user->getOne($groupLastMessage->sender);
                }
                if ($groupLastMessage->sender != auth()->id()) {
                    $notif = new Notification();
                    $concernedNotifs [] = $notif->GetByConcernedMessage($groupLastMessage->id);
                } else {
                    $notif = new Notification();
                    $notif->concerned = $groupLastMessage->id;
                    $concernedNotifs[] = $notif;
                }
            } catch (\Exception $e) {
                $notif = new Notification();
                $notif->concerned = $groupLastMessage->id;
                $concernedNotifs[] = $notif;

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

            if (auth()->user()->isBan(auth()->user()->id, $correspondant)) {
                return view('user.ban.banshow');
            }

            $group = new Group();
            $groupInfo = $group->getOne($correspondant);
            $message = new Message();
            $listMessages = $message->getGroupChat($correspondant);

            //Si c'est une discussion personnelle

            $listUsers = [];
            $listNotifs = [];
            foreach ($listMessages as $mes) {
                $listUsers[] = $mes->sender;
                if ($mes->sender != auth()->id()) {
                    $message = new Message();
                    $message->MakeReaded($mes->id);
                    $notif = new Notification();
                    $listNotifs[] = $notif->GetByConcernedMessage($mes->id);
                }
            }

            if (!empty($listNotifs)) {
                foreach ($listNotifs as $Notif) {
                    if ($Notif != null) {
                        if ($Notif->isread == 0) {
                            NotificationController::MakeReadedNotification($Notif->id);
                        } else {

                        }
                    }
                }
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
                "groupInfo" => $groupInfo,
                "groupConcernedNotifs" => $concernedNotifs
            ]);
        }
        if ($typeConversation == 'user') {

            if (auth()->user()->isBlock(auth()->user()->id, $correspondant)) {
                return view('user.block.blockshow');
            }
            $message = new Message();
            $listMessages = $message->getPersonalChat($correspondant);
            $user = new User();
            $userInfo = $user->getOne($correspondant);
            $listNotifs = [];
            foreach ($listMessages as $mes) {
                if ($mes->receiver == auth()->id()) {
                    $message = new Message();
                    $message->MakeReaded($mes->id);
                    $notif = new Notification();
                    $listNotifs[] = $notif->GetByConcernedMessage($mes->id);
                }
            }

            if (!empty($listNotifs)) {
                foreach ($listNotifs as $Notif) {
                    if ($Notif->isread == 0) {
                        NotificationController::MakeReadedNotification($Notif->id);

                    } else {

                    }
                }
            }

            return view('message.userchat', [
                "userInfo" => $userInfo,
                "personalInfoConversations" => $personalInfoConversations,
                "personalLastMessages" => $personalLastMessages,
                "groupLastMessagesInfo" => $groupLastMessagesInfo,
                "groupLastMessages" => $groupLastMessages,
                "groupInfoConversations" => $groupConversations,
                "groupWithoutLastMessage" => $groupWithoutLastMessage,
                "listMessages" => $listMessages,
                "groupConcernedNotifs" => $concernedNotifs
            ]);

        } else {
            return 0;
        }
    }


    public
    function showUserConversations()
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
            $groupConversations[] = $group->getOne($subscription->group);
            $message = new Message();
            try {
                if ($message->getLastMessageForGroupConv($subscription->group)->id != 0) {
                    $groupLastMessages[$message->getLastMessageForGroupConv($subscription->group)->id] = $message->getLastMessageForGroupConv($subscription->group);
                } else {
                    $groupWithoutLastMessage[] = $message->getLastMessageForGroupConv($subscription->group);
                }
            } catch (\Exception $e) {
            }
        }

        $groupLastMessagesInfo = [];
        $concernedNotifs = [];
        foreach ($groupLastMessages as $groupLastMessage) {
            try {
                if ($groupLastMessage->sender != 0) {
                    $user = new User();
                    $groupLastMessagesInfo[$user->getOne($groupLastMessage->sender)->id] = $user->getOne($groupLastMessage->sender);
                }
                if ($groupLastMessage->sender != auth()->id()) {
                    $notif = new Notification();
                    $concernedNotifs [] = $notif->GetByConcernedMessage($groupLastMessage->id);
                } else {
                    $notif = new Notification();
                    $notif->concerned = $groupLastMessage->id;
                    $concernedNotifs[] = $notif;
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
                "groupWithoutLastMessage" => $groupWithoutLastMessage,
                "groupConcernedNotifs" => $concernedNotifs
            ]);

    }

}
