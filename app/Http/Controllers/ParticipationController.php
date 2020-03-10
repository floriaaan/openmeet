<?php

namespace App\Http\Controllers;

use App\Event;
use App\Participation;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ParticipationController extends Controller
{
    public function index()
    {
        //
    }

    public function Participe ($userId,$eventId)
    {
        $sub=new Participation();
        $participations=$sub->getAllForUser($userId);

        $alreadyPar=0;
        foreach ($participations as $participation)
        {
            if ($participation->user == $userId)
            {
                $alreadyPar=1;
            }
        }

        if($alreadyPar==0) {
            $sub = new Participation();
            $sub->create($userId, $eventId);

        }
        else{
            $_SESSION['errorParticipation']="Vous participez déja à cet évenement";
        }

    }

    public function ShowEventParticipations($eventId)
    {
        $sub=new Participation();
        $participations=$sub->getAllForEvent($eventId);

        foreach ($participations as $participation)
        {
            $user=new User();
            $infoUser=$user->getOne($participation->user);
        }

        return view('participation.eventparticipations',
            [
                'participations'=>$participations,
                'users'=>$infoUser
            ]);
    }

    public function ShowUserEvents($userId)
    {
        $par=new Participation();
        $participations=$par->getAllForUser($userId);
        $infoEvent=[];
        foreach ($participations as $participation)
        {
            $event=new Event();
            $infoEvent[$event->getOne($participation->event)->id]=$event->getOne($participation->event);
        }

        var_dump($infoEvent);
        return view('participation.userevents',
            [
                'participations'=>$participations,
                'events'=>$infoEvent
            ]);
    }

}
