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

Route::get('/', 'ApplicationController@index')->name('index');
Route::get('/search', 'ApplicationController@search_get')->name('search.get');
Route::post('/search', 'ApplicationController@search_post')->name('search.post');

Route::resources([
    'group' => 'GroupController',
    'event' => 'EventController',
]);


Route::middleware(['auth'])->group(function () {

    Route::prefix('group')->group(function () {
        Route::post('/subscribe', 'GroupController@subscribe')->name('group.subscribe');
    });
    Route::prefix('event')->group(function () {
        Route::post('/participate', 'EventController@participate')->name('event.participate');
    });

    Route::prefix('message')->group(function () {
        Route::get('/', 'MessageController@index')->name('message.index');
        Route::get('/new', 'MessageController@new')->name('message.new');
        Route::get('/{user_id}', 'MessageController@show')->name('message.show');
        Route::post('/', 'MessageController@store')->name('message.create');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/', 'SuperController@index')->name('admin.index');
    });
});
