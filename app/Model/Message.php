<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

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



    public function create($sender,$receiver,$content,$forgroup)
    {
        $query=DB::table('messages')
            ->insert([
                'date'=> date("Y-m-d H:i:s"),
                'content'=>$content,
                'sender'=>$sender,
                'receiver'=>$receiver,
                'forgroup'=>$forgroup
            ]);
    }


    public function getPersonnalConversationsForUser($userId)
    {
        $query=DB::table('messages')
            ->select('*')
            ->where('receiver','=',$userId)
            ->orWhere('sender','=',$userId)
            ->get();
        $QueryUniqueless=$query;
        $QueryUnique=array_unique($QueryUniqueless);

        var_dump($QueryUniqueless);
        var_dump($QueryUnique);
        die;
    }

    public function getGroupConversationsForUser($userId)
    {

    }

    public function GetMessagesForConversation($userId_1,$userId_2)
    {
        //
    }


    public function EditMessageContent($messageId,$newcontent)
    {
        $query=DB::table('messages')
            ->where('id','=',$messageId)
            ->update([
               'content'=>$newcontent
            ]);
    }

    public function delete($messageId)
    {
        $query=DB::table('messages')
            ->delete($messageId);
    }
}
