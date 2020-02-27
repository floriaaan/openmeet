<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEditRequest;

class AdminController extends Controller
{
    public function index(){
        self::roleNeed();
        return view('admin.panel');
    }

    public function edit(AdminEditRequest $request){
        self::roleNeed();
        $post = $request->input();

        Setting(['openmeet.name' => $post['uName']]);
        Setting(['openmeet.color' => $post['uColor']]);

        return redirect('/');
    }

    /**
     * Verify that USER.Roles in SESSION is "Admin"
     */
    public static function roleNeed()
    {
        if(false) {
            return redirect('/');
        }
    }
}
