<?php

namespace App\Providers;

use App\Message;
use App\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NotificationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Récupération des notifications
        $notifications = [];
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $notif = new Notification();
            $notifications = $notif->getLast5ForUser($userId);
        }

        //Récupération des messages
        $messages = [];
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $message = new Message();
        }

        View::share('notifications', $notifications);
        View::share('messages', $messages);
    }
}
