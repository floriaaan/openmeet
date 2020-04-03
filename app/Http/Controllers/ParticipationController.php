<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipationRequest;
use App\Participation;
use App\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ParticipationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function createParticipation(ParticipationRequest $request)
    {
        $post = $request->input();
        $userId = $post['user'];
        $eventId = $post['event'];
        if (!(new Participation)->isParticipating($userId, $eventId)) {
            $participation = new Participation();
            $participation->user = $userId;
            $participation->event = $eventId;
            $participation->push();
        } else {
            Session()->put('errorParticipation', 'Vous participez déja à cet évenement');
        }
        return redirect('/user/events');

    }

    public function deleteParticipation(ParticipationRequest $request)
    {
        $post = $request->input();
        $userId = $post['user'];
        $eventId = $post['event'];
        if ((new Participation)->isParticipating($userId, $eventId)) {
            (new Participation)->remove((new Participation)->getParticipating($userId, $eventId)->id);
        } else {
            Session()->put('errorParticipation', 'Vous ne participez pas à cet évenement');
        }

        return redirect('/user/events');

    }

    public function showEvents()
    {
        $participations = (new Participation)->getUser(auth()->id());
        $events = [];
        foreach ($participations as $participation) {
            $events[] = (new Event)->getOne($participation->event);
        }

        return view('participation.list', [
            'participations' => $participations,
            'events' => $events,
        ]);
    }

    public function deleteAll()
    {
        $listParticipation = (new Participation)->getUser(auth()->id());

        foreach ($listParticipation as $part) {
            (new Participation)->remove($part->id);
        }

        return redirect('/user');

    }

}
