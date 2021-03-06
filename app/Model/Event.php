<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Event extends Model
{

    protected $fillable = [
        'id',
        'group',
        'name',
        'datefrom',
        'dateto',
        'posx',
        'posy',
        'country',
        'zip',
        'city',
        'numstreet',
        'street',
        'description',
        'picrepo',
        'picname'
    ];


    public function showOne($eventId)
    {
        $event = DB::table('events')
            ->select('*')
            ->where('id', '=', $eventId)
            ->get();
    }

    public function showAllEvents($groupId)
    {
        $events = DB::table('events')
            ->select('*')
            ->where('group', "=", $groupId)
            ->get();
        $eventsArray = $events;
        $listevent = [];
        foreach ($eventsArray as $eventSQL) {
            $listevent[] = $eventSQL;
        }
        return $listevent;
    }


    public function DeleteTime($eventID)
    {
        $timer = date("Y-m-d H:i:s");
        $query = DB::table('events')
            ->where('dateto', '<=', $timer)
            ->delete($eventID);
    }

    public function getLimit($limit)
    {
        $query = DB::table('events')
            ->select('*')
            ->limit($limit)
            ->get();


        return $query;

    }

    public function getCount()
    {
        $query = DB::table('events')
            ->select('*')
            ->get();


        return $query->count();

    }

    public function getAll()
    {
        $query = DB::table('events')
            ->select('*')
            ->get();

        $listEvent = [];
        foreach ($query as $event) {
            $listEvent[] = $event;
        }

        return $listEvent;
    }

    public function getOne($eventID)
    {
        $query = DB::table('events')
            ->select('*')
            ->where('id', '=', $eventID)
            ->get();

        return $query[0];
    }

    public function getByGroup($groupID)
    {
        $query = DB::table('events')
            ->select('*')
            ->where('group', '=', $groupID)
            ->get();

        $listEvent = [];
        foreach ($query as $event) {
            $listEvent[] = $event;
        }

        return $listEvent;
    }

    public function getLike($str)
    {
        $query = DB::table('events')
            ->select('*')
            ->where('name', 'LIKE', "%{$str}%")
            ->orWhere('description', 'LIKE', "%{$str}%")
            ->get();
        $listEvent = [];
        foreach ($query as $event) {
            $listEvent[] = $event;
        }

        return $listEvent;
    }

    public function getLimitDesc($limit)
    {
        $query = DB::table('events')
            ->select('*')
            ->limit($limit)
            ->orderByDesc('id')
            ->get();


        return $query;
    }

    public function getLimitGroupDesc($groupID, $limit)
    {
        $query = DB::table('events')
            ->select('*')
            ->where('group', $groupID)
            ->limit($limit)
            ->orderByDesc('id')
            ->get();


        return $query;
    }

    public function getByArea($lon, $lat, $limit)
    {
        $query = DB::table('events')
            ->select('*')
            ->where('posx', '>=', $lon - 0.1)
            ->where('posx', '<=', $lon + 0.1)
            ->where('posy', '>=', $lat - 0.1)
            ->where('posy', '<=', $lat + 0.1)
            ->limit($limit)
            ->get();

        return $query;
    }

    public function updateEvent($event)
    {
        DB::table('events')
            ->where('id', $event->id)
            ->update(['name' => $event->name]);


        DB::table('events')
            ->where('id', $event->id)
            ->update(['datefrom' => $event->datefrom]);

        DB::table('events')
            ->where('id', $event->id)
            ->update(['dateto' => $event->dateto]);

        DB::table('events')
            ->where('id', $event->id)
            ->update(['numstreet' => $event->numstreet]);

        DB::table('events')
            ->where('id', $event->id)
            ->update(['street' => $event->street]);

        DB::table('events')
            ->where('id', $event->id)
            ->update(['city' => $event->city]);

        DB::table('events')
            ->where('id', $event->id)
            ->update(['zip' => $event->zip]);

        DB::table('events')
            ->where('id', $event->id)
            ->update(['country' => $event->country]);

        DB::table('events')
            ->where('id', $event->id)
            ->update(['posx' => $event->posx]);

        DB::table('events')
            ->where('id', $event->id)
            ->update(['posy' => $event->posy]);

        DB::table('events')
            ->where('id', $event->id)
            ->update(['description' => $event->description]);

        DB::table('events')
            ->where('id', $event->id)
            ->update(['picrepo' => $event->picrepo]);

        DB::table('events')
            ->where('id', $event->id)
            ->update(['picname' => $event->picname]);
    }

    public function remove($eventID)
    {

        $list = (new Participation)->getEvent($eventID);

        foreach ($list as $participation) {
            (new Participation)->remove($participation->id);
        }

        try {
            $query = DB::table('events')
                ->delete($eventID);
            return true;
        } catch (\Exception $e) {
            return $e;
        }

    }
}
