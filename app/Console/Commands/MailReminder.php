<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
            ->where('datefrom', '>', date('Y-m-d H:i:s'))
            ->where('datefrom', '>', date('Y-m-d H:i:s', strtotime("+1 day")))
            ->where('datefrom', '<', date('Y-m-d H:i:s', strtotime("+1 day +5minutes")))
            ->get();

        $returnArray = [];
        foreach ($eventsSoon as $event) {
            $participants = DB::table('participations')
                ->select('*')
                ->where('event', '=', $event->id)
                ->get();

            foreach ($participants as $participant) {
                $user = (new User)->getOne($participant->user);
                /*Mail::to($user->email)
                    ->send(new CheckMail((new Event)->getOne($event->id), $user));*/

                $returnArray[] = $participant->user;
            }
        }

        if(!empty($returnArray)) {
            return $returnArray;
        } else {
            return 'Nobody to remind.';
        }
    }
}
