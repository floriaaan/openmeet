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
        $query=DB::table('blocks')
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

    public function read($blockID)
    {
        try {
            return $query = DB::table('blocks')
                ->where('id', $blockID)
                ->update(['isread' => 1]);
        } catch (\Exception $e) {
            return $e;
        }
    }

}
