<?php

namespace App\Http\Controllers;


use App\Ban;
use App\Event;
use App\Group;
use App\Http\Requests\GroupPanelChooseRequest;
use App\Participation;
use App\Subscription;
use App\User;

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
        $listSub = (new Subscription)->getLimitGroupDesc($groupChosen, 5);
        $rawListEvent = (new Event)->getLimitGroupDesc($groupChosen, 5);
        $listEvent = [];
        foreach ($rawListEvent as $event) {
            $listEvent[] = [
                'event' => $event,
                'participations' => (new Participation)->getEvent($event->id)
            ];

        }

        $rawListUser = (new Subscription)->getLimitGroupDesc($groupChosen, 5);
        $listUser = [];
        foreach ($rawListUser as $sub) {
            $listUser[] = [

                'user' => (new User)->getOne($sub->user),

            ];
        }


        $rawListBan = (new Ban)->getLimitGroupDesc($groupChosen,10);
        $listBan = [];
        foreach ($rawListBan as $ban) {
            $listBan[] = [
                'ban'=> $ban,
                'banned' => (new User)->getOne($ban->banned)
            ];
        }

        return view('group.admin.panel', [
            'group' => (new Group)->getOne($groupChosen),
            'groupList' => $listGroup,
            'subList' => $listSub,
            'eventList' => $listEvent,
            'banList' => $listBan,
            'userList' => $listUser,
            'groupChosen' => $groupChosen

        ]);


    }


}
