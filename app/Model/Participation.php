<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Participation extends Model
{
    protected $fillable = [
        'id',
        'user',
        'event',
    ];


    public function getOne($parId)
    {
        $query=DB::table('participations')
            ->select('*')
            ->find($parId)
            ->get();

        var_dump($query);
    }

    public function getAllForEvent($eventId)
    {
        $query=DB::table('participations')
            ->select('*')
            ->where('event',"=",$eventId)
            ->get();
        $participationsArray=$query;
        $listParticipation=[];
        foreach ($participationsArray as $parSQL)
        {
            $listParticipation[]=$parSQL;
        }
        return $listParticipation;
    }

    public function getAllForUser($userId)
    {
        $query=DB::table('participations')
            ->select('*')
            ->where('user',"=",$userId)
            ->get();

        $participationsArray=$query;
        $listParticipation=[];
        foreach ($participationsArray as $parSQL)
        {
            $listParticipation[]=$parSQL;
        }
        return $listParticipation;
    }


    public function Remove($parId)
    {
        $query = DB::table('participations')
            ->delete($parId);
    }
}
