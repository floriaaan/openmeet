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

    public function showAll()
    {
        $notif = new Notification();
        $notifications = $notif->getAllUser(auth()->id());

        return view('notification.list',
            [
                'notifications' => $notifications
            ]);

    }

    public static function CreateNotification($type,$title, $userId, $content, $concerned)
    {
        $notif = new Notification();
        $notif->title = $title;
        $notif->id_user=$userId;
        $notif->content=$content;
        $notif->concerned=$concerned;
        $notif->date= date('Y-m-d H:i:s');
        $notif->type=$type;

        $notif->push();
    }

    public static function DeleteUselessNotification()
    {
        $notif = new Notification();
        $notifications = $notif->getAll();
        foreach ($notifications as $notification) {
            if(($notification->isread) == 1) {
                //$notif->Remove($notification->ID_NOTIF);
            }
        }
    }

    public static function MakeReadedNotification($notifId)
    {
        $notif = new Notification();
        $notif->MakeReaded($notifId);
    }

    public static function readAll(Request $request)
    {
        $user = $request->input('user');
        (new Notification)->readAllUser($user);
        return redirect('/notifications');

    }

}
