<?php


namespace App\Services;

use App\Version;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VersionService
{

    // Returneaza
    public function getCurrentVersions($category)
    {
        $currentDate = Carbon::today();
       // $queryResponse = DB::table('mutlipliers_versions')->join()
        //return Version::select(['start_date', 'end_date'])->whereDate('start_date', '<', $currentDate)
          //  ->whereDate('end_date', '>', $currentDate)->get();
    }

}

