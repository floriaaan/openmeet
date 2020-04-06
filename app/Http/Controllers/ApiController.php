<?php

namespace App\Http\Controllers;

use App\Event;
use App\Group;
use App\Subscription;
use App\User;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function toggleSubscription(Request $request)
    {
        $userID = $request['user'];
        $groupID = $request['group'];

        if ((new Subscription)->isSubscribed($userID, $groupID)) {
            (new Subscription)->remove((new Subscription)->getSubscribed($userID, $groupID)->id);
            return [200, 'Unsubscribed'];
        } else {
            $subscription = new Subscription();
            $subscription->user = $userID;
            $subscription->group = $groupID;
            $subscription->date = date('Y-m-d');
            $subscription->acceptnotif = (new User)->getOne($userID)->defaultnotif;
            $subscription->push();
            return [200, 'Subscribed'];

        }

    }

    public function getSubscription($userID)
    {
        $groups = (new Group)->getAll();

        $datas = [];
        foreach ($groups as $group) {
            $datas[] = ['id' => $group->id, 'state' => (new Subscription)->isSubscribed($userID, $group->id)];
        }

        return $datas;

    }

    public function getGroups($token)
    {
        $user = (new User)->getToken($token);
        if ($user != false) {
            $request = [
                'USER' => $user->fname . ' ' . $user->lname,
                'ID' => [$user->id, $token],
                'AccessTo' => 'GroupsList',
                'Status' => 'granted'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return (new Group)->getAll();
        } else {
            $request = [
                'USER' => 'anonymous',
                'ID' => ['anonymous', $token],
                'AccessTo' => 'GroupsList',
                'Status' => 'denied'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return abort(404);
        }

    }

    public function getGroupID($token, $id)
    {
        $user = (new User)->getToken($token);
        if ($user != false) {
            $request = [
                'USER' => $user->fname . ' ' . $user->lname,
                'ID' => [$user->id, $token],
                'AccessTo' => 'Group-' . $id,
                'Status' => 'granted'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return (new Group)->getOne($id);
        } else {
            $request = [
                'USER' => 'anonymous',
                'ID' => ['anonymous', $token],
                'AccessTo' => 'Group-' . $id,
                'Status' => 'denied'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return abort(404);
        }

    }

    public function getEvents($token)
    {
        $user = (new User)->getToken($token);
        if ($user != false) {
            $request = [
                'USER' => $user->fname . ' ' . $user->lname,
                'ID' => [$user->id, $token],
                'AccessTo' => 'EventsList',
                'Status' => 'granted'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return (new Event)->getAll();
        } else {
            $request = [
                'USER' => 'anonymous',
                'ID' => ['anonymous', $token],
                'AccessTo' => 'EventsList',
                'Status' => 'denied'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return abort(404);
        }

    }

    public function getEventID($token, $id)
    {
        $user = (new User)->getToken($token);
        if ($user != false) {
            $request = [
                'USER' => $user->fname . ' ' . $user->lname,
                'ID' => [$user->id, $token],
                'AccessTo' => 'Event-' . $id,
                'Status' => 'granted'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return (new Event)->getOne($id);
        } else {
            $request = [
                'USER' => 'anonymous',
                'ID' => ['anonymous', $token],
                'AccessTo' => 'Event-' . $id,
                'Status' => 'denied'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return abort(404);
        }

    }

    public function getSettings($token)
    {
        $user = (new User)->getToken($token);
        if ($user != false && $user->isadmin == 1) {
            $request = [
                'USER' => $user->fname . ' ' . $user->lname,
                'ID' => [$user->id, $token],
                'AccessTo' => 'Settings',
                'Status' => 'granted'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return Setting('');
        } elseif ($user != false) {
            $request = [
                'USER' => $user->fname . ' ' . $user->lname,
                'ID' => [$user->id, $token],
                'AccessTo' => 'Settings',
                'Status' => 'denied'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');

            return abort(404);
        } else {
            $request = [
                'USER' => 'anonymous',
                'ID' => ['anonymous', $token],
                'AccessTo' => 'Settings',
                'Status' => 'denied'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return abort(404);
        }

    }

    public function getUsers($token)
    {
        $user = (new User)->getToken($token);
        if ($user != false && $user->isadmin == 1) {

            $request = [
                'USER' => $user->fname . ' ' . $user->lname,
                'ID' => [$user->id, $token],
                'AccessTo' => 'UsersList',
                'Status' => 'granted'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');

            return (new User)->getAll();
        } else if ($user != false) {

            $request = [
                'USER' => $user->fname . ' ' . $user->lname,
                'ID' => [$user->id, $token],
                'AccessTo' => 'UsersList',
                'Status' => 'denied'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');

            return abort(404);
        } else {
            $request = [
                'USER' => 'anonymous',
                'ID' => ['anonymous', $token],
                'AccessTo' => 'UsersList',
                'Status' => 'denied'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');

            return abort(404);
        }

    }

    public function getELocation(Request $request)
    {
        $post = $request->input();
        return (new Event)->getByArea($post['lon'], $post['lat'], $post['limit']);
    }

    public function getTags()
    {
        $tags = (new Group)->getTags();
        header('Access-Control-Allow-Origin "*"');
        header('Access-Control-Allow-Headers "origin, x-requested-with, content-type, Authorization"');
        header('Access-Control-Allow-Methods "PUT, GET, POST, DELETE, OPTIONS"');
        header('User-Agent "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36"');
        $result = [];
        foreach ($tags as $tag) {
            $tag = str_replace(' ', '%20', $tag);
            var_dump($url = file_get_contents('https://api.qwant.com/api/search/images?count=1&q=' . $tag . '&t=images&safesearch=1&locale=fr_FR&uiv=4'));
            $json = json_decode($url, true);
            $tag = str_replace('%20', ' ', $tag);

            $img = $json['status'] == "success" && isset($json['data']['result']['items'][0]) ? $json['data']['result']['items'][0]['media'] : "https://picsum.photos/200";
            $result[] = ['tag' => $tag, 'img' => $img];
        }

        return $result;
    }
}
