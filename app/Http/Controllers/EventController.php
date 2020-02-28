<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;


class EventController extends Controller
{
       use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showAllEvents($userId){
    $event = new Event();
    $events=$event->showAllEvents($userId);

    return view('event.listevent',
        [
            'Evenements'=>$events
        ]);

}

}
