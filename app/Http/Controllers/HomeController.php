<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return $this->Install();
    }

    public function Install() {
        return view('install');
    }
}
