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

        $listGroup = (new Group)->getByAdmin(auth()->user()->id);
        return view('group.admin.choose', [
            'groupList' => $listGroup
        ]);


    }

    public function showPanel(GroupPanelChooseRequest $request)
    {
        $post = $request->input();
        $groupChosen = $post['pGroup'];

        $listGroup = (new Group)->getByAdmin(auth()->user()->id);


        $rawListSub = (new Subscription)->getLimitGroupDesc($groupChosen, 5);
        $listSub = [];
        foreach ($rawListSub as $sub) {
            $listSub[] = [
                'user' => (new User)->getOne($sub->user),
                'sub' => $sub
            ];
        }

        $rawListEvent = (new Event)->getLimitGroupDesc($groupChosen, 5);
        $listEvent = [];
        foreach ($rawListEvent as $event) {
            $listEvent[] = [
                'event' => $event,
                'participations' => (new Participation)->getEvent($event->id)
            ];

        }

        $rawListBan = (new Ban)->getGroup($groupChosen);
        $listBan = [];
        foreach ($rawListBan as $ban) {
            $listBan[] = [
                'ban' => $ban,
                'banned' => (new User)->getOne($ban->banned)
            ];
        }

        return view('group.admin.panel', [
            'group' => (new Group)->getOne($groupChosen),
            'groupList' => $listGroup,
            'subList' => $listSub,
            'eventList' => $listEvent,
            'banList' => $listBan,
            'groupChosen' => $groupChosen
        ]);


    }

    public function listEvent(Request $request) {
        $post = $request->input();
        $groupChosen = $post['groupChosen'];

        $rawListEvent = (new Event)->getByGroup($groupChosen);
        $listEvent = [];
        foreach ($rawListEvent as $event) {
            $listEvent[] = [
                'event' => $event,
                'participations' => (new Participation)->getEvent($event->id),
            ];

        }

        return view('group.admin.event.list',['list' => $listEvent, 'group' => $groupChosen]);
    }

    public function listSub(Request $request) {
        $post = $request->input();
        $groupChosen = $post['groupChosen'];

        $rawListSub = (new Subscription)->getGroup($groupChosen);
        $listSub = [];
        foreach ($rawListSub as $sub) {
            $listSub[] = [
                'user' => (new User)->getOne($sub->user),
                'sub' => $sub
            ];
        }

        return view('group.admin.subscription.list',['list' => $listSub, 'group' => $groupChosen]);

    }

    public function listBan(Request $request) {
        $post = $request->input();
        $groupChosen = $post['groupChosen'];

        $rawListBan = (new Ban)->getGroup($groupChosen);
        $listBan = [];
        foreach ($rawListBan as $ban) {
            $listBan[] = [
                'ban' => $ban,
                'banned' => (new User)->getOne($ban->banned)
            ];
        }

        return view('group.admin.ban.list',['list' => $listBan, 'group' => $groupChosen]);

    }

    public function deleteBan($banID)
    {
        (new Ban)->remove($banID);
        return redirect('/groups/admin');
    }



}
