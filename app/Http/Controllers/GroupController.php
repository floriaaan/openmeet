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

    public function AddGroup()
    {
        $userId=auth()->user()->id;
        return view('group.creategroup', [
           'userId'=>$userId
        ]);
    }

    public function Deletegroup()
    {
        //
    }

    public function showAllGroups(){

    }
}
