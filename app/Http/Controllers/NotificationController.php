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
        $notifications=$notif->getAllForUser($userId);

        return view('notification.showall',
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
