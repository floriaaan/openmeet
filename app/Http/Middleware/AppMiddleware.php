<?php

namespace App\Http\Middleware;

use App\Models\Event;
use App\Models\Group;
use App\Models\Message;
use App\Models\Notification;
use Closure;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AppMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        // $notifications = [];
        // if (auth()->check()) {

        // }

        // $messages = [];
        // if (auth()->check()) {

        // }

        $events = Event::where('date_start', '>', new DateTime())
            ->orderBy('date_start', 'DESC')
            ->limit(3)
            ->get();
        $groups = Group::inRandomOrder()->limit(2)->get();

        $messages = [];
        $hasUnread = false;

        
        if (auth()->check()) {
            $events = Event::where('date_start', '>', new DateTime())
                ->orderBy('date_start', 'DESC')
                ->limit(3)
                ->get();



            $groups = auth()->user()->groups_admin();
            $messages = Message::navbar();

            $hasUnread = Notification::hasUnread();
        }


        View::share('nav_events', $events);
        View::share('nav_groups', $groups);
        View::share('nav_messages', $messages);
        View::share('nav_notifications_hasUnread', $hasUnread);
        return $next($request);
    }
}
