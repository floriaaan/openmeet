<?php

namespace App\Http\Controllers;

use App\Group;
use App\Subscription;
use App\User;
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
        $sub=new Subscription();
        $subscriptions=$sub->getAllForUser($userId);

        $alreadySub=0;
        foreach ($subscriptions as $subscription)
        {
            if ($subscription->id_user == $userId)
            {
                $alreadySub=1;
            }
        }

        if($alreadySub==0) {
            $sub = new Subscription();
            $sub->create($userId, $groupId);
            //TODO: header to the relative group page;

        }
        else{
            $_SESSION['errorSubscription']="Vous êtes déjà abonné à ce groupe";
            //TODO: header to the relative group page;
        }

    }

    public function ShowGroupSubs($groupId)
    {
        $sub=new Subscription();
        $subscriptions=$sub->getAllForGroup($groupId);

        foreach ($subscriptions as $subscription)
        {
            $user=new User();
            $infoUser=$user->getOne($subscription->id_user);
        }

        return view('subscription.groupsubs',
            [
                'subscriptions'=>$subscriptions,
                'users'=>$infoUser
            ]);
    }

    public function ShowUserSubs($userId)
    {
        $sub=new Subscription();
        $subscriptions=$sub->getAllForUser($userId);

        foreach ($subscriptions as $subscription)
        {
            $group=new Group();
            $infoGroup=$group->getOne($subscription->id_group);
        }

        return view('subscription.usersubs',
            [
                'subscriptions'=>$subscriptions,
                'groups'=>$infoGroup
            ]);
    }

    public static function SwitchAcceptNotif($subId,$redirect)
    {
        $sub=new Subscription();
        $infoSub=$sub->getOne($subId);

        //TODO : check actual status

        //TODO : update status

        //TODO : check '$redirect' parameter
        //TODO : header to the page relative to the '$redirect' parameter;
        //
    }

}
