<?php

namespace App\Http\Controllers;

use App\Ban;
use App\Block;
use App\Event;
use App\Group;
use App\Http\Requests\ReportRequest;
use App\Http\Requests\UserEditRequest;
use App\Mail\EventCreated;
use App\Message;
use App\Notification;
use App\Participation;
use App\Signalement;
use App\Subscription;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {

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

    public function edit(UserEditRequest $request)
    {
        $post = $request->input();
        $user = (new User)->getOne(auth()->id());

        if (!($post['notifications'] == 'none')) {
            $user->defaultnotif = 1;
            if ($post['notifications'] == 'push') {
                $user->typenotif = 1;
            } else if ($post['notifications'] == 'mail') {
                $user->typenotif = 2;
            } else if ($post['notifications'] == 'both') {
                $user->typenotif = 3;
            }
        } else {
            $user->defaultnotif = 0;
            $user->typenotif = 0;
        }

        if ($request->file('uPic') != null) {
            unlink('public/upload/image/' . $user->picrepo . '/' . $user->picname);

            $uploadedFile = $request->file('uPic');
            $filename = time() . md5($uploadedFile->getClientOriginalName()) . '.' . $uploadedFile->extension();


            Storage::disk('local')->putFileAs(
                'public/upload/image/user/' . $user->id . '/',
                $uploadedFile,
                $filename
            );

            $user->picrepo = 'user/' . $user->id;
            $user->picname = $filename;
        }
        (new User)->updateUser($user);

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

        $contentSplitted = mb_str_split($post['description']);
        $contentExt = "";
        $contentExtract = "";

        if (count($contentSplitted) >= 50) {
            for ($i = 0; $i < 50; $i++) {
                {
                    $contentExt = $contentExt . $contentSplitted[$i];
                }
                $contentExtract = $contentExt . ' ...';
            }
        } else {
            $contentExtract = $post['description'];
        }

        foreach ((new User)->getAdmin() as $admin) {
            (new Notification)->CreateNotification('rep',
                'Signalement de ' . (new User)->getOne($post['concerned'])->fname . ' ' . (new User)->getOne($post['concerned'])->lname,
                $admin->id,
                'Contenu du signalement : ' .$contentExtract,
                $report->id);
        }


        return redirect('/');

    }

    public function generateAPIToken($userID)
    {
        (new User)->createApiToken($userID);
        return redirect('/user/edit');
    }
}
