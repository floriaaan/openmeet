<?php

namespace App\Http\Controllers;

use App\Event;
use App\Group;
use App\Http\Requests\GroupCreateRequest;
use App\Model\Alert;
use App\Subscription;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
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
        $group->save();
        if ($request->hasFile('gPic')) {
            if (Storage::exists('public/upload/image/' . $group->picrepo . '/' . $group->picname)) {
                Storage::delete('public/upload/image/' . $group->picrepo . '/' . $group->picname);
            }
            if (!Storage::exists('public/upload/image/group')) {
                Storage::makeDirectory('public/upload/image/group');
            }
            if (!Storage::exists('public/upload/image/group/' . $group->id)) {
                Storage::makeDirectory('public/upload/image/group/' . $group->id);
            }

            $uploadedFile = $request->file('gPic');
            $filename = time() . md5($uploadedFile->getClientOriginalName()) . '.' . $uploadedFile->extension();


            Storage::disk('local')->putFileAs(
                'public/upload/image/group/' . $group->id . '/',
                $uploadedFile,
                $filename
            );

            $group->picrepo = 'group/' . $group->id;
            $group->picname = $filename;
        } else {
            if ($post['gPhotoUrl'] != null && $post['gPhotoUrl'] != "") {
                $urlExploded = explode('/', $post['gPhotoUrl']);
                for ($i = 0; $i < count($urlExploded) - 2; $i++) {
                    $group->picrepo = $group->picrepo . $urlExploded[$i] . '/';
                }
                $group->picname = $urlExploded[$i + 1];
            } else {
            }
        }
        $group->save();

        $adminSub = new Subscription();
        $adminSub->user = $post['gAdminID'];
        $adminSub->group = $group->id;
        $adminSub->date = date('Y-m-d H:i:s');
        $adminSub->acceptnotif = User::find($post['gAdminID'])->defaultnotif;

        $adminSub->save();

        return redirect('/groups/list');
    }

    public function deleteForm($groupID)
    {
        return view('group.delete', [
            'group' => Group::find($groupID)
        ]);
    }

    public function deletePost(Request $request)
    {
        $post = $request->input();
        $group = Group::find($post['group']);
        $group->delete();
        $group->save();
        (new Group)->remove($post['group']);

        return redirect('/groups/list');
    }

    public function show($group)
    {


        $group = Group::find($group);
        $tags = explode(";", $group->tags);

        $datas = [
            'group' => $group,
            'listEvent' => Event::where('group', '=', $group->id)->get(),
            'tags' => $tags
        ];

        $alerts = Alert::where('group', '=', 1)->where('disabled', '=', '0')->get();
        if (count($alerts) >= 1) {
            $alert = $alerts[count($alerts) - 1];
            Session()->flash('info', [
                'title' => $alert->title,
                'text' => $alert->content,
                'link' => $alert->link,
                'color' => $alert->color
            ]);
        }



        if (auth()->check()) {
            $datas['issubscribed'] = (new Subscription)->isSubscribed(auth()->id(), $group->id);
            if (auth()->user()->isBan(auth()->user()->id, $group->id)) {
                return view('user.ban.banshow');
            }
        }

        return view('group.show', $datas);
    }

    public function showAll()
    {
        $listGroups = Group::all();

        $alerts = Alert::where('groupList', '=', 1)->where('disabled', '=', '0')->get();

        if (count($alerts) >= 1) {
            $alert = $alerts[count($alerts) - 1];
            Session()->flash('info', [
                'title' => $alert->title,
                'text' => $alert->content,
                'link' => $alert->link,
                'color' => $alert->color
            ]);
        }

        return view('group.list', [
            'listGroups' => $listGroups
        ]);
    }

    public function editForm($groupID)
    {
        return view('group.edit', [
            'group' => Group::find($groupID)
        ]);
    }

    public function editPost(GroupCreateRequest $request)
    {
        $post = $request->input();
        $group = Group::find($post['groupID']);

        $group->name = $post['gName'];
        $group->desc = $post['gDesc'];
        $group->tags = $post['gTags'];
        $group->admin = $post['gAdminID'];

        if ($request->file('gPic') != null) {
            if (!Storage::exists('public/upload/image/' . $group->picrepo . '/' . $group->picname)) {
                Storage::delete('public/upload/image/' . $group->picrepo . '/' . $group->picname);
            }
            if (!Storage::exists('public/upload/image/group')) {
                Storage::makeDirectory('public/upload/image/group');
            }
            if (!Storage::exists('public/upload/image/group/' . $group->id)) {
                Storage::makeDirectory('public/upload/image/group/' . $group->id);
            }

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
        $group->save();


        return redirect('/groups/show/' . $group->id);
    }
}
