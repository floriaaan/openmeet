<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use PhpParser\Node\Expr\Cast\Object_;

class Message extends Model
{
    protected $fillable = [
        'id',
        'date',
        'content',
        'receiver',
        'sender',
        'isread',
        'forgroup',
    ];

    public function getPersonnalConversationsForUser($userId)
    {
        $queryConv = DB::table('messages')
            ->select('sender', 'receiver')->distinct()
            ->where('receiver', '=', $userId)->where('forgroup', '=', 0)
            ->orWhere('sender', '=', $userId)->where('forgroup', '=', 0)
            ->get();
        $queryConvArray = $queryConv;

        $convArray = [];
        foreach ($queryConvArray as $messageSQL) {
            if (($messageSQL->sender) == $userId) {
                $convArray[] = $messageSQL->receiver;
            }
            if (($messageSQL->receiver) == $userId) {
                $convArray[] = $messageSQL->sender;
            }
        }
        $conversations = [];
        $conversations = array_unique($convArray);
        return $conversations;
    }

    public function getLastMessageForPersonalConv($userId_1, $userId_2)
    {
        $query = DB::table('messages')
            ->select('*')
            ->where('sender', '=', $userId_1)
            ->where('receiver', '=', $userId_2)
            ->where('forgroup', '=', 0)
            ->orWhere('sender', '=', $userId_2)
            ->where('receiver', '=', $userId_1)
            ->where('forgroup', '=', 0)
            ->orderBy('date', 'desc')
            ->limit(1)
            ->get();
        $queryResult = $query[0];
        return $queryResult;
    }

    public function getLastMessageForGroupConv($groupId)
    {
            $query = DB::table('messages')
                ->select('*')
                ->where('receiver', '=', $groupId)
                ->where('forgroup', '=', 1)
                ->orderBy('date', 'desc')
                ->limit(1)
                ->get();
            try{$queryResult = $query[0];}
            catch (\Exception $e){
                $message=new Message();
                $message->id=0;
                $message->receiver=$groupId;
                $message->sender=0;
                $message->content="Aucun message";
                $message->forgroup=1;

                $queryResult=$message->attributes;

                }

            return $queryResult;

    }


    public function GetMessagesForConversation($userId_1, $userId_2)
    {
        //
    }


    public function EditMessageContent($messageId, $newcontent)
    {
        $query = DB::table('messages')
            ->where('id', '=', $messageId)
            ->update([
                'content' => $newcontent
            ]);
    }

    public function remove($messageId)
    {
        $query = DB::table('messages')
            ->delete($messageId);
    }

    public function getCount()
    {
        $group = DB::table('messages')
            ->select('*')
            ->where('forgroup', '=', '1')
            ->get();

        $user = DB::table('messages')
            ->select('*')
            ->where('forgroup', '=', '0')
            ->get();


        return ['foruser' => $user->count(), 'forgroup' => $group->count()];
    }

    public function getLimit($limit)
    {
        $query = DB::table('messages')
            ->select('*')
            ->limit($limit)
            ->orderByDesc('date')
            ->get();

        $msgList = [];
        foreach ($query as $msgSQL)
        {
            $msgList[]=$msgSQL;
        }
        return $msgList;
    }
}
