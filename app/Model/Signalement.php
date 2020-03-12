<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Signalement extends Model
{
    protected $fillable = [
        'id',
        'submitter',
        'concerned',
        'date',
        'isread',
        'importance',
        'description',
    ];

    public function getLimit($limit)
    {
        $query=DB::table('signalements')
            ->select('*')
            ->limit($limit)
            ->get();


        return $query;

    }

    public function getCount()
    {
        $query=DB::table('signalements')
            ->select('*')
            ->get();


        return $query->count();

    }

    public function getAll()
    {
        $query = DB::table('signalements')
            ->select('*')
            ->get();

        $listReports = [];
        foreach ($query as $report) {
            $listReports[] = $report;
        }
        return $listReports;
    }

    public function getOne($reportID)
    {
        $query = DB::table('signalements')
            ->select('*')
            ->where('id', $reportID)
            ->get();

        return $query[0];
    }

    public function remove($reportID)
    {
        try {
            $query = DB::table('signalements')
                ->delete($reportID);
            return true;
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function read($reportID) {
        try {
            return $query = DB::table('signalements')
                ->where('id', $reportID)
                ->update(['isread' => 1]);
        } catch (\Exception $e) {
            return $e;
        }
    }

}
