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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
