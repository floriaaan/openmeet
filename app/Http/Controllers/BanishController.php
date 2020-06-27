<?php

namespace App\Http\Controllers;

use App\Ban;
use App\Participation;
use App\Http\Requests\BanRequest;
use App\User;
use Illuminate\Http\Request;

class BanishController extends Controller
{

    public function deleteAll()
    {
        $listParticipation = Participation::where('user', '=', auth()->id());

        foreach ($listParticipation as $part) {
            $part->delete();
            $part->save();
        }

        return redirect('/user');

    }

    public function createBan(BanRequest $request)
    {

        $post = $request->input();
        $user = $post['user'];
        $group = $post['group'];
        if (!Ban::isBan($user, $group)) {
            $ban = new Ban();
            $ban->user = $user;
            $ban->group = $group;
            $ban->date = date('Y-m-d H:m:s');
            $ban->save();


        } else {
            Session()->flash('error', 'Vous avez déja banni cet personne');
        }
        return redirect('/user/groups');

    }


}
