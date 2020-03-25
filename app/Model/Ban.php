<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ban extends Model
{
    protected $fillable = [
        'id',
        'banned',
        'banisher',
        'date',
        'description'
    ];

    public function isBan($userId, $groupId)
    {

        $query = DB::table('bans')
            ->select('*')
            ->where('banned', '=', $userId)
            ->where('banisher', '=', $groupId)
            ->get();
        return $query->count() > 0;
    }


    public function getAll()
    {
        $query = DB::table('bans')
            ->select('*')
            ->get();

        $listBans = [];
        foreach ($query as $ban) {
            $listBans[] = $ban;
        }
        return $listBans;
    }



    public function getCount()
    {
        $query=DB::table('bans')
            ->select('*')
            ->get();


        return $query->count();

    }

    public function getCountGroup($groupId)
    {
        $query=DB::table('bans')
            ->select('*')
            ->where('banisher', $groupId)
            ->get();


        return $query->count();

    }

    public function getGroup($groupID) {
        $query=DB::table('bans')
            ->select('*')
            ->where('banisher', $groupID)
            ->get();
        return $query;
    }

    public function remove($parId)
    {
        try {
            $query = DB::table('bans')
                ->delete($parId);
            return true;
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function getLimitDesc($limit)
    {
        {
            $query = DB::table('bans')
                ->select('*')
                ->limit($limit)
                ->orderByDesc('id')
                ->get();


            return $query;
        }
    }

    public function getLimitGroupDesc($userID, $limit)
    {
        $query = DB::table('bans')
            ->select('*')
            ->where('banisher', $userID)
            ->limit($limit)
            ->orderByDesc('id')
            ->get();


        return $query;
    }

}
