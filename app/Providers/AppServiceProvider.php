<?php

namespace App\Providers;

use App\Notification;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        /*(auth()->check()) ? $notifications = (new Notification)->getAllForUser(auth()->user()->id) : $notifications = [];
        View::share('notifications', $notifications);*/
    }
}
