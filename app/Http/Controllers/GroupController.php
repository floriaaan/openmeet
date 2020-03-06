<?php

namespace App\Http\Controllers;

use App\Event;
use App\Group;
use App\Http\Requests\GroupCreateRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;


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
        $group->datecrea = date('Y-m-d H:i:s');

        if(isset($post['gDesc']) && $post['gDesc'] == '') {
            $group->desc = $post['gDesc'];
        }

        return redirect('/group/');
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
        return view('group.show', [
            'group' => (new Group)->getOne($groupID),
            'listEvent' => (new Event)->getByGroup($groupID)
        ]);
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
            'groupID' => $groupID
        ]);
    }

    public function editPost()
    {

        //ACTIONS
        return redirect('/group/');
    }
}
