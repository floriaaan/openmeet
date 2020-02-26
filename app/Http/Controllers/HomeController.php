<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstallRequest;

class HomeController extends Controller
{
    public function index(){
        //IF !INSTALL
        return $this->Install();
    }

    public function install() {
        return view('install.form');
    }

    public function installPost(InstallRequest $request){
        $post = $request->input();

        file_put_contents('./css/custom.css',
            ".openmeet-color{color:". $post['iColor']  .";}");

        var_dump($post);

        //return view('install.done');
    }
}
