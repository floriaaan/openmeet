<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEditRequest;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function index()
    {
        return view('admin.panel');


    }

    public function edit(AdminEditRequest $request)
    {

        $post = $request->input();

        Setting(['openmeet.name' => $post['uName']]);
        Setting(['openmeet.color' => $post['uColor']]);

        return redirect('/admin');
    }

}
