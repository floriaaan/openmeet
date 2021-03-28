<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['app'])->group(function () {
    Route::get('/', 'ApplicationController@index')->name('index');

    Route::resources([
        'group' => 'GroupController',
        'event' => 'EventController',
    ]);


    Route::middleware(['auth'])->group(function () {
        Route::prefix('message')->group(function() {
            Route::get('/', 'MessageController@index')->name('message.index');
            Route::get('/{user_id}', 'MessageController@show')->name('message.show');
        });

        Route::prefix('admin')->group(function () {
            Route::get('/', 'SuperController@index')->name('admin.index');
        });
    });
});
