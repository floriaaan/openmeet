<?php

namespace App\Http\Controllers;

use App\Event;
use App\Group;
use App\Http\Requests\EventCreateRequest;
use App\Mail\EventCreated;
use App\Participation;
use App\Subscription;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Mail;


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
        return view('event.create', ['listGroup' => $listGroup]);
    }

    public function addPost(EventCreateRequest $request)
    {
        $post = $request->input();

        $event = new Event();
        $event->name = $post['eName'];
        $event->group = $post['eGroup'];
        $event->dateFrom = $post['eDateFrom'];
        $event->numstreet = $post['eNumStreet'];
        $event->street = $post['eStreet'];
        $event->city = $post['eCity'];
        $event->zip = $post['eZip'];
        $event->country = $post['eCountry'];

        if (isset($post['eDesc']) && $post['eDesc'] != '') {
            $event->description = $post['eDesc'];
        }
        if (isset($post['eDateTo']) && $post['eDateTo'] != '') {
            $event->dateTo = $post['eDateTo'];
        }


        //var_dump((new Subscription)->getGroup($post['eGroup']));
        if($event->push()) {
            $usersSub = (new Subscription)->getGroup($post['eGroup']);
            foreach ($usersSub as $userSub) {
                $user = (new User)->getOne($userSub->user);

                if ($user->defaultnotif && ($user->typenotif == 2 || $user->typenotif == 3)) {
                    Mail::to($user->email)
                        ->send(new EventCreated($event));
                } elseif ($user->defaultnotif && ($user->typenotif == 1 || $user->typenotif == 3)) {
                    //PUSH
                }

            }
        }

        //notifications
        return redirect('/groups/show/' . $post['eGroup']);
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
        $datas = [
            'event' => (new Event)->getOne($eventID)
        ];

        if (auth()->check()) {
            $datas['isparticipating'] = (new Participation)->isParticipating(auth()->id(), $eventID);
        }
        return view('event.show', $datas);
    }

    public function showAll()
    {
        $listEvent = (new Event())->getAll();

        return view('event.list', [
            'listGroups' => $listEvent
        ]);

    }

}
