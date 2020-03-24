<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Block extends Model
{
    protected $fillable = [
        'id',
        'blocker',
        'target',
        'date',
        'description',
    ];

    public function getLimit($limit)
    {
        $query = DB::table('blocks')
            ->select('*')
            ->limit($limit)
            ->get();


        return $query;

    }

    public function getCount()
    {
        $query = DB::table('blocks')
            ->select('*')
            ->get();


        return $query->count();

    }

    public function getAll()
    {
        $query = DB::table('blocks')
            ->select('*')
            ->get();

        $listBlocks = [];
        foreach ($query as $block) {
            $listBlocks[] = $block;
        }
        return $listBlocks;
    }

    public function getLimitDesc($limit)
    {
        $query = DB::table('blocks')
            ->select('*')
            ->limit($limit)
            ->orderByDesc('id')
            ->get();


        return $query;
    }


    public function isBlock($userId, $blockId)
    {

        $query = DB::table('blocks')
            ->select('*')
            ->where('target', '=', $userId)
            ->where('blocker', '=', $blockId)
            ->get();
        return $query->count() > 0;
    }


}
