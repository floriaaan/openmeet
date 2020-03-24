<?php

namespace App\Http\Middleware;

use App\Message;
use App\Notification;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Notifications
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Récupération des notifications
        $notifications = [];
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $notif = new Notification();
            $notifications = $notif->getNav($userId);
        }

        //Récupération des messages
        $messages = [];
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $message = new Message();
        }


        View::share('notifsnav', $notifications);
        View::share('messages', $messages);
        return $next($request);
    }
}
