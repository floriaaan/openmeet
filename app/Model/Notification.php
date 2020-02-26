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
        'date'
    ];


    public function create($title,$userId,$content)
    {
        $query=DB::table('NOTIFICATIONS')
            ->insert([
                'NOTIF_TITLE'=>$title,
                'ID_USER'=>$userId,
                'NOTIF_CONTENT'=>$content,
                "NOTIF_DATE"=>(date("Y-m-d H:i:s"))
            ]);
    }

    public function getAll(){
        $query=DB::table('NOTIFICATIONS')
            ->select('*')
            ->get();

        $notificationsArray=$query;
        $listNotification=[];
        foreach ($notificationsArray as $notifSQL)
        {
            $listNotification[]=$notifSQL;
        }
        return $listNotification;
    }

    public function getAllForUser($userId)
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

    public function Remove($notifId)
    {
            $query = DB::table('NOTIFICATIONS')
                ->where('ID_NOTIF','=',$notifId)
                ->delete();
    }

}
