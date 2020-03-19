<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/v1/session/unset/error', function (Request $request) {

    return Session()->write($request['sessionid'], ['error' => null]);
});

//Route::get('/v1/users/', 'ApiController@getUsers');


Route::get('/v1/groups/', 'ApiController@getGroups');
Route::get('/v1/groups/subscribe/{userID}', 'ApiController@getSubscription');
Route::post('/v1/groups/subscribe/', 'ApiController@toggleSubscription');


Route::get('/v1/events/', 'ApiController@getEvents');
Route::post('/v1/events/location', 'ApiController@getELocation');


Route::get('/v1/settings/', 'ApiController@getSettings');





