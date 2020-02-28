<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEditRequest;

class AdminController extends Controller
{
    public function index()
    {
        if (self::roleNeed()) {
            return view('admin.panel');
        }
        return redirect('/login');

    }

    public function edit(AdminEditRequest $request)
    {
        if(self::roleNeed()) {
            $post = $request->input();

            Setting(['openmeet.name' => $post['uName']]);
            Setting(['openmeet.color' => $post['uColor']]);

            return redirect('/admin');
        }
        return redirect('/');
    }

    public static function roleNeed()
    {
        if (auth()->user() == null || !auth()->check() || !auth()->user()->isadmin) {
            return false;
        }
        return true;
    }
}
