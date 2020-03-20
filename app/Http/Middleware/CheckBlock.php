<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Closure;

class CheckBlock
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
        if (auth()->user()->isBlock(auth()->user()->id)) {
            return abort(403,'BLOCAGE ACTIF');
        }

        return $next($request);

    }
}
