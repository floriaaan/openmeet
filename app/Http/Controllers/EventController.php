<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;


class EventController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return $this->showAll();
    }

    public function addForm()
    {
        return view('event.create');
    }

    public function addPost()
    {

        //ACTIONS
        return redirect('/event/');
    }

    public function deleteForm()
    {
        return view('event.delete');
    }

    public function deletePost()
    {

        //ACTIONS
        return redirect('/event/');
    }

    public function show($eventID)
    {
        return view('event.show', ['event' => (new Event)->getOne($eventID)]);
    }

    public function showAll()
    {
        $listEvent = (new Event())->getAll();

        return view('event.list', [
            'listGroups' => $listEvent
        ]);

    }

}
