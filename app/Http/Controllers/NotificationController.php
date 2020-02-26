<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;


class NotificationController extends Controller
{

    public function index()
    {
        //
    }

    public function showAll($userId){
        $notif = new Notification();
        $notifications=$notif->showAll($userId);

        return view('notification.showall',
            [
                'notifications'=>$notifications
            ]);

    }










}
