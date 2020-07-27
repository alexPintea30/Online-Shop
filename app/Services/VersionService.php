<?php


namespace App\Services;

use App\Version;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VersionService
{
    public function getCurrentVersions()
    {
        $currentDate = Carbon::today();
        return Version::select(['start_date', 'end_date'])->whereDate('start_date', '<', $currentDate)
            ->whereDate('end_date', '>', $currentDate)->get();
    }

}

