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

Route::get('/', 'HomeController@index');
Route::post('/Install', 'HomeController@installPost');

Route::get('/Register', 'AuthController@registerForm');
Route::post('/Register', 'AuthController@registerPost');

Route::get('/Notifications/{userId}', 'NotificationController@showAll');

