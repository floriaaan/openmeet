<?php

namespace App\Http\Controllers;

use App\Group;
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

    public function addPost()
    {

        //ACTIONS
        return redirect('/group/');
    }

    public function deleteForm()
    {
        return view('group.delete');
    }

    public function deletePost()
    {

        //ACTIONS
        return redirect('/group/');
    }

    public function show($groupID)
    {
        return view('group.show', ['group' => (new Group)->getOne($groupID)]);
    }

    public function showAll()
    {
        $listGroups = (new Group)->getAll();

        return view('group.list', [
            'listGroups' => $listGroups
        ]);

    }
}
