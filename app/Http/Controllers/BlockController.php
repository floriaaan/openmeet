<?php

namespace App\Http\Controllers;

use App\Ban;
use App\Block;
use App\Http\Requests\BanRequest;
use App\Http\Requests\BlockRequest;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function createBan(BlockRequest $request)
    {
        $post = $request->input();
        $userId = $post['target'];
        $blockId = $post['blocker'];
        if (!Block::isBlock($userId, $blockId)) {
            $ban = new Block();
            $ban->target = $userId;
            $ban->blocker = $blockId;
            $ban->date = date('Y-m-d H:m:s');
            $ban->save();
        } else {
            Session()->flash('error', 'Vous avez déja bloqué cet personne');
        }
        return redirect('/user/groups');

    }

}
