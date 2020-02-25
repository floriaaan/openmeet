<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    public function index(){
        //IF !INSTALL
        return $this->Install();
    }

    public function install() {
        return view('install.form');
    }

    public function installPost(Request $request){
        print_r($request->input());

        //return view('install.done');
    }
}
