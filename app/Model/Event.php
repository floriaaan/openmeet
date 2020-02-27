<?php

namespace App;
use Carbon\Carbon;
use Faker\Provider\DateTime;
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

    public function show()
    {
        $events  = DB::table('events')
            ->select('*')
            ->where('id_group')
            ->get();
    }

    public function showall($groupId)
    {
            $event=DB::table('events')
                ->select('*')
                ->where('id_group',"=",$groupId)
                ->get();
            $eventsArray=$event;
            $listevent=[];
            foreach ($eventsArray as $eventSQL)
            {
                $listevent[]=$eventSQL;
            }
            return $listevent;
    }

    public function edit($groupId)
    {
        $events= DB::table('events')
            ->update($groupId);
    }

    public function delete($groupId)
    {
        $query=DB::table('events')
            ->delete($groupId);
    }

    public function DeleteTime($eventID)
    {
        $timer = DateTime::dateTime(now());
        $events =DB::table('events')
            ->where('dateto', '=', value($timer))
            ->delete($eventID);
    }

}
