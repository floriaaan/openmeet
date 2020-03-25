<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Subscription extends Model
{

    protected $fillable = [

        'id',
        'user',
        'group',
        'date',
        'acceptnotif'
    ];


    public function getOne($subId)
    {
        $query = DB::table('subscriptions')
            ->select('*')
            ->find($subId)
            ->get();

        var_dump($query);
    }

    public function getAll()
    {
        $query = DB::table('subscriptions')
            ->select('*')
            ->get();

        $listSub = [];
        foreach ($query as $sub) {
            $listSub[] = $sub;
        }
        return $listSub;
    }

    public function getLimit($limit)
    {
        $query = DB::table('subscriptions')
            ->select('*')
            ->limit($limit)
            ->get();


        return $query;

    }


    public function getGroup($groupId)
    {
        $query = DB::table('subscriptions')
            ->select('*')
            ->where('group', "=", $groupId)
            ->get();

        $listSubscription = [];
        foreach ($query as $subscription) {
            $listSubscription[] = $subscription;
        }
        return $listSubscription;
    }

    public function countGroup($groupId) {
        $query = DB::table('subscriptions')
            ->select('*')
            ->where('group', "=", $groupId)
            ->get();

        return count($query);
    }

    public function getUser($userId)
    {
        $query = DB::table('subscriptions')
            ->select('*')
            ->where('user', "=", $userId)
            ->get();
        $listSubscription = [];
        foreach ($query as $subscription) {
            $listSubscription[] = $subscription;
        }
        return $listSubscription;
    }

    public function countByUser($userID) {
        $query = DB::table('subscriptions')
            ->select('*')
            ->where('user', "=", $userID)
            ->get();

        return count($query);
    }



    public function updateAcceptNotif($subId, $value)
    {
        $query = DB::table('subscriptions')
            ->where('id', '=', $subId)
            ->update(['acceptnotif' => $value]);
    }

    public function remove($subcriptionID)
    {
        try {
            $query = DB::table('subscriptions')
                ->delete($subcriptionID);
            return true;
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function isSubscribed($userID, $groupID)
    {
        $query = DB::table('subscriptions')
            ->select('*')
            ->where('user', '=', $userID)
            ->where('group', '=', $groupID)
            ->get();

        return !empty($query[0]);
    }

    public function getSubscribed($userID, $groupID)
    {
        $query = DB::table('subscriptions')
            ->select('*')
            ->where('user', '=', $userID)
            ->where('group', '=', $groupID)
            ->get();

        return $query[0];
    }

    public function getCount()
    {
        $query = DB::table('subscriptions')
            ->select('*')
            ->get();

        return $query->count();

    }


    public function getLimitDesc($limit)
    {
        $query = DB::table('subscriptions')
            ->select('*')
            ->limit($limit)
            ->orderByDesc('id')
            ->get();

        return $query;
    }

    public function getLimitGroupDesc($groupID, $limit)
    {
        $query = DB::table('subscriptions')
            ->select('*')
            ->where('group', $groupID)
            ->limit($limit)
            ->orderByDesc('id')
            ->get();

        return $query;
    }



    public function getAllSub($id)

    {
        $query = DB::table('subscriptions')
            ->select('*')
            ->where('group','=',$id)
            ->get();
        $listSub = [];
        foreach ($query as $sub) {
            $listSub[] = $sub;
        }
        return $listSub;
    }

}
