<?php

namespace App\Http\Controllers;

use App\Ban;
use App\Block;
use App\Event;
use App\Group;
use App\Http\Requests\AdminEditRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\GroupPanelChooseRequest;
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

    public function chooseGroup()
    {

        $listGroup = (new Group)->getByAdmin(auth()->user()->id);
        return view('group.admin.choose', [
        'groupList'=> $listGroup
        ]);


    }

    public function showPanel(GroupPanelChooseRequest $request){
        $post= $request->input();
        $groupChosen = $post['pGroup'];

        $listGroup = (new Group)->getByAdmin(auth()->user()->id);
        foreach ($listGroup as $group){

        }

        return view('group.admin.panel', [
            'groupList'=> $listGroup,
            'groupChosen' => $groupChosen
        ]);


    }


}
