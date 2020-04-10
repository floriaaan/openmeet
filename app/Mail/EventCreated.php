<?php

namespace App\Mail;

use App\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $event;

    /**
     * Create a new message instance.
     *
     * @param Event $event
     */
    public function __construct($event)
    {
        $this->event = $event;
        $this->subject(Setting('openmeet.name') . ' - Invitation à un évenement');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@'.strtolower(Setting('openmeet.name', 'openmeet')).'.fr')
            ->view('emails.eventcreated');
    }
}
