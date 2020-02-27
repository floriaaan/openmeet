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


    public function create($userId,$groupId)
    {
        $query=DB::table('subscriptions')
            ->insert([
                'id_user'=>$userId,
                'id_group'=>$groupId,
                'date'=>(date("Y-m-d H:i:s"))
            ]);
    }

    public function getOne($subId)
    {
        $query=DB::table('subscriptions')
            ->select('*')
            ->find($subId)
            ->get();

        var_dump($query);
    }


    public function getAllForGroup($groupId)
    {
        $query=DB::table('subscriptions')
            ->select('*')
            ->where('id_group',"=",$groupId)
            ->get();
        $subscriptionsArray=$query;
        $listSubscription=[];
        foreach ($subscriptionsArray as $subSQL)
        {
            $listSubscription[]=$subSQL;
        }
        return $listSubscription;
    }

    public function getAllForUser($userId)
    {
        $query=DB::table('subscriptions')
            ->select('*')
            ->where('id_user',"=",$userId)
            ->get();
        $subscriptionsArray=$query;
        $listSubscription=[];
        foreach ($subscriptionsArray as $subSQL)
        {
            $listSubscription[]=$subSQL;
        }
        return $listSubscription;
    }


    public function updateAcceptNotif($subId,$value)
    {
        $query=DB::table('subscriptions')
            ->where('id','=',$subId)
            ->update(['acceptnotif'=>$value]);
    }

    public function Remove($subId)
    {
        $query = DB::table('subscriptions')
            ->delete($subId);
    }
    //
}
