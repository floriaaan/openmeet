<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstallRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        var_dump(config('openmeet.install'));
        var_dump(config('openmeet.name'));
        //IF !INSTALL
        if (config('openmeet.install')) {
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

        config(['openmeet.install' => true]);
        config(['openmeet.name' => $post['iName']]);
        config(['openmeet.color' => $post['iColor']]);


        return view('install.done');
    }

    public function home()
    {
        return view('home');
    }
}
