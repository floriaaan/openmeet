<?php

namespace App\Http\Middleware;

use Closure;

class DisableEngine
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
        if (auth()->user()->disabled) {
            $request->session()->flash('error', 'Vous avez été désactivé(e).');
            return route('home');
        }
        return $next($request);
    }
}
