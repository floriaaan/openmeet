<?php

use Illuminate\Http\Request;



//ESSENTIALS
Route::get('/v1/groups/subscribe/{userID}', 'ApiController@getSubscription');
Route::post('/v1/groups/subscribe/', 'ApiController@toggleSubscription');
Route::get('/v1/groups/tags/', 'ApiController@getTags');
Route::post('/v1/events/location', 'ApiController@getELocation');
Route::post('/v1/admin/update', 'ApiController@update');


/*
 * NON ESSENTIALS (need ApiToken in URL)
 */

/*
 * Groups
 */
Route::get('/v1/groups/list/{token}', 'ApiController@getGroups');
Route::get('/v1/groups/get/{group_id}/{token}', 'ApiController@getGroupID');
/*
 * Events
 */
Route::get('/v1/events/list/{token}', 'ApiController@getEvents');
Route::get('/v1/events/get/{group_id}/{token}', 'ApiController@getEvents');

/*
 * Admin
 */
Route::get('/v1/settings/{token}', 'ApiController@getSettings');
Route::get('/v1/users/{token}', 'ApiController@getUsers');





