<?php

namespace App\Http\Controllers;


use Alchemy\Zippy\Zippy;
use App\Ban;
use App\Block;
use App\Event;
use App\Group;
use App\Model\Alert;
use App\Signalement;
use App\Subscription;
use App\User;
use App\Http\Requests\AdminEditRequest;
use App\Http\Requests\AlertRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                'group' => $groups->getOne($event->group)
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

        $subs = (new Subscription);
        $countSub = $subs->getCount();
        $rawListSub = $subs->getLimitDesc(10);

        $listSub = [];
        foreach ($rawListSub as $sub) {
            $listSub[] = [
                'sub' => $sub,
                'user' => $user->getOne($sub->user),
                'group' => $groups->getOne($sub->group),
            ];

        }

        return view('admin.panel', [
            'userList' => $listUser,
            'userCount' => $countUser,
            'groupList' => $listGroup,
            'groupCount' => $countGroup,
            'eventList' => $listEvent,
            'eventCount' => $countEvent,
            'reportList' => $listReport,
            'reportCount' => $countReport,
            'banList' => $listBan,
            'banCount' => $countBan,
            'blockList' => $listBlock,
            'blockCount' => $countBlock,
            'subList' => $listSub,
            'subCount' => $countSub

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
        $file = $request->hasFile('themefile') ? $request->file('themefile') : null;

        var_dump($post);
        if ($file != null && $file->getMimeType() == 'application/zip') {
            var_dump($file->move('theme', $post['filename']));
            $z = new \ZipArchive();

            // Open an archive
            if ($z->open('theme/' . $post['filename'])) {

                for($i = 0; $i < $z->numFiles; $i++) {
                    var_dump('File : ' . $z->getNameIndex($i));
                }

                $z->close();
                unlink('theme/' . $post['filename']);
            }





        } elseif ($file != null && $file->getMimeType() != 'application/zip'
            || false) { // content verification
            Session()->flash('error', 'Mauvais fichier!');
        }

        Setting(['openmeet.theme' => $post['theme']]);
        die;
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

        if (isset($post['apidoc']) && $post['apidoc'] == "on") {
            Setting(['openmeet.apidoc' => true]);
        } else {
            Setting(['openmeet.apidoc' => false]);
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
        $block = (new Block);
        $rawlistBlock = $block->getAll();

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
                'group' => (new Group)->getOne($event->group)];
        }
        return view('admin.events.list', ['events' => $events]);
    }


    public function deleteUser($userID)
    {
        $user = (new User)->getOne($userID);
        if ($user->isadmin) { //TODO:Proposer une passation de pouvoir
            return view('admin.users.deleteadmin', ['user' => $user]);
        }
        return view('admin.users.deleteconfirmation', ['user' => $user]);
    }

    public function deleteUserPost(DeleteUserRequest $request)
    {
        $post = $request->input();
        (new User)->disable($post['user']);


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

    public function showBlock($blockID)
    {
        $blocks = (new Block)->getOne($blockID);
        $block = [
            'block' => $blocks,
            'blocker' => (new User)->getOne($blocks->blocker),
            'target' => (new User)->getOne($blocks->target),
        ];
        return view('admin.blocks.show', ['block' => $block]);
    }

    public function deleteBlock($blockID)
    {
        (new Block)->remove($blockID);
        return redirect('/admin');
    }

    public function showBan($banID)
    {
        $bans = (new Ban)->getOne($banID);
        $ban = [
            'ban' => $bans,
            'banisher' => (new Group)->getOne($bans->banisher),
            'banned' => (new User)->getOne($bans->banned),
        ];
        return view('admin.bans.show', ['ban' => $ban]);
    }

    public function deleteBan($banID)
    {
        (new Ban)->remove($banID);
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

        /*$listMessage = (new Message)->getLike($post['search']);
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

        }*/

        $listSignalement = (new Signalement)->getLike($post['search']);
        foreach ($listSignalement as $signalement) {
            $result[] = ['content' => $signalement, 'type' => 'signalement',
                'sender' => (new User)->getOne($signalement->submitter),
                'receiver' => (new User)->getOne($signalement->concerned),
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
        $homeView = file_get_contents('./../resources/views/home.blade.php');
        $mailingView = file_get_contents('./../resources/views/emails/eventcreated.blade.php');

        return view('admin.views.edit', [
            'home' => $homeView,
            'mail' => $mailingView
        ]);
    }

    public function editViews(Request $request)
    {
        $post = $request->input();

        file_put_contents('./../resources/views/home.blade.php', $post['home']);
        file_put_contents('./../resources/views/emails/eventcreated.blade.php', $post['mail']);

        return redirect('/admin');
    }

    public function rolesForm($userID)
    {
        return view('admin.users.roles', ['user' => (new User)->getOne($userID)]);
    }

    public function rolesPost(Request $request)
    {
        $post = $request->input();

        $admin = isset($post['admin']) && $post['admin'] == 'on' ? true : false;

        (new User)->updateAdmin($post['user'], $admin);

        return redirect('/admin/');
    }

    public function alertForm()
    {


        return view('admin.alerts', ['alerts' => (new Alert)->getAll()]);
    }

    public function alertPost(AlertRequest $request)
    {
        $post = $request->input();
        $alert = new Alert();


        $alert->title = $post['title'];
        $alert->content = $post['content'];
        $alert->link = $post['link'];
        $alert->color = $post['color'];
        $alert->home = isset($post['home']) && $post['home'] == 'on';
        $alert->group = isset($post['group']) && $post['group'] == 'on';
        $alert->groupList = isset($post['groupList']) && $post['groupList'] == 'on';
        $alert->event = isset($post['event']) && $post['event'] == 'on';

        $alert->push();

        return redirect('/admin/alert');
    }

    public function alertDelete(Request $request)
    {
        $alertID = $request->alert;
        (new Alert)->remove($alertID);

        return redirect('/admin/alert');
    }

    public function update()
    {
        return view('admin.update');
    }
}
