<?php

namespace App\Http\Controllers;

use App\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VersionController extends Controller{

    public function index(){
        $currentDate = Carbon::today();
        return Version::select(['start_date', 'end_date'])->whereDate('start_date', '>', $currentDate)
            ->whereDate('end_date', '>', $currentDate)->get();
    }

}
