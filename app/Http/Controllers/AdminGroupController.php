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
        //TODO : choisir le groupe
        //TODO : count message par groupe
        //TODO : Bas tout en fait
        $user = (new User);
        $countUserTotal = $user->getCount();

        $sub = (new Subscription);
        $countUserByGroup = $sub->countGroup(1);

        return view('admingroup.panelgestion', [

        ]);
    }

    public function listSubscription()
    {
        return view('admingroup.users.list', ['users' => (new User)->getAll()]);
    }
    public function listEvent()
    {
        return view('admingroup.eventlist', ['users' => (new User)->getAll()]);
    }

    public function listReport()
    {
        return view('group.admin.reports.list', ['reportList' => $listReport]);
    }

    public function listBan()
    {
        return view('admingroup.banlist', ['banList' => $listBan]);
    }

    public function listGroup()
    {
        return view('admingroup.grouplist', ['groups' => $groups]);
    }
}
