<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Event extends Model
{

    protected $fillable = [
        'idevent',
        'idgroup',
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

    public function create($groupId,$name,$datefrom,$dateto,$country,$zip,$city,$numstreet,$street,$desc)
    {
        $query=DB::table('EVENTS')
            ->insert([
                'id_group'=>$groupId,
                'name'=>$name,
                'datefrom'=>$datefrom,
                'dateto'=>$dateto,
                'country'=>$country,
                'zip'=>$zip,
                'city'=>$city,
                'numstreet'=>$numstreet,
                'street'=>$street,
                'description'=>$desc,
            ]);
    }

    public function show($eventId)
    {
        $event = DB::table('events')
            ->select('*')
            ->where('id','=',$eventId)
            ->get();
    }

    public function showAll($groupId)
    {
            $events=DB::table('events')
                ->select('*')
                ->where('id_group',"=",$groupId)
                ->get();
            $eventsArray=$events;
            $listevent=[];
            foreach ($eventsArray as $eventSQL)
            {
                $listevent[]=$eventSQL;
            }
            return $listevent;
    }

    public function edit($groupId,$description)
    {
        $query= DB::table('events')
            ->where('id_group','=',$groupId)
            ->update([
                'description'=>$description
            ]);
    }

    public function delete($eventId)
    {
        $query=DB::table('events')
            ->delete($eventId);
    }

    public function DeleteTime($eventID)
    {
        $timer=date("Y-m-d H:i:s");
        $query =DB::table('events')
            ->where('dateto', '=', $timer)
            ->delete($eventID);
    }

}
