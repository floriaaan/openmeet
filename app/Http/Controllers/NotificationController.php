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
        self::DeleteUselessNotification();
        $notif = new Notification();
        $notifications=$notif->getAllForUser($userId);
        foreach ($notifications as $notification){
            self::MakeReadedNotification($notification->ID_NOTIF);
        }

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
            if(($notification->NOTIF_ISREAD)==1){
                $notif->Remove($notification->ID_NOTIF);
            }
        }
    }

    public static function MakeReadedNotification($notifId){
        $notif=new Notification();
        $notif->MakeReaded($notifId);
    }

}
