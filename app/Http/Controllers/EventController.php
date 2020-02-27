<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;


class EventController extends Controller
{
       use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showAllEvent($userId){
    $events = new Event();
    $Event=$events->showAllEvents($userId);

    return view('Event.showAllEvents',
        [
            'Evenements'=>$Event
        ]);

}

}
