<?php

namespace App\Http\Controllers;

use App\Event;
use App\Group;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function toggleSubscription(Request $request)
    {
        $userID = $request['user'];
        $groupID = $request['group'];

        if ((new Subscription)->isSubscribed($userID, $groupID)) {
            (new Subscription)->remove((new Subscription)->getSubscribed($userID, $groupID)->id);
            return [200, 'Unsubscribed'];
        } else {
            $subscription = new Subscription();
            $subscription->id_user = $userID;
            $subscription->id_group = $groupID;
            $subscription->date = date('Y-m-d');
            $subscription->acceptnotif = (new User)->getOne($userID)->defaultnotif;
            $subscription->push();
            return [200, 'Subscribed'];

        }

    }

    public function getSubscription($userID)
    {
        $groups = (new Group)->getAll();

        $datas = [];
        foreach ($groups as $group) {
            $datas[] = ['id' => $group->id, 'state' => (new Subscription)->isSubscribed($userID, $group->id)];
        }

        return $datas;

    }

    public function getGroups(){
        return (new Group)->getAll();
    }

    public function getUsers(){
        return (new User)->getAll();
    }

    public function getEvents(){
        return (new Event)->getAll();
    }

    public function getSettings(){
        return Setting('openmeet');
    }
}
