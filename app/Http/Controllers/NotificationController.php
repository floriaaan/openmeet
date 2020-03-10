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

    public function showAll(){
        $notif = new Notification();
        $notifications=$notif->getAllForUser(auth()->id());

        return view('notification.list',
            [
                'notifications'=>$notifications
            ]);

    }

    public static function CreateNotification($title,$userId,$content){
        $notifsend=new Notification();
        $notifsend->create($title,$userId,$content);

    }

    public static function DeleteUselessNotification(){
        $notif=new Notification();
        $notifications=$notif->getAll();
        foreach ($notifications as $notification){
            if(($notification->isread)==1){
               //$notif->Remove($notification->ID_NOTIF);
            }
        }
    }

    public static function MakeReadedNotification($notifId){
        $notif=new Notification();
        $notif->MakeReaded($notifId);
    }

}
