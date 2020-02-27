<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SubscriptionController extends Controller
{
    public function index()
    {
        //
    }

    public function Subscribe ($userId,$groupId)
    {
        //TODO : Already Subscribe control

        $sub=new Subscription();
        $sub->create($userId,$groupId);


    }

    public function ShowGroupSubs($groupId)
    {
        $sub=new Subscription();
        $subscriptions=$sub->getAllForGroup($groupId);

        //TODO : return view
    }

    public function ShowUserSubs($userId)
    {
        $sub=new Subscription();
        $subscriptions=$sub->getAllForUser($userId);

        //TODO : return view
    }

    public static function SwitchAcceptNotif($subId)
    {
        $sub=new Subscription();
        $infoSub=$sub->getOne($subId);

        //TODO : check actual status

        //TODO : update status

    }
}
