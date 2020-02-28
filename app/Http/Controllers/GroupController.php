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
        //
    }

    public function AddGroup($userId)
    {
        $group = new Group();
        $groups=$group->AddGroup($userId);
        return view('group.creategroup',
            [
                'Groups'=>$groups
            ]);

    }

    public function Deletegroup()
    {
        //
    }

    public function showAllGroup($userId){
        $group = new Group();
        $groups=$group->showAllGroup($userId);

        return view('group.listgroup',
            [
                'Groups'=>$groups
            ]);

    }
}
