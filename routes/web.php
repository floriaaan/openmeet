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
Route::post('/install', 'HomeController@installPost');

//SUBSCRIPTIONS routes


//USER routes


//ADMIN GROUP routes


//ADMIN Routes
Route::get('/admin', 'AdminController@index');
Route::post('/admin/edit', 'AdminController@edit');


//NOTIFICATION Routes
Route::get('/notifications/{userId}', 'NotificationController@showAll'); //TODO: remove session ID

//MESSAGE routes
Route::get('/messages/{userId}','MessageController@showUserConversations');


//SIGNALEMENT routes


//GROUP routes
Route::get('/groups/{userId}', 'GroupController@showAllGroup'); //TODO: remove session ID
Route::get('/groups/Add', 'GroupController@addGroup');
Route::post('/groups/Add', 'GroupController@addGroup');
Route::post('/groups/edit', 'GroupController@updateGroup');
Route::get('/groups/delete', 'GroupController@deleteGroup');


//EVENTS routes
Route::get('/events/{userId}', 'EventController@showAllEvents'); //TODO: remove session ID
Route::get('/events/Add', 'GroupController@addEvent');
Route::post('/events/Add', 'GroupController@addEvent');
Route::post('/events/edit', 'GroupController@updateEvent');
Route::get('/events/delete', 'GroupController@deleteEvent');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
