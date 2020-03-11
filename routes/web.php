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
Route::get('/home', 'HomeController@home')->name('home');
Route::post('/install', 'HomeController@installPost');
Route::post('/search', 'HomeController@search');


//SUBSCRIPTIONS routes
Route::get('/groups/list/{userID}', 'SubscriptionController@ShowUserSubs');


//PARTICIPATIONS routes
Route::get('/events/list/{userID}', 'ParticipationController@ShowUserEvents');

//USER routes
Route::get('/user/show/{userID}', 'UserController@show');
Route::get('/user/report/{userID}', 'UserController@reportForm');
Route::post('/user/report/', 'UserController@reportPost');

//ADMIN GROUP routes


//ADMIN Routes
Route::get('/admin', 'AdminController@index');
Route::post('/admin/edit/settings', 'AdminController@editSettings');
Route::post('/admin/edit/theme', 'AdminController@editTheme');
Route::post('/admin/edit/privacy', 'AdminController@editPrivacy');
Route::get('/admin/user/', 'AdminController@listUser');
Route::get('/admin/user/delete/{userID}', 'AdminController@deleteUser');
Route::get('/admin/user/delete/confirmed/{userID}', 'AdminController@deleteConfirmed');


//NOTIFICATION Routes
Route::get('/notifications/', 'NotificationController@showAll')->middleware('auth');

//MESSAGE routes
Route::get('/messages','MessageController@showUserConversations')->middleware('auth');
Route::get('/messages/{typeConversation}/{correspondant}','MessageController@showChat')->middleware('auth');


//SIGNALEMENT routes


//GROUP routes
Route::get('/groups/show/{group_id}', 'GroupController@show');
Route::get('/groups/list', 'GroupController@showAll');
Route::get('/groups/create', 'GroupController@addForm')->middleware('auth');
Route::post('/groups/create', 'GroupController@addPost')->middleware('auth');
Route::get('/groups/edit/{group_id}', 'GroupController@editForm')->middleware('groupadmin');
Route::post('/groups/edit', 'GroupController@editPost')->middleware('groupadmin');
Route::get('/groups/delete/{group_id}', 'GroupController@deleteForm')->middleware('groupadmin');
Route::post('/groups/delete/', 'GroupController@deletePost')->middleware('groupadmin');
Route::post('groups/subscribe', 'GroupController@subscribe')->middleware('auth');


//EVENTS routes
Route::get('/events/show/{event_id}', 'EventController@show');
Route::get('/events/list/', 'EventController@showAll');
Route::get('/events/create', 'EventController@addForm')->middleware('groupadmin');
Route::post('/events/create', 'EventController@addPost')->middleware('groupadmin');
Route::get('/events/edit/{event_id}', 'EventController@editForm');
Route::post('/events/edit', 'EventController@editPost');
Route::get('/events/delete/{event_id}', 'EventController@deleteForm');
Route::get('/events/delete/', 'EventController@deletePost');



