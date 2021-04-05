<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $nearby = Event::where('date_start', '>', date('Y-m-d H:i:s'))
            ->orderBy('date_start', 'ASC')
            ->take(3)->get();

        return view('index', [
            'nearby' => $nearby
        ]);
    }

    public function search_get()
    {

        return view('search');
    }

    public function search_post(Request $request)
    {

        return view('search', ['results' => [$request->input('query')]]);
    }
}
