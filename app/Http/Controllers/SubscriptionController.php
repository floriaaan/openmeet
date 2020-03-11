<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\SubscriptionRequest;
use App\Subscription;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SubscriptionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function createSubscription(SubscriptionRequest $request)
    {
        $post = $request->input();
        $userId = $post['user'];
        $groupId = $post['group'];
        if (!(new Subscription)->isSubscribed($userId, $groupId)) {
            $subscription = new Subscription();
            $subscription->id_user = $userId;
            $subscription->id_group = $groupId;
            $subscription->date = date('Y-m-d');
            $subscription->acceptnotif = (new User)->getOne($userId)->defaultnotif;
            $subscription->push();
        } else {
            Session()->put('errorSubscription', 'Vous êtes déjà abonné à ce groupe');
        }
        return redirect('/user/groups');

    }
    public function deleteSubscription(SubscriptionRequest $request)
    {
        $post = $request->input();
        $userId = $post['user'];
        $groupId = $post['group'];
        if ((new Subscription)->isSubscribed($userId, $groupId)) {
            (new Subscription)->remove((new Subscription)->getSubscribed($userId, $groupId)->id);
        } else {
            Session()->put('errorParticipation', 'Vous ne participez pas à cet évenement');
        }

        return redirect('/user/groups');

    }

    public function showGroups()
    {
        $subscriptions = (new Subscription())->getUser(auth()->id());
        $groups = [];
        foreach ($subscriptions as $subscription) {
            $groups[] = (new Group)->getOne($subscription->id_group);
        }

        return view('subscription.list', [
            'subscriptions' => $subscriptions,
            'groups' => $groups
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
