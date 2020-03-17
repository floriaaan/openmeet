<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\SubscriptionRequest;
use App\Participation;
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
            $subscription->date = date('Y-m-d H:m:s');
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
        $listgroups = [];
        foreach ($subscriptions as $subscription) {
            $listgroups[] = $subscription->id_group;
        }
        $groupsWhereAdmin = (new Group)->getByAdmin(auth()->id());

        foreach ($groupsWhereAdmin as $group) {
            $listgroups[] = $group->id;
        }

        $listgroups = array_unique($listgroups);


        $groups = [];
        foreach ($listgroups as $idGroup) {
            $groups[] = (new Group)->getOne($idGroup);
        }

        return view('subscription.list', [
            'subscriptions' => $subscriptions,
            'groups' => $groups
        ]);
    }

    public static function SwitchAcceptNotif($subId, $redirect)
    {
        $sub = new Subscription();
        $infoSub = $sub->getOne($subId);

        //TODO : check actual status

        //TODO : update status

        //TODO : check '$redirect' parameter
        //TODO : header to the page relative to the '$redirect' parameter;
        //
    }

    public function deleteAll()
    {
        $listSub = (new Subscription)->getUser(auth()->id());

        foreach ($listSub as $sub) {
            (new Subscription)->remove($sub->id);
        }

        return redirect('/user');

    }

}
