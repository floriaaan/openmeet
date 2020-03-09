<?php

namespace App\Http\Controllers;

use App\Event;
use App\Group;
use App\Http\Requests\EventCreateRequest;
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
        $listGroup = (new Group)->getByAdmin(auth()->user()->id);
        return view('event.create', ['group' => $listGroup[0]]);
    }

    public function addPost(EventCreateRequest $request)
    {
        $post = $request->input();

        $event = new Event();
        $event->name = $post['eName'];
        $event->id_group = $post['eGroup'];

        if(isset($post['eDesc']) && $post['eDesc'] != '') {
            $event->description = $post['eDesc'];
        }

        $event->push();

        //notifications
        return redirect('/events/');
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
