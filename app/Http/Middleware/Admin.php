<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Admin
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
        if(auth()->user()->isadmin == 1){
            return $next($request);
        }
        Session::put('error','Vous n\'avez pas les droits pour accéder à cette page');
        return route('home');

    }
}
