<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadReportsController extends Controller
{

    public function reports()
    {
        return view ('report');
    }
    public function test()
    {
        return view ('test');
    }

}

