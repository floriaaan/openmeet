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


//ESSENTIALS
Route::get('/v1/groups/subscribe/{userID}', 'ApiController@getSubscription');
Route::post('/v1/groups/subscribe/', 'ApiController@toggleSubscription');
Route::get('/v1/groups/tags/', 'ApiController@getTags');
Route::post('/v1/events/location', 'ApiController@getELocation');


//NON ESSENTIALS (need ApiToken)
Route::get('/v1/groups/{token}', 'ApiController@getGroups');
Route::get('/v1/events/{token}', 'ApiController@getEvents');
Route::get('/v1/settings/{token}', 'ApiController@getSettings');
Route::get('/v1/users/{token}', 'ApiController@getUsers');





