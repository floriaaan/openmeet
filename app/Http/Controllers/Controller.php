<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $notifications = [];
        if(auth()->check()) {
            $userId=auth()->user()->id;
            $notif = new Notification();
            $notifications=$notif->getAllForUser($userId);
        }
        View::share('notifications', $notifications);
    }
}
