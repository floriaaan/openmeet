<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register.form');
    }

    public function registerPost(RegisterRequest $request)
    {
        $post = $request->input();
        //$user = User::create(request(['rFName', 'rLName', 'rBDate',  'user_mail', 'rPass']));
        $user = (new User)->fillable([
            'FName' => $post['rFName'],
            'LName' => $post['rLName'],
            'Mail' => $post['rMail'],
            'Pass' => $post['rPass'],
            'BDate' => $post['rBDate'],
        ]);
        var_dump($user);
        $user->create();
        auth()->login($user);

        return redirect()->to('/');
    }
}
