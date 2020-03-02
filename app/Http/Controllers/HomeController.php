<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstallRequest;
use App\Notification;

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
        try{
            Setting(['openmeet.install' => true]);
            Setting(['openmeet.name' => $post['iName']]);
            Setting(['openmeet.color' => $post['iColor']]);

            Setting()->save();

            config(['APP_NAME' => $post['iName']]);
        } catch (\Exception $e) {
            var_dump($e);
        }

        return view('install.done');
    }

    public function home()
    {
        /*$notifications = [];
        if(auth()->check()) {
            $userId=auth()->user()->id;
            $notif = new Notification();
            $notifications=$notif->getAllForUser($userId);
        }
        return view('home',[
            'notifications'=>$notifications
        ]);*/
        return view('home');
    }
}
