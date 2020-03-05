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
        'id_group',
        'participant',
        'name',
        'datefrom',
        'dateto',
        'posX',
        'posY',
        'country',
        'zip',
        'city',
        'numstreet',
        'street',
        'desc',
    ];

    public function create($groupId, $name, $datefrom, $dateto, $country, $zip, $city, $numstreet, $street, $desc)
    {
        $query = DB::table('events')
            ->insert([
                'id_group' => $groupId,
                'name' => $name,
                'datefrom' => $datefrom,
                'dateto' => $dateto,
                'country' => $country,
                'zip' => $zip,
                'city' => $city,
                'numstreet' => $numstreet,
                'street' => $street,
                'description' => $desc,
            ]);
    }

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
            ->where('id_group', "=", $groupId)
            ->get();
        $eventsArray = $events;
        $listevent = [];
        foreach ($eventsArray as $eventSQL) {
            $listevent[] = $eventSQL;
        }
        return $listevent;
    }

    public function updateEvent($groupId, $name, $datefrom, $dateto, $country, $zip, $city, $numstreet, $street, $desc)
    {
        $query = DB::table('events')
            ->where('id_group', '=', $groupId)
            ->update([
                'name' => $name,
                'datefrom' => $datefrom,
                'dateto' => $dateto,
                'country' => $country,
                'zip' => $zip,
                'city' => $city,
                'numstreet' => $numstreet,
                'street' => $street,
                'description' => $desc,
            ]);
    }

    public function delete()
    {
        $query = DB::table('events')
            ->delete();
    }

    public function DeleteTime($eventID)
    {
        $timer = date("Y-m-d H:i:s");
        $query = DB::table('events')
            ->where('dateto', '=', $timer)
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
}
