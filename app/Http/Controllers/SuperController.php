<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;

class SuperController extends Controller
{
    public function index()
    {
        $hash = [];
        exec("git log --pretty=format:'%h' -n 1 ..", $hash);
        $hash = isset($hash[0]) ? str_replace('\'', '', $hash[0]) : "Can't retrieve hash";
        
        $api = json_decode(file_get_contents("https://api.github.com/repos/floriaaan/openmeet/commits/master", false, stream_context_create(array(
            'http' => array(
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36',
                'method' => "GET",
                'header' => implode("\r\n", array(
                    'Content-type: application/json;'
                ))
            )
        ))));
        $remoteHash = substr($api->sha, 0, 7);



        return view('super.index', [
            'hash' => $hash, 
            'remoteHash' => $remoteHash,
            'https' => parent::isSecure(),
            'count_users' => User::count(),
            'count_groups' => Group::count(),
            'count_events' => Event::count(),
            ]);
    }
}
