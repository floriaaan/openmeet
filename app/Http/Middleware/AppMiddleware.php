<?php

namespace App\Http\Middleware;

use App\Models\Event;
use App\Models\Group;
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

        $groups = auth()->user()->groups_admin();
        if(count($groups) == 0) {
            $groups = Group::inRandomOrder()->limit(3)->get();
        }


        View::share('nav_events', $events);
        View::share('nav_groups', $groups);
        return $next($request);
    }
}
