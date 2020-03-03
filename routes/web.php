<?php

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


Auth::routes();

//HOME Routes
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/install', 'HomeController@installPost');


//SUBSCRIPTIONS routes


//USER routes


//ADMIN GROUP routes


//ADMIN Routes
Route::get('/admin', 'AdminController@index');
Route::post('/admin/edit', 'AdminController@edit');


//NOTIFICATION Routes
Route::get('/notifications/', 'NotificationController@showAll'); //TODO: remove session ID

//MESSAGE routes
Route::get('/messages/{userId}','MessageController@showUserConversations');


//SIGNALEMENT routes


//GROUP routes
Route::get('/groups/list', 'GroupController@showAllGroup');
Route::get('/groups/create', 'GroupController@createForm');
Route::post('/groups/create', 'GroupController@addGroup');
Route::get('/groups/edit', 'GroupController@editForm');
Route::post('/groups/edit', 'GroupController@updateGroup');
Route::get('/groups/delete/{group_id}', 'GroupController@deleteGroup');


//EVENTS routes
Route::get('/events/list/', 'EventController@showAllEvents');
Route::get('/events/create', 'GroupController@createForm');
Route::post('/events/create', 'GroupController@addEvent');
Route::get('/events/edit', 'GroupController@editForm');
Route::post('/events/edit', 'GroupController@updateEvent');
Route::get('/events/delete/{event_id}', 'GroupController@deleteEvent');



