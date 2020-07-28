<?php

namespace App\Http\Controllers;

use App\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\VersionService;

class CostController extends Controller{

    protected $versionService;

    public function __construct(){
        $this->versionService = new VersionService();
    }

    public function __invoke($basePrice){

    }

    public function cost($basePrice, $region, $age, $category){
        print_r($this->versionService->getCurrentVersions());
        $result = DB::table("multipliers")->get(["multiplier"])->first();
        return response()->json([
            'cost' => $result->multiplier * $basePrice
        ]);
    }

}
