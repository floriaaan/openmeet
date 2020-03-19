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
use App\User;
use DemeterChain\A;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function index()
    {
        $user = (new User);
        $listUser = $user->getLimitDesc(5);
        $countUser = $user->getCount();

        $message = (new Message);
        $listMessage = [];
        $rawListMsg = $message->getLimitDesc(10);

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
        $rawListGroup = $groups->getLimitDesc(10);

        $listGroup = [];

        foreach ($rawListGroup as $group) {
            $listGroup[] = [
                'group' => $group,
                'admin' => $user->getOne($group->admin)
            ];

        }

        $events = (new Event);
        $countEvent = $events->getCount();
        $rawListEvent = $events->getLimitDesc(10);

        $listEvent = [];
        foreach ($rawListEvent as $event) {
            $listEvent[] = [
                'event' => $event,
                'group' => $groups->getOne($event->id_group)
            ];

        }

        $reports = (new Signalement);
        $countReport = $reports->getCount();
        $rawListReport = $reports->getLimitDesc(10);

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
        $rawListBan = $bans->getLimitDesc(10);

        $listBan = [];
        foreach ($rawListBan as $ban) {
            $listBan[] = [
                'ban' => $ban,
                'banisher' => $groups->getOne($ban->banisher),
                'banned' => $user->getOne($ban->banned),
            ];

        }

        $blocks = (new Block);
        $countBlock = $blocks->getCount();
        $rawListBlock = $blocks->getLimitDesc(10);

        $listBlock = [];
        foreach ($rawListBlock as $block) {
            $listBlock[] = [
                'block' => $block,
                'blocker' => $user->getOne($block->blocker),
                'target' => $user->getOne($block->target),
            ];

        }

        return view('admin.panel', [
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
            'blockList' => $listBlock,
            'blockCount' => $countBlock

        ]);


    }

    public function editSettings(AdminEditRequest $request)
    {

        $post = $request->input();

        Setting(['openmeet.name' => $post['uName']]);
        Setting(['openmeet.color' => $post['uColor']]);
        Setting(['openmeet.slogan' => $post['uSlogan']]);

        return redirect('/admin');
    }

    public function editTheme(Request $request)
    {

        $post = $request->input();
        Setting(['openmeet.theme' => $post['theme']]);

        return redirect('/admin');
    }

    public function editPrivacy(Request $request)
    {
        $post = $request->input();

        $robotsOn = "User-agent: *\nDisallow:";
        $robotsOff = "User-agent: *\nDisallow: *";

        if (isset($post['robots']) && $post['robots'] == "on") {
            file_put_contents('./robots.txt', $robotsOn);
            Setting(['openmeet.robots' => true]);
        } else {
            file_put_contents('./robots.txt', $robotsOff);
            Setting(['openmeet.robots' => false]);
        }

        return redirect('/admin');
    }

    public function listUser()
    {
        return view('admin.users.list', ['users' => (new User)->getAll()]);
    }

    public function listReport()
    {
        $user = (new User);
        $reports = (new Signalement);
        $rawListReport = $reports->getAll();

        $listReport = [];
        foreach ($rawListReport as $report) {
            $listReport[] = [
                'report' => $report,
                'sender' => $user->getOne($report->submitter),
                'concerned' => $user->getOne($report->concerned),
            ];

        }
        return view('admin.reports.list', ['reportList' => $listReport]);
    }

    public function listBan()
    {
        $user = (new User);
        $bans = (new Ban);
        $groups = (new Group);
        $rawListBan = $bans->getAll();

        $listBan = [];
        foreach ($rawListBan as $ban) {
            $listBan[] = [
                'ban' => $ban,
                'banisher' => $groups->getOne($ban->banisher),
                'banned' => $user->getOne($ban->banned),
            ];

        }
        return view('admin.bans.list', ['banList' => $listBan]);
    }

    public function listBlock()
    {
        $user = (new User);
        $rawlistBlock = (new Block)->getAll();

        foreach ($rawlistBlock as $block) {
            $listBLock[] = [
                'block' => $block,
                'blocker' => $user->getOne($block->blocker),
                'target' => $user->getOne($block->target),
            ];

        }
        return view('admin.blocks.list', ['blockList' => $listBLock]);
    }

    public function listGroup()
    {
        $groups = [];
        $listGroups = (new Group)->getAll();

        foreach ($listGroups as $group) {
            $groups[] = [
                'group' => $group,
                'admin' => (new User)->getOne($group->admin)];
        }
        return view('admin.groups.list', ['groups' => $groups]);
    }

    public function listEvent()
    {
        $events = [];
        $listEvents = (new Event)->getAll();

        foreach ($listEvents as $event) {
            $events[] = [
                'event' => $event,
                'group' => (new Group)->getOne($event->id_group)];
        }
        return view('admin.events.list', ['events' => $events]);
    }


    public function deleteUser($userID)
    {
        $user = (new User)->getOne($userID);
        if ($user->isadmin) { //Proposer une passation de pouvoir
            return view('admin.users.deleteadmin');
        }
        return view('admin.users.deleteconfirmation', ['user' => $user]);
    }

    public function deleteUserPost(DeleteUserRequest $request)
    {
        $post = $request->input();
        (new User)->remove($post['user']);


        return redirect('/admin');
    }

    public function showReport($reportID)
    {
        $rpt = (new Signalement)->getOne($reportID);
        $report = [
            'report' => $rpt,
            'sender' => (new User)->getOne($rpt->submitter),
            'concerned' => (new User)->getOne($rpt->concerned),
        ];
        (new Signalement)->read($reportID);
        return view('admin.reports.show', ['report' => $report]);
    }

    public function deleteReport($reportID)
    {
        (new Signalement)->remove($reportID);
        return redirect('/admin');
    }

    public function search(SearchRequest $request)
    {
        $post = $request->input();

        $result = [];

        $listGroup = (new Group)->getLike($post['search']);
        foreach ($listGroup as $group) {
            $result[] = ['content' => $group, 'type' => 'group'];
        }

        $listEvent = (new Event)->getLike($post['search']);
        foreach ($listEvent as $event) {
            $result[] = ['content' => $event, 'type' => 'event'];
        }

        $listUser = (new User)->getLike($post['search']);
        foreach ($listUser as $user) {
            $result[] = ['content' => $user, 'type' => 'user'];
        }

        $listMessage = (new Message)->getLike($post['search']);
        foreach ($listMessage as $message) {
            if ($message->forgroup) {
                $result[] = ['content' => $message, 'type' => 'message',
                    'sender' => (new User)->getOne($message->sender),
                    'receiver' => (new Group)->getOne($message->receiver)
                ];
            } else {
                $result[] = ['content' => $message, 'type' => 'message',
                    'sender' => (new User)->getOne($message->sender),
                    'receiver' => (new User)->getOne($message->receiver)
                ];
            }

        }

        $listSignalement = (new Signalement)->getLike($post['search']);
        foreach ($listSignalement as $signalement) {
            $result[] = ['content' => $signalement, 'type' => 'signalement',
                'sender' => (new User)->getOne($signalement->submitter),
                'receiver' => (new User)->getOne($signalement->receiver),
            ];
        }

        //shuffle($result);

        return view('admin.search', [
            'search' => $post['search'],
            'results' => $result
        ]);

    }

    public function editViewsForm()
    {
        $mailingView = file_get_contents('./../resources/views/emails/eventcreated.blade.php');

        return view('admin.views.edit', [
            'mail' => $mailingView
        ]);
    }

    public function editViews(Request $request)
    {
        $post = $request->input();

        file_put_contents('./../resources/views/emails/eventcreated.blade.php', $post['mail']);

        return redirect('/admin');
    }
}
