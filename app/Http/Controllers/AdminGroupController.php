<?php

namespace App\Http\Controllers;


use App\Ban;
use App\Event;
use App\Group;
use App\Http\Requests\GroupPanelChooseRequest;
use App\Participation;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;


class AdminGroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chooseGroup()
    {

        $listGroup = Group::where('admin', '=', auth()->user()->id)->get();
        return view('group.admin.choose', [
            'groupList' => $listGroup
        ]);
    }

    public function showPanel(GroupPanelChooseRequest $request)
    {
        $post = $request->input();
        $groupChosen = $post['pGroup'];

        $listGroup = Group::where('admin', '=', auth()->user()->id)->get();


        $rawListSub = Subscription::where('group', '=', $groupChosen)
            ->orderBy('desc')
            ->take(5)
            ->get();
        $listSub = [];
        foreach ($rawListSub as $sub) {
            $listSub[] = [
                'user' => User::find($sub->user),
                'sub' => $sub
            ];
        }

        $rawListEvent = Event::where('group', '=', $groupChosen)
            ->orderBy('desc')
            ->take(5)
            ->get();
        $listEvent = [];
        foreach ($rawListEvent as $event) {
            $listEvent[] = [
                'event' => $event,
                'participations' => Participation::where('event', "=", $event->id)->get()
            ];
        }

        $rawListBan = Ban::where('banisher', $groupChosen)->get();
        $listBan = [];
        foreach ($rawListBan as $ban) {
            $listBan[] = [
                'ban' => $ban,
                'banned' => User::find($ban->banned)
            ];
        }

        return view('group.admin.panel', [
            'group' => Group::find($groupChosen),
            'groupList' => $listGroup,
            'subList' => $listSub,
            'eventList' => $listEvent,
            'banList' => $listBan,
            'groupChosen' => $groupChosen
        ]);
    }

    public function listEvent(Request $request)
    {
        $post = $request->input();
        $groupChosen = $post['groupChosen'];

        $rawListEvent = Event::where('group', '=', $groupChosen)->get();
        $listEvent = [];
        foreach ($rawListEvent as $event) {
            $listEvent[] = [
                'event' => $event,
                'participations' => Participation::where('event', '=', $event->id),
            ];
        }

        return view('group.admin.event.list', ['list' => $listEvent, 'group' => $groupChosen]);
    }

    public function listSub(Request $request)
    {
        $post = $request->input();
        $groupChosen = $post['groupChosen'];

        $rawListSub = Subscription::where('group', "=", $groupChosen)->get();
        $listSub = [];
        foreach ($rawListSub as $sub) {
            $listSub[] = [
                'user' => User::find($sub->user),
                'sub' => $sub
            ];
        }

        return view('group.admin.subscription.list', ['list' => $listSub, 'group' => $groupChosen]);
    }

    public function listBan(Request $request)
    {
        $post = $request->input();
        $groupChosen = $post['groupChosen'];

        $rawListBan = Ban::where('group', "=", $groupChosen)->get();
        $listBan = [];
        foreach ($rawListBan as $ban) {
            $listBan[] = [
                'ban' => $ban,
                'banned' => User::find($ban->banned)
            ];
        }

        return view('group.admin.ban.list', ['list' => $listBan, 'group' => $groupChosen]);
    }

    public function transferRolesConfirm($groupID, $userID)
    {
        $user = User::find($userID);
        $group = Group::find($groupID);

        if ($group->admin == auth()->id()) {
            return view('group.admin.transfer', [
                'group' => $group,
                'user' => $user
            ]);
        } else {
            Session()->flash('error', 'Vous n\'êtes pas administrateur de groupe.');
            return redirect('/');
        }
    }

    public function transferRolesPost(Request $request)
    {
        $post = $request->input();

        $group = Group::find($post['group']);
        $group->admin = $post['user'];
        $group->save();
        return redirect('/groups/show/' . $post['group']);
    }

    public function deleteBan($banID)
    {
        $ban = Ban::find($banID);
        $ban->delete();
        $ban->save();
        
        return redirect('/groups/admin');
    }
}
