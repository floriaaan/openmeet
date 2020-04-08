<?php

namespace App\Mail;

use App\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class CheckMail extends Mailable
{
    public static function check(){
        $querySoonEvents = DB::table('events')
            ->select('*')
            ->where('datefrom','>' , date('Y-m-d H:i:s'))
            ->where('datefrom','>',date('Y-m-d H:i:s',strtotime("+1 day")))
            ->where('datefrom','<',date('Y-m-d H:i:s',strtotime("+1 day +5minutes")))
            ->get();

        foreach ($querySoonEvents as $oneEvent){
            $querySoonEventsParticipants = DB::table('participations')
                ->select('*')
                ->where('event','=',$oneEvent->id)
                ->get();
        }
        if (isset($querySoonEventsParticipants)){
            $usersToSend='';
            foreach ($querySoonEventsParticipants as $oneUser){
                //todo fonction
                $usersToSend = $usersToSend.$oneUser->user.', ';
            }
            return $usersToSend;
        }
        else{
            return 'no mail to send';
        }


    }

}
