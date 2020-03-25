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


use Illuminate\Support\Facades\Route;

Auth::routes();

if(Setting('openmeet.apidoc')) {
    \Mpociot\ApiDoc\ApiDoc::routes();
}

    Route::post('/install', 'HomeController@installPost');

Route::group(['middleware' => 'notifications', 'disable'], function () {
//HOME Routes
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@home')->name('home');
    Route::post('/search', 'HomeController@search');


//USER routes (auth on middleware)
    Route::get('/user/', 'UserController@index')->middleware('auth');;
    Route::get('/user/show/{userID}', 'UserController@show');
    Route::get('/user/edit', 'UserController@editForm')->middleware('auth');
    Route::post('/user/edit', 'UserController@edit')->middleware('auth');
    Route::get('/user/ban/{userID}', 'UserController@banForm')->middleware('auth');
    Route::post('/user/ban/', 'UserController@banPost')->middleware('auth');
    Route::get('/user/block/{userID}', 'UserController@blockForm')->middleware('auth');
    Route::post('/user/block/', 'UserController@blockPost')->middleware('auth');
    Route::get('/user/report/{userID}', 'UserController@reportForm')->middleware('auth');
    Route::post('/user/report/', 'UserController@reportPost')->middleware('auth');
    Route::get('/user/groups', 'SubscriptionController@showGroups');
    Route::get('/user/groups/remove/all', 'SubscriptionController@deleteAll')->middleware('auth');
    Route::get('/user/events', 'ParticipationController@showEvents');
    Route::get('/user/events/remove/all', 'ParticipationController@deleteAll')->middleware('auth');
    Route::get('/user/generate/API/{user_id}', 'UserController@generateAPIToken')->middleware('auth');

//ADMIN Routes
    Route::get('/admin', 'AdminController@index');
    Route::post('/admin/search', 'AdminController@search');
    Route::get('/admin/v1', 'AdminController@oldindex');
    Route::post('/admin/edit/settings', 'AdminController@editSettings');
    Route::post('/admin/edit/theme', 'AdminController@editTheme');
    Route::get('/admin/edit/views', 'AdminController@editViewsForm');
    Route::post('/admin/edit/views', 'AdminController@editViews');
    Route::post('/admin/edit/privacy', 'AdminController@editPrivacy');
    Route::get('/admin/users/', 'AdminController@listUser');
    Route::get('/admin/users/delete/{userID}', 'AdminController@deleteUser');
    Route::post('/admin/users/delete/', 'AdminController@deleteUserPost');
    Route::get('/admin/groups/', 'AdminController@listGroup');
    Route::get('/admin/reports/', 'AdminController@listReport');
    Route::get('/admin/blocks/', 'AdminController@listBlock');
    Route::get('/admin/bans/', 'AdminController@listBan');
    Route::get('/admin/events/', 'AdminController@listEvent');
    Route::get('/admin/reports/show/{reportID}', 'AdminController@showReport');
    Route::get('/admin/reports/delete/{reportID}', 'AdminController@deleteReport');
    Route::get('/admin/blocks/show/{blockID}', 'AdminController@showBlock');
    Route::get('/admin/blocks/delete/{blockID}', 'AdminController@deleteBlock');
    Route::get('/admin/bans/show/{banID}', 'AdminController@showBan');
    Route::get('/admin/bans/delete/{banID}', 'AdminController@deleteBan');
    Route::get('/admin/roles/{user_id}', 'AdminController@rolesForm');
    Route::post('/admin/roles/', 'AdminController@rolesPost');


//NOTIFICATION Routes
    Route::get('/notifications/', 'NotificationController@showAll')->middleware('auth');
    Route::post('/notifications/readall', 'NotificationController@readall')->middleware('auth');

//MESSAGE routes
    Route::get('/messages', 'MessageController@showUserConversations')->middleware('auth');
    Route::get('/messages/{typeConversation}/{correspondant}', 'MessageController@showChat')->middleware('auth');
    Route::post('/messages/create', 'MessageController@createMessage')->middleware('auth');

//GROUP routes
    Route::get('/groups/show/{group_id}', 'GroupController@show');
    Route::get('/groups/list', 'GroupController@showAll');
    Route::get('/groups/create', 'GroupController@addForm')->middleware('auth');
    Route::post('/groups/create', 'GroupController@addPost')->middleware('auth');
    Route::get('/groups/edit/{group_id}', 'GroupController@editForm')->middleware('groupadmin');
    Route::post('/groups/edit', 'GroupController@editPost')->middleware('groupadmin');
    Route::get('/groups/admin/{group_id}', 'GroupController@editForm')->middleware('groupadmin');
    Route::post('/groups/admin', 'GroupController@editPost')->middleware('groupadmin');
    Route::get('/groups/delete/{group_id}', 'GroupController@deleteForm')->middleware('groupadmin');
    Route::post('/groups/delete/', 'GroupController@deletePost')->middleware('groupadmin');
    Route::post('groups/subscribe/add', 'SubscriptionController@createSubscription')->middleware('auth');
    Route::post('groups/subscribe/remove', 'SubscriptionController@deleteSubscription')->middleware('auth');

//Gestion GROUP routes
    Route::get('/groups/admin/', 'AdminGroupController@chooseGroup');
    Route::post('/groups/admin/', 'AdminGroupController@showPanel');

    Route::post('/groups/admin/subscriptions/list', 'AdminGroupController@listSub');
    Route::post('/groups/admin/bans/list', 'AdminGroupController@listBan');
    Route::post('/groups/admin/events/list', 'AdminGroupController@listEvent');
    Route::get('/groups/admin/transfer/{group_id}/{user_id}', 'AdminGroupController@transferRolesConfirm');
    Route::post('/groups/admin/transfer','AdminGroupController@transferRolesPost');


//EVENTS routes
    Route::get('/events/show/{event_id}', 'EventController@show');
    Route::get('/events/create', 'EventController@addForm')->middleware('groupadmin');
    Route::post('/events/create', 'EventController@addPost')->middleware('groupadmin');
    Route::get('/events/edit/{event_id}', 'EventController@editForm')->middleware('groupadmin'); //TODO: + check if correct admin rights
    Route::post('/events/edit', 'EventController@editPost')->middleware('groupadmin'); // TODO
    Route::get('/events/delete/{event_id}', 'EventController@deleteForm')->middleware('groupadmin'); //TODO
    Route::post('/events/delete/', 'EventController@deletePost')->middleware('groupadmin'); //TODO
    Route::post('/events/participate/add/', 'ParticipationController@createParticipation')->middleware('auth');
    Route::post('/events/participate/remove/', 'ParticipationController@deleteParticipation')->middleware('auth');

//Scraping routes
    Route::get('/frommeetup/group', 'ScrapingController@ChooseGroup')->middleware('auth');
    Route::post('/frommeetup/group', 'ScrapingController@ChooseGroupConfirmation')->middleware('auth');
    Route::get('/frommeetup/event', 'ScrapingController@ChooseEvent')->middleware('auth');
    Route::post('/frommeetup/event', 'ScrapingController@ChooseEventConfirmation')->middleware('auth');

});
//Legal Routes
Route::get('/legal/cgu', 'LegalController@cgu');


Route::get('/debug/mail', function (){
   return view('emails.eventcreated', ['event' => (new \App\Event)->getOne(3)]);
});

Route::get('/debug/install', function (){
    return view('install.form');
});

