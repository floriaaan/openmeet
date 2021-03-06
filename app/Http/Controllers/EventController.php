<?php

namespace App\Http\Controllers;

use App\Event;
use App\Group;
use App\Http\Requests\EventCreateRequest;
use App\Mail\EventCreated;
use App\Model\Alert;
use App\Notification;
use App\Participation;
use App\Subscription;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


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
        $event->posx = $post['elon'];
        $event->posy = $post['elat'];

        if (isset($post['eDesc']) && $post['eDesc'] != '') {
            $event->description = $post['eDesc'];
        }
        if (isset($post['eDateTo']) && $post['eDateTo'] != '') {
            $event->dateTo = $post['eDateTo'];
        }

        if ($request->file('ePic') != null) {
            if (!Storage::exists('public/upload/image/' . $event->picrepo . '/' . $event->picname)) {
                Storage::delete('public/upload/image/' . $event->picrepo . '/' . $event->picname);
            }
            if (!Storage::exists('public/upload/image/event')) {
                Storage::makeDirectory('public/upload/image/event');
            }
            if (!Storage::exists('public/upload/image/event/' . $event->id)) {
                Storage::makeDirectory('public/upload/image/event/' . $event->id);
            }
            $uploadedFile = $request->file('ePic');
            $filename = time() . md5($uploadedFile->getClientOriginalName()) . '.' . $uploadedFile->extension();


            Storage::disk('local')->putFileAs(
                'public/upload/image/event/' . $event->id . '/',
                $uploadedFile,
                $filename
            );

            $event->picrepo = 'event/' . $event->id;
            $event->picname = $filename;
        }


        if ($event->push()) {
            $usersSub = (new Subscription)->getGroup($post['eGroup']);
            $group = (new Group)->getOne($post['eGroup']);
            foreach ($usersSub as $userSub) {
                $user = (new User)->getOne($userSub->user);

                if ($user->defaultnotif && ($user->typenotif == 2 || $user->typenotif == 3)) {
                    Mail::to($user->email)
                        ->send(new EventCreated((new Event)->getOne($event->id)));
                } elseif ($user->defaultnotif && ($user->typenotif == 1 || $user->typenotif == 3)) {
                    //TODO:PUSH
                }

                (new Notification)->CreateNotification('eve',
                    'Nouvel événement de ' . $group->name,
                    $userSub->user,
                    $event->name,
                    $event->id);

            }

        }

        //notifications
        return redirect('/groups/show/' . $post['eGroup']);
    }

    public function deleteForm($eventID)
    {
        return view('event.delete', ['event' => (new Event)->getOne($eventID)]);
    }

    public function deletePost(Request $request)
    {
        $post = $request->input();

        (new Event)->remove($post['event']);

        return redirect('/');
    }

    public function show($eventID)
    {
        $alerts = (new Alert)->getEvent();
        if(count($alerts) >= 1) {
            $alert = $alerts[count($alerts) - 1];
            Session()->flash('info', [
                'title' => $alert->title,
                'text' => $alert->content,
                'link' => $alert->link,
                'color' => $alert->color
            ]);
        }

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

    public function editForm($eventID)
    {
        return view('event.edit', ['event' => (new Event)->getOne($eventID)]);
    }

    public function editPost(Request $request)
    {
        $post = $request->input();
        $event = (new Event)->getOne($post['eventID']);

        $event->name = $post['eName'];
        $event->dateFrom = $post['eDateFrom'];
        $event->dateTo = $post['eDateTo'];
        $event->numstreet = $post['eNumStreet'];
        $event->street = $post['eStreet'];
        $event->city = $post['eCity'];
        $event->zip = $post['eZip'];
        $event->country = $post['eCountry'];
        $event->posx = $post['elon'];
        $event->posy = $post['elat'];
        $event->description = $post['eDesc'];
        if ($request->file('ePic') != null) {

            if (!Storage::exists('public/upload/image/' . $event->picrepo . '/' . $event->picname)) {
                Storage::delete('public/upload/image/' . $event->picrepo . '/' . $event->picname);
            }
            if (!Storage::exists('public/upload/image/event')) {
                Storage::makeDirectory('public/upload/image/event');
            }
            if (!Storage::exists('public/upload/image/event/' . $event->id)) {
                Storage::makeDirectory('public/upload/image/event/' . $event->id);
            }
            $uploadedFile = $request->file('ePic');
            $filename = time() . md5($uploadedFile->getClientOriginalName()) . '.' . $uploadedFile->extension();


            Storage::disk('local')->putFileAs(
                'public/upload/image/event/' . $event->id . '/',
                $uploadedFile,
                $filename
            );

            $event->picrepo = 'event/' . $event->id;
            $event->picname = $filename;
        }

        (new Event)->updateEvent($event);


        return redirect('/events/show/' . $post['eventID']);
    }

}
