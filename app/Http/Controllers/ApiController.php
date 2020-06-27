<?php

namespace App\Http\Controllers;

use App\Event;
use App\Group;
use App\Subscription;
use App\User;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function toggleSubscription(Request $request)
    {
        $user = $request['user'];
        $group = $request['group'];

        if (Subscription::isSubscribed($user, $group)) {
            $sub = Subscription::where('user', '=', $user)
                ->where('group', '=', $group)
                ->firstOrFail();
            $sub->delete();
            $sub->save();

            return [200, 'Unsubscribed'];
        } else {
            $subscription = new Subscription();
            $subscription->user = $user;
            $subscription->group = $group;
            $subscription->date = date('Y-m-d');
            $subscription->acceptnotif = User::find($user)->defaultnotif;
            $subscription->save();
            return [200, 'Subscribed'];
        }
    }

    public function getSubscription($user)
    {
        $groups = Group::all();

        $datas = [];
        foreach ($groups as $group) {
            $datas[] = ['id' => $group->id, 'state' => Subscription::isSubscribed($user, $group->id)];
        }

        return $datas;
    }

    public function getGroups($token)
    {
        $user = User::token($token);
        if ($user != false) {
            $request = [
                'USER' => $user->getFullNameAttribute(),
                'ID' => [$user->id, $token],
                'AccessTo' => 'GroupsList',
                'Status' => 'granted'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return Group::all();
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
        $user = User::token($token);
        if ($user != false) {
            $request = [
                'USER' => $user->getFullNameAttribute(),
                'ID' => [$user->id, $token],
                'AccessTo' => 'Group-' . $id,
                'Status' => 'granted'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return Group::find($id);
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
        $user = User::token($token);
        if ($user != false) {
            $request = [
                'USER' => $user->getFullNameAttribute(),
                'ID' => [$user->id, $token],
                'AccessTo' => 'EventsList',
                'Status' => 'granted'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return Event::all();
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
        $user = User::token($token);
        if ($user != false) {
            $request = [
                'USER' => $user->getFullNameAttribute(),
                'ID' => [$user->id, $token],
                'AccessTo' => 'Event-' . $id,
                'Status' => 'granted'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return Event::find($id);
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
        $user = User::token($token);
        if ($user != false && $user->isadmin == 1) {
            $request = [
                'USER' => $user->getFullNameAttribute(),
                'ID' => [$user->id, $token],
                'AccessTo' => 'Settings',
                'Status' => 'granted'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');
            return Setting('');
        } elseif ($user != false) {
            $request = [
                'USER' => $user->getFullNameAttribute(),
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
        $user = User::token($token);
        if ($user != false && $user->isadmin == 1) {

            $request = [
                'USER' => $user->getFullNameAttribute(),
                'ID' => [$user->id, $token],
                'AccessTo' => 'UsersList',
                'Status' => 'granted'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');

            return User::all();
        } else if ($user != false) {

            $request = [
                'USER' => $user->getFullNameAttribute(),
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
        return Event::where('posx', '>=', $post['lon'] - 0.1)
            ->where('posx', '<=', $post['lon'] + 0.1)
            ->where('posy', '>=', $post['lat'] - 0.1)
            ->where('posy', '<=', $post['lat'] + 0.1)
            ->limit($post['limit'])
            ->get();
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

    public function update(Request $request)
    {
        $post = $request->input();
        $token = (isset($post['token'])) ? $post['token'] : 'anon';

        $user = User::token($token);
        if ($user != false && $user->isadmin == 1) {

            $request = [
                'USER' => $user->getFullNameAttribute(),
                'ID' => [$user->id, $token],
                'AccessTo' => 'Update',
                'Status' => 'granted'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');

            Artisan::call('check:update');

            return Artisan::output();
        } else if ($user != false) {

            $request = [
                'USER' => $user->getFullNameAttribute(),
                'ID' => [$user->id, $token],
                'AccessTo' => 'Update',
                'Status' => 'denied'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');

            return abort(404);
        } else {
            $request = [
                'USER' => 'anonymous',
                'ID' => ['anonymous', $token],
                'AccessTo' => 'Update',
                'Status' => 'denied'
            ];

            Storage::append('api_logs.json', json_encode($request) . ',');

            return abort(404);
        }
    }
}
