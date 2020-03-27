<?php

namespace App\Http\Controllers;

use App\Ban;
use App\Block;
use App\Event;
use App\Group;
use App\Http\Requests\BanRequest;
use App\Http\Requests\BlockRequest;
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
        $block = new Block();
        $isBlocked = $block->isBlock(auth()->id(),auth()->id());


        return view('user.show', [
            'user' => (new User)->getOne(auth()->id()),
            'groups' => $groups,
            'events' => $events,
            'isBlocked'=>$isBlocked

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

        $block = new Block();
        $isBlocked = $block->isBlock($userID,auth()->id());


        return view('user.show', [
            'user' => (new User)->getOne($userID),
            'groups' => $groups,
            'events' => $events,
            'isBlocked'=>$isBlocked
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
            if(!Storage::exists('public/upload/image/' . $user->picrepo . '/' . $user->picname)) {
                Storage::delete('public/upload/image/' . $user->picrepo . '/' . $user->picname);
            }
            if(!Storage::exists('public/upload/image/user')) {
                Storage::makeDirectory('public/upload/image/user');
            }
            if(!Storage::exists('public/upload/image/user/'.$user->id)){
                Storage::makeDirectory('public/upload/image/user/'.$user->id);
            }

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


    public function banForm($groupID,$userID)
    {

        return view('user.ban.form', [
            'banisher' => (new Group)->getOne($groupID),
            'banned' => (new User)->getOne($userID),
            'auth' => auth()->id()
        ]);
    }

    public function banPost(BanRequest $request)
    {
        $post = $request->input();


        if($post['auth'] == (new Group)->getOne($post['banisher'])->admin
            && !(new Ban)->isBan($post['banned'], $post['banisher'])) {
            $ban = new Ban();
            $ban->banisher = $post['banisher'];
            $ban->banned = $post['banned'];
            $ban->description = $post['description'];
            $ban->date = date('Y-m-d H:m:s');

            $ban->push();
        }


        return redirect('/');

    }


        public function blockForm($userID)
    {
        return view('user.block.form', [
            'blocker' => auth()->id(),
            'target' => (new User)->getOne($userID)
        ]);
    }

    public function blockPost(BlockRequest $request)
    {
        $post = $request->input();

        $block = new Block();
        $block->blocker = $post['blocker'];
        $block->target = $post['target'];
        $block->description = $post['description'];
        $block->date = date('Y-m-d H:m:s');

        $block->push();

        return redirect('/user/show/'.$post['target']);
    }


    public function deleteBlock($userID)
    {
        (new Block)->removeBlock($userID);
        return redirect('/user/show/'.$userID);

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
