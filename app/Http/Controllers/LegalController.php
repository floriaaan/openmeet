<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function cgu() {
        return view('legal.cgu');
    }

    public function openmeet() {
        return view('legal.openmeet');
    }
}
