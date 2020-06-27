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
        $listUser = User::orderBy('desc')->take(5)->get();
        $countUser = User::all()->count();

        $countGroup = Group::all()->count();
        $rawListGroup = Group::orderBy('desc')->take(10)->get();

        $listGroup = [];

        foreach ($rawListGroup as $group) {
            $listGroup[] = [
                'group' => $group,
                'admin' => User::find($group->admin)
            ];

        }

        $countEvent = Event::all()->count();
        $rawListEvent = Event::orderBy('desc')->take(10)->get();

        $listEvent = [];
        foreach ($rawListEvent as $event) {
            $listEvent[] = [
                'event' => $event,
                'group' => Group::find($event->group)
            ];

        }

        $countReport = Signalement::all()->count();
        $rawListReport = Signalement::orderBy('desc')->take(10)->get();

        $listReport = [];
        foreach ($rawListReport as $report) {
            $listReport[] = [
                'report' => $report,
                'sender' => User::find($report->submitter),
                'concerned' => User::find($report->concerned),
            ];

        }

        $countBan = Ban::all()->count();
        $rawListBan = Ban::orderBy('desc')->take(10)->get();

        $listBan = [];
        foreach ($rawListBan as $ban) {
            $listBan[] = [
                'ban' => $ban,
                'banisher' => Group::find($ban->banisher),
                'banned' => User::find($ban->banned),
            ];

        }

        $countBlock = Block::all()->count();
        $rawListBlock = Block::orderBy('desc')->take(10)->get();

        $listBlock = [];
        foreach ($rawListBlock as $block) {
            $listBlock[] = [
                'block' => $block,
                'blocker' => User::find($block->blocker),
                'target' => User::find($block->target),
            ];

        }

        $countSub = Subscription::all()->count();
        $rawListSub = Subscription::orderBy('desc')->take(10)->get();

        $listSub = [];
        foreach ($rawListSub as $sub) {
            $listSub[] = [
                'sub' => $sub,
                'user' => User::find($sub->user),
                'group' => Group::find($sub->group),
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

        //var_dump($post);
        if ($file != null && $file->getMimeType() == 'application/zip') {
            //var_dump($file->move('theme', $post['filename']));
            $z = new \ZipArchive();

            // Open an archive
            if ($z->open('theme/' . $post['filename'])) {

                for($i = 0; $i < $z->numFiles; $i++) {
                    //var_dump('File : ' . $z->getNameIndex($i));
                }

                $z->close();
                unlink('theme/' . $post['filename']);
            }





        } elseif ($file != null && $file->getMimeType() != 'application/zip'
            || false) { // content verification
            Session()->flash('error', 'Mauvais fichier!');
        }

        Setting(['openmeet.theme' => $post['theme']]);
        //die;
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
        return view('admin.users.list', ['users' => User::all()]);
    }

    public function listReport()
    {
        $rawListReport = Signalement::all();

        $listReport = [];
        foreach ($rawListReport as $report) {
            $listReport[] = [
                'report' => $report,
                'sender' => User::find($report->submitter),
                'concerned' => User::find($report->concerned),
            ];

        }
        return view('admin.reports.list', ['reportList' => $listReport]);
    }

    public function listBan()
    {
        $rawListBan = Ban::all();
        $listBan = [];
        foreach ($rawListBan as $ban) {
            $listBan[] = [
                'ban' => $ban,
                'banisher' => Group::find($ban->banisher),
                'banned' => User::find($ban->banned),
            ];

        }
        return view('admin.bans.list', ['banList' => $listBan]);
    }

    public function listBlock()
    {
        $rawlistBlock = Block::all();

        foreach ($rawlistBlock as $block) {
            $listBLock[] = [
                'block' => $block,
                'blocker' => User::find($block->blocker),
                'target' => User::find($block->target),
            ];
        }
        return view('admin.blocks.list', ['blockList' => $listBLock]);
    }

    public function listGroup()
    {
        $groups = [];
        $listGroups = Group::all();

        foreach ($listGroups as $group) {
            $groups[] = [
                'group' => $group,
                'admin' => User::find($group->admin)
            ];
        }
        return view('admin.groups.list', ['groups' => $groups]);
    }

    public function listEvent()
    {
        $events = [];
        $listEvents = Event::all();

        foreach ($listEvents as $event) {
            $events[] = [
                'event' => $event,
                'group' => Group::find($event->group)
            ];
        }
        return view('admin.events.list', ['events' => $events]);
    }


    public function deleteUser($userID)
    {
        $user = User::find($userID);
        if ($user->isadmin) {
            return view('admin.users.deleteadmin', ['user' => $user]);
        }
        return view('admin.users.deleteconfirmation', ['user' => $user]);
    }

    public function deleteUserPost(DeleteUserRequest $request)
    {
        $post = $request->input();
        $user = User::find($post['user']);
        $user->disabled = !$user->disabled;
        $user->save();


        return redirect('/admin');
    }

    public function showReport($reportID)
    {
        $rpt = Signalement::find($reportID);
        $report = [
            'report' => $rpt,
            'sender' => User::find($rpt->submitter),
            'concerned' => User::find($rpt->concerned),
        ];
        $rpt->isread = 1;
        $rpt->save();
        return view('admin.reports.show', ['report' => $report]);
    }

    public function deleteReport($reportID)
    {
        $signalement = Signalement::find($reportID);
        $signalement->delete();
        $signalement->save();
        return redirect('/admin');
    }

    public function showBlock($blockID)
    {
        $blocks = Block::find($blockID);
        $block = [
            'block' => $blocks,
            'blocker' => User::find($blocks->blocker),
            'target' => User::find($blocks->target),
        ];
        return view('admin.blocks.show', ['block' => $block]);
    }

    public function deleteBlock($blockID)
    {
        $block = Block::find($blockID);
        $block->delete();
        $block->save();
        return redirect('/admin');
    }

    public function showBan($banID)
    {
        $bans = Ban::find($banID);
        $ban = [
            'ban' => $bans,
            'banisher' => Group::find($bans->banisher),
            'banned' => User::find($bans->banned),
        ];
        return view('admin.bans.show', ['ban' => $ban]);
    }

    public function deleteBan($banID)
    {
        $ban = Ban::find($banID);
        $ban->delete();
        $ban->save();
        return redirect('/admin');
    }

    public function search(SearchRequest $request)
    {
        $post = $request->input();

        $result = [];

        $listGroup = Group::like($post['search']);
        foreach ($listGroup as $group) {
            $result[] = ['content' => $group, 'type' => 'group'];
        }

        $listEvent = Event::like($post['search']);
        foreach ($listEvent as $event) {
            $result[] = ['content' => $event, 'type' => 'event'];
        }

        $listUser = User::like($post['search']);
        foreach ($listUser as $user) {
            $result[] = ['content' => $user, 'type' => 'user'];
        }

        /*$listMessage = (new Message)->getLike($post['search']);
        foreach ($listMessage as $message) {
            if ($message->forgroup) {
                $result[] = ['content' => $message, 'type' => 'message',
                    'sender' => User::find($message->sender),
                    'receiver' => Group::find($message->receiver)
                ];
            } else {
                $result[] = ['content' => $message, 'type' => 'message',
                    'sender' => User::find($message->sender),
                    'receiver' => User::find($message->receiver)
                ];
            }

        }*/

        $listSignalement = Signalement::where('description', 'LIKE', "%{$post['search']}%")->get();;
        foreach ($listSignalement as $signalement) {
            $result[] = ['content' => $signalement, 'type' => 'signalement',
                'sender' => User::find($signalement->submitter),
                'receiver' => User::find($signalement->concerned),
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
        return view('admin.users.roles', ['user' => User::find($userID)]);
    }

    public function rolesPost(Request $request)
    {
        $post = $request->input();

        $admin = isset($post['admin']) && $post['admin'] == 'on' ? true : false;

        $user = User::find($post['user']);
        $user->isadmin = $admin;
        $user->save();

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

        $alert->save();

        return redirect('/admin/alert');
    }

    public function alertDelete(Request $request)
    {
        $alertID = $request->alert;
        $alert = Alert::find($alertID);
        $alert->delete();
        $alert->save();

        return redirect('/admin/alert');
    }

    public function update()
    {
        return view('admin.update');
    }
}
