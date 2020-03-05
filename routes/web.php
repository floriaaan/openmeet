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
Route::get('/notifications/', 'NotificationController@showAll'); //TODO: remove session ID

//MESSAGE routes
Route::get('/messages/{userId}','MessageController@showUserConversations');


//SIGNALEMENT routes


//GROUP routes
Route::get('/groups/show/{group_id}', 'GroupController@show');
Route::get('/groups/list', 'GroupController@showAll');
Route::get('/groups/create', 'GroupController@addForm');
Route::post('/groups/create', 'GroupController@addPost');
Route::get('/groups/edit/{group_id}', 'GroupController@editForm');
Route::post('/groups/edit', 'GroupController@editPost');
Route::get('/groups/delete/{group_id}', 'GroupController@deleteForm');
Route::post('/groups/delete/', 'GroupController@deletePost');


//EVENTS routes
Route::get('/events/show/{event_id}', 'EventController@show');
Route::get('/events/list/', 'EventController@showAll');
Route::get('/events/create', 'EventController@addForm');
Route::post('/events/create', 'EventController@addPost');
Route::get('/events/edit/{event_id}', 'EventController@editForm');
Route::post('/events/edit', 'EventController@editPost');
Route::get('/events/delete/{event_id}', 'EventController@deleteForm');
Route::get('/events/delete/', 'EventController@deletePost');



