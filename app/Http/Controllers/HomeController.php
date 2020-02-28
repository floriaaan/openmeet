<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId=auth()->user()->id;
        $notif = new Notification();
        $notifications=$notif->getAllForUser($userId);

        return view('home',[
            'notifications'=>$notifications
        ]);
    }
}
