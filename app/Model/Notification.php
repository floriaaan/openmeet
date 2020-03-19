<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{
    protected $fillable = [
        'id',
        'user',
        'title',
        'isread',
        'content',
        'date',
        'concerned'
    ];


    public function getAll()
    {
        $query = DB::table('notifications')
            ->select('*')
            ->get();

        $notificationsArray = $query;
        $listNotification = [];
        foreach ($notificationsArray as $notifSQL) {
            $listNotification[] = $notifSQL;
        }
        return $listNotification;
    }

    public function getAllUser($userId)
    {
        $query = DB::table('notifications')
            ->select('*')
            ->where('id_user', "=", $userId)
            ->where('isread', "=", 0)
            ->get();

        $listNotification = [];
        foreach ($query as $notifSQL) {
            $listNotification[] = $notifSQL;
        }
        return $listNotification;
    }

    public function getLast5ForUser($userId)
    {
        $query = DB::table('notifications')
            ->select('*')
            ->where('id_user', "=", $userId)
            ->where('isread', "=", 0)
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();
        $notificationsArray = $query;
        $listNotification = [];
        foreach ($notificationsArray as $notifSQL) {
            $listNotification[] = $notifSQL;
        }
        return $listNotification;
    }


    public function MakeReaded($id)
    {
        $query = DB::table('notifications')
            ->where('id', '=', $id)
            ->update(['isread' => 1]);

    }

    public function Remove($notifId)
    {
        $query = DB::table('notifications')
            ->delete($notifId);
    }

    public function readAllUser($userID)
    {
        try {
            $query = DB::table('notifications')
                ->where('id_user', '=', $userID)
                ->update(['isread' => 1]);
            return true;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function notifyOnEvent($event){

    }

}
