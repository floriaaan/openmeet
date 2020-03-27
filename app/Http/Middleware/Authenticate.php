<?php

namespace App\Http\Middleware;

use App\Message;
use App\Notification;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

        if (!auth()->check()) {
            $request->session()->flash('error','Vous n\'êtes pas connecté(e).');
            return route('home');
        }

    }
}
