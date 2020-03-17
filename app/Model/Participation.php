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


    public function getOne($participationId)
    {
        $query = DB::table('participations')
            ->select('*')
            ->find($participationId)
            ->get();

        return $query[0];
    }

    public function getEvent($eventId)
    {
        $query = DB::table('participations')
            ->select('*')
            ->where('event', "=", $eventId)
            ->get();
        $listParticipation = [];
        foreach ($query as $participation) {
            $listParticipation[] = $participation;
        }
        return $listParticipation;
    }

    public function getUser($userId)
    {
        $query = DB::table('participations')
            ->select('*')
            ->where('user', "=", $userId)
            ->get();

        $listParticipation = [];
        foreach ($query as $participation) {
            $listParticipation[] = $participation;
        }
        return $listParticipation;
    }


    public function remove($parId)
    {
        try {
            $query = DB::table('participations')
                ->delete($parId);
            return true;
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function isParticipating($userID, $eventID)
    {
        $query = DB::table('participations')
            ->select('*')
            ->where('user', '=', $userID)
            ->where('event', '=', $eventID)
            ->get();

        return !empty($query[0]);
    }

    public function getParticipating($userID, $eventID)
    {
        $query = DB::table('participations')
            ->select('*')
            ->where('user', '=', $userID)
            ->where('event', '=', $eventID)
            ->get();

        return $query[0];
    }

    public function getCount($eventID)
    {
        return count((new Participation)->getEvent($eventID));
    }
}
