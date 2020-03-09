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
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && !empty((new Group)->getByAdmin(auth()->id()))) {
            return $next($request);
        }
        Session::put('error', 'Vous n\'êtes pas administrateur de groupe.');
        return redirect('/');


    }
}
