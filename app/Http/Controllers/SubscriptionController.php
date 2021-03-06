<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\SubscriptionRequest;
use App\Notification;
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
        $group = (new Group)->getOne($post['group']);
        if (!(new Subscription)->isSubscribed($userId, $group->id)) {
            $subscription = new Subscription();
            $subscription->user = $userId;
            $subscription->group = $group->id;
            $subscription->date = date('Y-m-d H:m:s');
            $subscription->acceptnotif = (new User)->getOne($userId)->defaultnotif;
            $subscription->push();

            $user = (new User)->getOne($post['user']);

            (new Notification)->CreateNotification('sub',
                 'Nouvel abonné(e)',
                $group->admin,
                $user->fname . ' ' . $user->lname . ' s\'est abonné à ' . $group->name,
                $group->id);
        } else {
            Session()->flash('error', 'Vous êtes déjà abonné à ce groupe');
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
            Session()->flash('error', 'Vous ne participez pas à cet évenement');
        }

        return redirect('/user/groups');

    }

    public function showGroups()
    {
        $subscriptions = (new Subscription())->getUser(auth()->id());
        $listgroups = [];
        foreach ($subscriptions as $subscription) {
            $listgroups[] = $subscription->group;
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
            if((new Group)->getOne($sub->group)->admin != auth()->id()) {
                (new Subscription)->remove($sub->id);
            }
        }

        return redirect('/user');

    }

}
