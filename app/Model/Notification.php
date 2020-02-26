<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{
    protected $fillable = [
        'id',
        'user',
        'title',
        'isread',
        'content',
        'date'
    ];


    public function create()
    {
        //
    }

    public function showAll($userId)
    {
        $query=DB::table('NOTIFICATIONS')
            ->select('*')
            ->where('ID_USER',"=",$userId)
            ->get();
        $notificationsArray=$query;
        $listNotification=[];
        foreach ($notificationsArray as $notifSQL)
        {
            $listNotification[]=$notifSQL;
        }
        return $listNotification;
    }


    public function MakeReaded($id)
    {
        $query=DB::table('NOTIFICATIONS')
            ->where('ID_NOTIF','=',$id)
            ->update(['NOTIF_ISREAD'=>1]);

    }
    public function Delete($notifId)
    {
        $query=DB::table('NOTIFICATIONS')
            ->delete($notifId);
    }

}
