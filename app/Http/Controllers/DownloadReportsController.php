<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadReportsController extends Controller
{
    public function download()
    {
        return view('download');
    }

    public function report()
    {
        return view ('report');
    }


}

