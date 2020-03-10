<?php

namespace App\Http\Controllers;

use App\Event;
use App\Group;
use App\Http\Requests\InstallRequest;
use App\Http\Requests\SearchRequest;
use App\Notification;
use App\Message;
use http\Env\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //IF !INSTALL
        try {
            $install = Setting('openmeet.install');
        } catch (\Exception $e) {
            $install = null;
        }

        if ($install != null && $install) {
            return $this->Home();
        }

        return $this->Install();
    }

    public function install()
    {
        return view('install.form');
    }

    public function installPost(InstallRequest $request)
    {
        $post = $request->input();
        try {
            Setting(['openmeet.install' => true]);
            Setting(['openmeet.name' => $post['iName']]);
            Setting(['openmeet.slogan' => $post['iSlogan']]);
            Setting(['openmeet.color' => $post['iColor']]);

            Setting(['openmeet.robots' => true]);

            Setting()->save();

            config(['APP_NAME' => $post['iName']]);
        } catch (\Exception $e) {
            var_dump($e);
        }

        return view('install.done');
    }

    public function home()
    {
        //Récupération des notifications
        $notifications = [];
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $notif = new Notification();
            $notifications = $notif->getLast5ForUser($userId);
        }

        //Récupération des messages
        $messages = [];
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $message = new Message();
        }

        return view('home', [
            'notifications' => $notifications,
            'messages' => $messages
        ]);
    }

    public function search(SearchRequest $request)
    {
        $post = $request->input();

        $listGroup = (new Group)->getLike($post['search']);
        $listEvent = (new Event)->getLike($post['search']);

        return view('search', [
            'search' => $post['search'],
            'groups' => $listGroup,
            'events' => $listEvent
        ]);
    }
}
