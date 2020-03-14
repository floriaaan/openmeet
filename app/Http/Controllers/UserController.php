<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('user.show', ['user' => (new User)->getOne(auth()->id())]);
    }

    public function show($userID){
        return view('user.show', ['user' => (new User)->getOne($userID)]);
    }

    public function reportForm($userID) {
        return 'préparation du pas cool ' . $userID;
    }

    public function reportPost() {
        return 'el famoso pas cool';
    }
}
