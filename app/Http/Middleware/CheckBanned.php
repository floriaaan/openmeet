<?php

namespace App\Http\Middleware;

use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Closure;


class CheckBanned
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

        if (auth()->user()->isBan(auth()->user()->id )) {
            if (auth()->user()->isBanG(auth()->user()->id )){
            return abort(403, 'BAN ACTIF CONTACTER VOTRE ADMIN');
            }

        }


        return $next($request);

}
}
