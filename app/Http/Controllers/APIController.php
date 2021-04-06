<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function spotlight(String $token)
    {
        try {
            $user = User::where('spotlight_token', $token)->firstOrFail();
            $result = [];


            $admin_groups = $user->groups_admin();
            foreach ($admin_groups as $value) {
                $result[] = [
                    'href' => "/group/" . $value->id . "/admin",
                    "label" => "Administration de " . $value->name,
                    "icon" => '<i className="fas text-2xl fa-cog"></i>'
                ];
            }

            $groups = $user->groups();
            foreach ($groups as $value) {
                $result[] = [
                    'href' => "/group/" . $value->id,
                    "label" => $value->name,
                    "icon" => '<i className="fas text-2xl fa-users"></i>'
                ];
            }

            return response(json_encode($result), 200);
        } catch (\Exception $e) {
            return response(json_encode(['error' => $e->getMessage()]), 500);
        }
    }

    public function users()
    {
        return response(json_encode(User::all()), 200);
    }
}
