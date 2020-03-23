<?php

namespace App\Http\Middleware;

use App\Group;
use Closure;
use Illuminate\Support\Facades\Session;

class CorrectRightsGroup
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $post = $request->input();
        $get = $request;
        var_dump($get);
        die;
        $group = null;
        if (isset($post['group'])) {
            $group = $post['group'];
        } elseif ($request->query('group_id') != null) {
            $group = $request->query('group_id');
        }
        if (auth()->check() && !empty((new Group)->getByAdmin(auth()->id())) && (new Group)->getOne($group)) {
            return $next($request);
        }

        Session::put('error', 'Vous n\'êtes pas administrateur de groupe.');

        return redirect('/');
    }
}
