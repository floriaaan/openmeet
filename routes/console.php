<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('check:mailreminder',function (){
   $this->comment(\App\Console\Commands\MailReminder::handle());
})->describe('Send an email to all participants of an event which is going to be tomorrow');

Artisan::command('check:update', function () {
    $this->comment(\App\Console\Commands\Update::handle());
})->describe('Check for an update and if there\'s one, doing it. (git pull)');
