<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CostController extends Controller{
    public function __invoke($basePrice){

    }

    public function cost($basePrice){
        $response = DB::table("multipliers")->get(["multiplier"])->first();
        return $response->multiplier * $basePrice;
    }
}
