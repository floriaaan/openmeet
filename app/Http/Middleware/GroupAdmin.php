<?php

namespace App\Http\Middleware;

use App\Group;
use Closure;
use Illuminate\Support\Facades\Session;

class GroupAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->check()) {
           $uid = auth()->user()->id;
            if(!empty((new Group)->getByAdmin($uid))) {
                return $next($request);
            }
        }

        Session::put('error','Vous n\'avez pas les droits pour accéder à cette page');
        return route('home');

    }
}
