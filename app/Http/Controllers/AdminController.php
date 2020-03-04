<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEditRequest;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function index()
    {
        $user = (new User);
        $listUser = $user->getLimit(5);
        $countUser = $user->getNumberofUsers();
        return view('admin.panel', [
            'userList' => $listUser,
            'userCount' => $countUser
        ]);


    }

    public function editSettings(AdminEditRequest $request)
    {

        $post = $request->input();

        Setting(['openmeet.name' => $post['uName']]);
        Setting(['openmeet.color' => $post['uColor']]);

        return redirect('/admin');
    }

    public function editTheme(Request $request)
    {

        $post = $request->input();
        Setting(['openmeet.theme' => $post['theme']]);

        return redirect('/admin');
    }

    public function listUser() {
        return 'la liste';
    }

    public function deleteUser($userID) {
        return 'delete ' . $userID;
    }

    public function deleteConfirmed($userID) {
        return 'delete confirmed (c\'est super pas cool) ' . $userID;
    }
}
