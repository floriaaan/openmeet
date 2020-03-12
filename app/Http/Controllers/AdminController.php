<?php

namespace App\Http\Controllers;

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
        $listUser = $user->getLimit(5);
        $countUser = $user->getCount();

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
        $rawListGroup = $groups->getLimit(10);

        $listGroup = [];

        foreach ($rawListGroup as $group) {
            $listGroup[] = [
                'group' => $group,
                'admin' => $user->getOne($group->admin)
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
        var_dump($post);
        //Setting(['openmeet.robots' => ($post['robots']) == "on"]);

        //return redirect('/admin');
    }

    public function listUser()
    {
        return view('admin.users.list', ['users' => (new User)->getAll()]);
    }

    public function listReport() {
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

    public function listGroup()
    {
        $groups = [];
        $listGroups = (new Group)->getAll();

        foreach ($listGroups as $group) {
            $groups[] = ['group' => $group, 'admin' => (new User)->getOne($group->admin)];
        }
        return view('admin.groups.list', ['groups' => $groups]);
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

    public function showReport($reportID){
        $rpt = (new Signalement)->getOne($reportID);
        $report = [
            'report' => $rpt,
            'sender' => (new User)->getOne($rpt->submitter),
            'concerned' => (new User)->getOne($rpt->concerned),
        ];
        (new Signalement)->read($reportID);
        return view('admin.reports.show', ['report' => $report]);
    }

    public function deleteReport($reportID){
        (new Signalement)->remove($reportID);
        return redirect('/admin');
    }

    public function search(SearchRequest $request){
        $post = $request->input();

        $listGroup = (new Group)->getLike($post['search']);
        $listEvent = (new Event)->getLike($post['search']);
        $listUser = (new User)->getLike($post['search']);
        $listMessage = (new Message)->getLike($post['search']);
        $listSignalement = (new Signalement)->getLike($post['search']);

        return view('admin.search', [
            'search' => $post['search'],
            'groups' => $listGroup,
            'events' => $listEvent,
            'users' => $listUser,
            'messages' => $listMessage,
            'signalements' => $listSignalement
        ]);

    }

    public function oldindex()
    {
        $user = (new User);
        $listUser = $user->getLimit(5);
        $countUser = $user->getCount();

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
        $rawListGroup = $groups->getLimit(10);

        $listGroup = [];

        foreach ($rawListGroup as $group) {
            $listGroup[] = [
                'group' => $group,
                'admin' => $user->getOne($group->admin)
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

        ]);


    }
}
