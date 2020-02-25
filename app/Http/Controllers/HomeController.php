<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        //IF !INSTALL
        return $this->Install();
    }

    public function install() {
        return view('install');
    }

    public function installPost(){

    }
}
