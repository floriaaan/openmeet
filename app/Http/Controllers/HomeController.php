<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstallRequest;
use anlutro\LaravelSettings\SettingStore as Setting;

class HomeController extends Controller
{
    public function index()
    {
        //IF !INSTALL
        if (Setting('openmeet.install')) {
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


        /*file_put_contents('./css/custom.css',
            ".openmeet-color{color:". $post['iColor']  .";}");*/

        Setting(['openmeet.install' => true]);
        Setting(['openmeet.name' => $post['iName']]);
        Setting(['openmeet.color' => $post['iColor']]);

        var_dump(Setting());
        Setting()->save();
        return view('install.done');
    }

    public function home()
    {
        return view('home');
    }
}
