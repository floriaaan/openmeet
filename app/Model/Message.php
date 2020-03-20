<?php

namespace App;

use Composer\Command\BaseDependencyCommand;
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

    public function getGroupChat($groupId){
        $query = DB::table('messages')
            ->select('*')
            ->where('receiver','=',$groupId)
            ->where('forgroup','=',1)
            ->orderByDesc('date')
            ->get();
        $queryArray = $query;
        $messageArray = [];
        foreach ($queryArray as $messageSQL){
            $message=new Message();
            $message=$messageSQL;
            $messageArray[$message->id]=$message;

        }
        ksort($messageArray);
        return $messageArray;
    }

    public function getPersonalChat($user2){
        $userId=auth()->id();
        $query = DB::table('messages')
            ->select('*')
            ->where('sender',"=",$userId)
            ->where('receiver',"=",$user2)
            ->where('forgroup','=',0)
            ->orWhere('receiver','=',$userId)
            ->where('sender','=',$user2)
            ->where('forgroup',"=",0)
            ->get();

        $queryArray = $query;
        $messageArray = [];
        foreach ($queryArray as $messageSQL){
            $message=new Message();
            $message=$messageSQL;
            $messageArray[$message->id]=$message;

        }
        ksort($messageArray);
        return $messageArray;
    }

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

    public function getLastMessageForPersonalConv($user1, $user2)
    {
        $query = DB::table('messages')
            ->select('*')
            ->where('sender', '=', $user1)
            ->where('receiver', '=', $user2)
            ->where('forgroup', '=', 0)
            ->orWhere('sender', '=', $user2)
            ->where('receiver', '=', $user1)
            ->where('forgroup', '=', 0)
            ->orderBy('date', 'desc')
            ->limit(1)
            ->get();

        $contentSplitted = mb_str_split($query[0]->content);
        $newContent = "";

        if(count($contentSplitted)>=60)
            for($i=0;$i<60;$i++)
            {
                    {
                        $newContent = $newContent.$contentSplitted[$i];
                    }
                $query[0]->content=$newContent.' ...';
            }
        $queryResult=$query[0];
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
            try{
                $contentSplitted = mb_str_split($query[0]->content);
                $newContent = "";

                if(count($contentSplitted)>=60)
                    for($i=0;$i<60;$i++)
                    {
                        {
                            $newContent = $newContent.$contentSplitted[$i];
                        }
                        $query[0]->content=$newContent.' ...';
                    }
                $queryResult = $query[0];}
            catch (\Exception $e){
                $message=new \stdClass();
                $message->id=0;
                $message->receiver=$groupId;
                $message->sender=0;
                $message->content="Aucun message";
                $message->forgroup=1;

                $queryResult=$message;

                }

            return $queryResult;

    }


    public function GetMessagesForConversation($user2)
    {
        $userId = auth()->id();
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

    public function getLike($str)
    {
        $query = DB::table('messages')
            ->select('*')
            ->where('content', 'LIKE', "%{$str}%")
            ->get();
        $listMessage = [];
        foreach ($query as $message) {
            $listMessage[] = $message;
        }

        return $listMessage;
    }

    public function getLimitDesc($limit)
    {
        $query=DB::table('messages')
            ->select('*')
            ->limit($limit)
            ->orderByDesc('id')
            ->get();


        return $query;
    }
}
