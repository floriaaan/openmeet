<?php

namespace App\Http\Controllers;

use App\Event;
use App\Group;
use App\Http\Requests\GroupCreateRequest;
use App\Subscription;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;


class GroupController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return $this->showAll();
    }

    public function addForm()
    {
        return view('group.create');
    }

    public function addPost(GroupCreateRequest $request)
    {
        $post = $request->input();
        $group = new Group();
        $group->name = $post['gName'];
        $group->admin = $post['gAdminID'];
        $group->datecreate = date('Y-m-d H:i:s');

        if (isset($post['gDesc']) && $post['gDesc'] != '') {
            $group->desc = $post['gDesc'];
        }

        if (isset($post['gTags'])) {
            $group->tags = $post['gTags'];
        }
        $group->push();
        if ($request->file('gPic') != null) {
            $uploadedFile = $request->file('gPic');
            $filename = time() . md5($uploadedFile->getClientOriginalName()) . '.' . $uploadedFile->extension();


            Storage::disk('local')->putFileAs(
                'public/upload/image/group/' . $group->id . '/',
                $uploadedFile,
                $filename
            );

            $group->picrepo = 'group/' . $group->id;
            $group->picname = $filename;
        }
        (new Group)->updateGroup($group);

        $adminSub = new Subscription();
        $adminSub->user = $post['gAdminID'];
        $adminSub->group = $group->id;
        $adminSub->date = date('Y-m-d H:i:s');
        $adminSub->acceptnotif = (new User)->getOne($post['gAdminID'])->defaultnotif;

        $adminSub->push();

        return redirect('/groups/list');
    }

    public function deleteForm($groupID)
    {
        return view('group.delete', [
            'groupID' => $groupID
        ]);
    }

    public function deletePost()
    {

        //ACTIONS
        return redirect('/group/');
    }

    public function show($groupID)
    {


        $group = (new Group)->getOne($groupID);
        $tags = explode(";", $group->tags);

        $datas = [
            'group' => $group,
            'listEvent' => (new Event)->getByGroup($groupID),
            'tags' => $tags
        ];

        if (auth()->check()) {
            $datas['issubscribed'] = (new Subscription)->isSubscribed(auth()->id(), $groupID);
            if (auth()->user()->isBan(auth()->user()->id, $groupID)) {
                return abort(403, 'BAN ACTIF');
            }
        }

        return view('group.show', $datas);
    }

    public function showAll()
    {
        $listGroups = (new Group)->getAll();

        return view('group.list', [
            'listGroups' => $listGroups
        ]);

    }

    public function editForm($groupID)
    {
        return view('group.edit', [
            'group' => (new Group)->getOne($groupID)
        ]);
    }

    public function editPost(GroupCreateRequest $request)
    {
        $post = $request->input();
        $group = (new Group)->getOne($post['groupID']);

        $group->name = $post['gName'];
        $group->desc = $post['gDesc'];
        $group->tags = $post['gTags'];
        $group->admin = $post['gAdminID'];

        if ($request->file('gPic') != null) {
            $uploadedFile = $request->file('gPic');
            $filename = time() . md5($uploadedFile->getClientOriginalName()) . '.' . $uploadedFile->extension();

            //TODO: unlink previous

            Storage::disk('local')->putFileAs(
                'public/upload/image/group/' . $group->id . '/',
                $uploadedFile,
                $filename
            );

            $group->picrepo = 'group/' . $group->id;
            $group->picname = $filename;
        }
        (new Group)->updateGroup($group);


        return redirect('/groups/show/' . $group->id);
    }

}
