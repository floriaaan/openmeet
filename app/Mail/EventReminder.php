<?php

namespace App\Mail;

use App\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class EventReminder extends Mailable
{

    use Queueable, SerializesModels;

    public $event;


    public function __construct($event)
    {
        $this->event = $event;
        $this->subject(Setting('openmeet.name') . ' - Rappel d\'évenement');

    }

    public function build()
    {
        return $this->from('no-reply@' . strtolower(Setting('openmeet.name', 'openmeet')) . '.fr')
            ->view('emails.reminder');
    }


}
