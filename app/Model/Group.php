<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Group extends Model
{

    protected $fillable = [
        'id',
        'name',
        'admin',
        'picrepo',
        'picname',
        'datecreate',
        'desc',
        'tags'
    ];


    public function getOne($groupId)
    {
        $query = DB::table('groups')
            ->select('*')
            ->where('id', '=', $groupId)
            ->get();

        return $query[0];

    }

    public function updateAdmin($groupId, $newAdmin)
    {
        $query = DB::table('groups')
            ->where('id', '=', $groupId)
            ->update([
                'admin' => $newAdmin
            ]);

    }

    public function remove($groupID)
    {
        $listE = (new Event)->getByGroup($groupID);
        foreach ($listE as $event) {
            (new Event)->remove($event->id);
        }

        $listS = (new Subscription)->getGroup($groupID);
        foreach ($listS as $sub) {
            (new Subscription)->remove($sub->id);
        }

        try {
            $query = DB::table('groups')
                ->delete($groupID);
            return true;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getLimit($limit)
    {
        $query = DB::table('groups')
            ->select('*')
            ->limit($limit)
            ->get();


        return $query;

    }

    public function getCount()
    {
        $query = DB::table('groups')
            ->select('*')
            ->get();


        return $query->count();

    }

    public function getAll()
    {
        $query = DB::table('groups')
            ->select('*')
            ->get();

        $listGroup = [];
        foreach ($query as $group) {
            $listGroup[] = $group;
        }

        return $listGroup;
    }

    public function getByAdmin($userID)
    {
        $query = DB::table('groups')
            ->select('*')
            ->where('admin', '=', $userID)
            ->get();
        $listGroup = [];
        foreach ($query as $group) {
            $listGroup[] = $group;
        }

        return $listGroup;
    }

    public function getLike($str)
    {
        $query = DB::table('groups')
            ->select('*')
            ->where('name', 'LIKE', "%{$str}%")
            ->orWhere('desc', 'LIKE', "%{$str}%")
            ->orWhere('tags', 'LIKE', "%{$str}%")
            ->get();
        $listGroup = [];
        foreach ($query as $group) {
            $listGroup[] = $group;
        }

        return $listGroup;
    }

    public function getAdmin($groupID)
    {
        $query = DB::table('groups')
            ->select('*')
            ->where('id', $groupID)
            ->get();
        return (new User)->getOne($query[0]->admin);
    }

    public function getLastID()
    {
        $query = DB::table('groups')
            ->select('id')
            ->limit(1)
            ->orderByDesc('id')
            ->get();

        return $query[0];
    }

    public function getLimitDesc($limit)
    {
        $query = DB::table('groups')
            ->select('*')
            ->limit($limit)
            ->orderByDesc('id')
            ->get();


        return $query;
    }

    public function getTagsByGroup($groupID)
    {
        $tags = (new Group)->getOne($groupID)->tags;
        return explode(";", $tags);
    }

    public function getTags()
    {
        $query = DB::table('groups')
            ->select('tags')
            ->get();

        $tags = [];
        foreach ($query as $tag) {
            if ($tag->tags != null) {
                $tagExploded = explode(";", $tag->tags);
                foreach ($tagExploded as $tagE) {
                    $tags[] = $tagE;
                }

            }

        }
        array_unique($tags);
        return $tags;
    }

    public function updateGroup($group)
    {
        DB::table('groups')
            ->where('id', $group->id)
            ->update(['name' => $group->name]);

        DB::table('groups')
            ->where('id', $group->id)
            ->update(['desc' => $group->desc]);

        DB::table('groups')
            ->where('id', $group->id)
            ->update(['tags' => $group->tags]);

        DB::table('groups')
            ->where('id', $group->id)
            ->update(['admin' => $group->admin]);

        DB::table('groups')
            ->where('id', $group->id)
            ->update(['picname' => $group->picname]);

        DB::table('groups')
            ->where('id', $group->id)
            ->update(['picrepo' => $group->picrepo]);


    }

}
