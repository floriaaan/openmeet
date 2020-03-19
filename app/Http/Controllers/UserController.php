<?php

namespace App\Http\Controllers;

use App\Ban;
use App\Block;
use App\Event;
use App\Group;
use App\Http\Requests\ReportRequest;
use App\Mail\EventCreated;
use App\Message;
use App\Participation;
use App\Signalement;
use App\Subscription;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listSubscription = (new Subscription)->getUser(auth()->id());
        $groups = [];
        foreach ($listSubscription as $sub) {
            $groups[] = (new Group)->getOne($sub->group);
        }

        $listParticipations = (new Participation)->getUser(auth()->id());
        $events = [];
        foreach ($listParticipations as $participation) {
            $events[] = (new Event)->getOne($participation->event);
        }

        return view('user.show', [
            'user' => (new User)->getOne(auth()->id()),
            'groups' => $groups,
            'events' => $events,
        ]);
    }


    public function show($userID)
    {
        $listSubscription = (new Subscription)->getUser($userID);
        $groups = [];
        foreach ($listSubscription as $sub) {
            $groups[] = (new Group)->getOne($sub->group);
        }

        $listParticipations = (new Participation)->getUser($userID);
        $events = [];
        foreach ($listParticipations as $participation) {
            $events[] = (new Event)->getOne($participation->event);
        }

        return view('user.show', [
            'user' => (new User)->getOne($userID),
            'groups' => $groups,
            'events' => $events,
        ]);
    }

    public function editForm()
    {
        $listSubscription = (new Subscription)->getUser(auth()->id());
        $groups = [];
        foreach ($listSubscription as $sub) {
            $groups[] = (new Group)->getOne($sub->group);
        }

        $listParticipations = (new Participation)->getUser(auth()->id());
        $events = [];
        foreach ($listParticipations as $participation) {
            $events[] = (new Event)->getOne($participation->event);
        }
        return view('user.edit', [
            'groups' => $groups,
            'events' => $events,
        ]);
    }

    public function edit()
    {
        return redirect('/user');
    }

    public function reportForm($userID)
    {
        return view('user.report.form', [
            'submitter' => auth()->id(),
            'concerned' => (new User)->getOne($userID)
        ]);
    }

    public function reportPost(ReportRequest $request)
    {
        $post = $request->input();

        $report = new Signalement();
        $report->submitter = $post['submitter'];
        $report->concerned = $post['concerned'];
        //$report->importance = $post['importance'];
        $report->description = $post['description'];
        $report->date = date('Y-m-d H:m:s');

        $report->push();

        return redirect('/');

    }
}
