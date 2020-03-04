<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show($userID){
        return 'coucou ' . $userID;
    }

    public function reportForm($userID) {
        return 'préparation du pas cool ' . $userID;
    }

    public function reportPost() {
        return 'el famoso pas cool';
    }
}
