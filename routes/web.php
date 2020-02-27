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
Route::post('/Install', 'HomeController@installPost');

//NOTIFICATION Routes
Route::get('/Notifications/{userId}', 'NotificationController@showAll');

//ADMIN Routes
Route::get('/Admin', 'AdminController@index');
Route::post('/Admin/edit', 'AdminController@edit');

//GROUP routes
Route::get('/Groups/{userId}', 'GroupController@showAllGroup');
Route::get('/Groups/Add', 'GroupController@addGroup');
Route::post('/Groups/edit', 'GroupController@updateGroup');
Route::get('/Groups/delete', 'GroupController@deleteGroup');

//Events routes
Route::get('/Events/{userId}', 'EventController@showAllEvent');
Route::get('/Events/Add', 'GroupController@addEvent');
Route::post('/Events/edit', 'GroupController@updateEvent');
Route::get('/Events/delete', 'GroupController@deleteEvent');

//

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
