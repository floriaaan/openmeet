<?php

namespace App\Http\Controllers;

use App\Ban;
use App\Block;
use App\Event;
use App\Group;
use App\Http\Requests\AdminEditRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\SearchRequest;
use App\Message;
use App\Signalement;
use App\Subscription;
use App\User;

class AdminGroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function gestion()
    {
        $user = (new User);
        $listUser = $user->getLimit(5);
        $countUser = $user->getCount();


        $sub = (new Subscription());
        $UserByGroup = $sub->countGroup(3);


        $message = (new Message);
        $listMessage = [];
        $rawListMsg = $message->getLimit(10);

        foreach ($rawListMsg as $msg) {
            if ($msg->forgroup == 0) {
                $listMessage[] = [
                    'sender' => $user->getOne($msg->sender),
                    'receiver' => $user->getOne($msg->receiver),
                    'msg' => $msg
                ];
            } else {
                $listMessage[] = [
                    'sender' => $user->getOne($msg->sender),
                    'receiver' => (new Group)->getOne($msg->receiver),
                    'msg' => $msg
                ];
            }

        }
        $countMessage = $message->getCount();

        $groups = (new Group);
        $countGroup = $groups->getCount();
        $NameGroup = $groups->getnameGroup();
        $rawListGroup = $groups->getLimit(10);

        $listGroup = [];

        foreach ($rawListGroup as $group) {
            $listGroup[] = [
                'group' => $group,
                'admin' => $user->getOne($group->admin),

            ];

        }

        $events = (new Event);
        $countEvent = $events->getCount();
        $rawListEvent = $events->getLimit(10);

        $listEvent = [];
        foreach ($rawListEvent as $event) {
            $listEvent[] = [
                'event' => $event,
                'group' => $groups->getOne($event->id_group)
            ];

        }

        $reports = (new Signalement);
        $countReport = $reports->getCount();
        $rawListReport = $reports->getLimit(10);

        $listReport = [];
        foreach ($rawListReport as $report) {
            $listReport[] = [
                'report' => $report,
                'sender' => $user->getOne($report->submitter),
                'concerned' => $user->getOne($report->concerned),
            ];

        }

        $bans = (new Ban);
        $countBan = $bans->getCount();
        $rawListBan = $bans->getLimit(10);

        $listBan = [];
        foreach ($rawListBan as $ban) {
            $listBan[] = [
                'ban' => $ban,
                'banisher' => $groups->getOne($ban->banisher),
                'banned' => $user->getOne($ban->banned),
            ];

        }

        $blocks = (new Block);
        $countBlockG = $blocks->getCount();
        $rawListBlock = $blocks->getLimit(10);

        $listBlock = [];
        foreach ($rawListBlock as $block) {
            $listBlock[] = [
                'block' => $block,
                'blocker' => $user->getOne($block->blocker),
                'target' => $user->getOne($block->target),
            ];

        }


       /* $subs = (new Subscription);
        $rawListSub = $subs->getLimit(10);
        $NameGroupG = $subs->getnameGroup();
        $listSubG = [];
        foreach ($rawListSub as $sub) {
            $listSubG[] = [
                'lastsub' => $sub,
                'group' => $user->getOne($sub->id_group),
                'user' => $user->getOne($sub->id_user),
            ];

        }*/

        return view('group.admin', [
            'userList' => $listUser,
            'userCount' => $countUser,
            'messageList' => $listMessage,
            'messageCount' => $countMessage,
            'groupList' => $listGroup,
            'groupCount' => $countGroup,
            'eventList' => $listEvent,
            'eventCount' => $countEvent,
            'reportList' => $listReport,
            'reportCount' => $countReport,
            'banList' => $listBan,
            'banCount' => $countBan,
            'NameGroup'=> $NameGroup,
            'UserByGroup'=> $UserByGroup



        ]);


    }
}
