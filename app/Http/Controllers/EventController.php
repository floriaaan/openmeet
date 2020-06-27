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
        return view('event.create', [
            'listGroup' => Group::where('admin', '=', auth()->user()->id)
        ]);
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


        if ($event->save()) {
            $usersSub = Subscription::where('group', '=', $post['eGroup'])->get();
            $group = Group::find($post['eGroup']);
            foreach ($usersSub as $userSub) {
                $user = User::find($userSub->user);

                if ($user->defaultnotif && ($user->typenotif == 2 || $user->typenotif == 3)) {
                    Mail::to($user->email)
                        ->send(new EventCreated(Event::find($event->id)));
                } elseif ($user->defaultnotif && ($user->typenotif == 1 || $user->typenotif == 3)) {
                    //TODO:PUSH
                }

                $notif = Notification::create([
                    'type' => 'eve',
                    'title' => 'Nouvel événement de ' . $group->name,
                    'user' => $userSub->user,
                    'content' => $event->name,
                    'concerned' => $event->id
                ]);

                $notif->save();
            }
        }

        //notifications
        return redirect('/groups/show/' . $post['eGroup']);
    }

    public function deleteForm($eventID)
    {
        return view('event.delete', ['event' => Event::find($eventID)]);
    }

    public function deletePost(Request $request)
    {
        $post = $request->input();
        $event = Event::find($post['event']);
        $event->delete();
        $event->save();

        return redirect('/');
    }

    public function show($event)
    {
        $alerts = Alert::where('event', '=', 1)
            ->where('disabled', '=', '0')
            ->get();
        if (count($alerts) >= 1) {
            $alert = $alerts[count($alerts) - 1];
            Session()->flash('info', [
                'title' => $alert->title,
                'text' => $alert->content,
                'link' => $alert->link,
                'color' => $alert->color
            ]);
        }

        $datas = [
            'event' => Event::find($event)
        ];

        if (auth()->check()) {
            $datas['isparticipating'] = Participation::isParticipating(auth()->id(), $event);
        }
        return view('event.show', $datas);
    }

    public function showAll()
    {
        $listEvent = Event::all();

        return view('event.list', [
            'listGroups' => $listEvent
        ]);
    }

    public function editForm($eventID)
    {
        return view('event.edit', ['event' => Event::find($eventID)]);
    }

    public function editPost(Request $request)
    {
        $post = $request->input();
        $event = Event::find($post['eventID']);

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

        $event->save();


        return redirect('/events/show/' . $post['eventID']);
    }
}
