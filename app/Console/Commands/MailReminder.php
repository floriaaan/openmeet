<?php

namespace App\Console\Commands;

use App\Event;
use App\Mail\EventReminder;
use App\Participation;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:mailreminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to all participants of an event which is going to be tomorrow';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public static function handle()
    {
        $eventsSoon = DB::table('events')
            ->select('*')
            ->whereBetween('datefrom', [date('Y-m-d H:i:s'), date('Y-m-d 23:59:59', strtotime("+1 day"))])
            ->get();

        $returnArray = [];
        foreach ($eventsSoon as $event) {

            $participants = (new Participation)->getEvent($event->id);

            foreach ($participants as $participant) {

                $user = (new User)->getOne($participant->user);
                Mail::to($user->email)
                    ->send(new EventReminder((new Event)->getOne($event->id)));

                $returnArray[] = $participant->user;
            }
        }

        if(!empty($returnArray)) {
            return json_encode($returnArray, true);
        } else {
            return 'Nobody to remind.';
        }
    }
}
