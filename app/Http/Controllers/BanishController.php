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
        $listParticipation = (new Participation)->getUser(auth()->id());

        foreach ($listParticipation as $part) {
            (new Participation)->remove($part->id);
        }

        return redirect('/user');

    }

    public function createBan(BanRequest $request)
    {

        $post = $request->input();
        $userId = $post['user'];
        $groupId = $post['group'];
        if (!(new Ban)->isBan($userId, $groupId)) {
            $ban = new Ban();
            $ban->user = $userId;
            $ban->group = $groupId;
            $ban->date = date('Y-m-d H:m:s');
            $ban->push();


        } else {
            Session()->put('errorSubscription', 'Vous avez déja bannie cet personne');
        }
        return redirect('/user/groups');

    }


}
