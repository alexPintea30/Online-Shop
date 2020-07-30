<?php

namespace App\Http\Controllers;

use App\Multiplier;
use App\Version;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\VersionService;

class CostController extends Controller{

    protected $versionService;

    public function __construct(){
        $this->versionService = new VersionService();
    }

    public function cost($basePrice, $region, $age, $category){
        $result = DB::table("multipliers")->get(["multiplier"])->first();
        return response()->json([
            'cost' => $result->multiplier * $basePrice
        ]);
    }

    public function finalPrice($basePrice, $region, $age, $category){
        return $basePrice * $this->calculateCost('region', $region) *
            $this->calculateCost('age', $age) *
            $this->calculateCost('category', $category);
    }

    public function calculateCost($name, $identifier){
        $ret = 1;
        $today = Carbon::today();
        if($name == 'age'){
            $result = DB::table('multipliers')
                ->join('multipliers_versions', 'multipliers_versions.multiplier_id', '=', 'multipliers.id')
                ->join('versions', 'versions.id', '=', 'multipliers_versions.version_id')
                ->where('multipliers.name', '=', $name)
                ->whereDate('versions.start_date', '<=', $today)
                ->whereDate('versions.end_date', '>=', $today)
                ->select(['multipliers.id', 'name', 'identifier','multiplier'])->get();

            $res = json_decode(json_encode($result), true);
            $multipliers = array_filter($res, function($elem) use ($identifier) {
                    list($age1, $age2) = explode('-', $elem['identifier']);
                    if($identifier >= $age1 && $identifier <= $age2){
                        return true;
                    }
                    return false;
            });

        }else {

            $result = DB::table('multipliers')
                ->join('multipliers_versions', 'multipliers_versions.multiplier_id', '=', 'multipliers.id')
                ->join('versions', 'versions.id', '=', 'multipliers_versions.version_id')
                ->where('multipliers.name', '=', $name)
                ->where('multipliers.identifier', '=', $identifier)
                ->whereDate('versions.start_date', '<=', $today)
                ->whereDate('versions.end_date', '>=', $today)
                ->select(['multipliers.id', 'name', 'multiplier'])->get();
            $multipliers = json_decode(json_encode($result), true);
        }

        foreach($multipliers as $m){
            $ret = $ret * $m['multiplier'];
        }
        return $ret;
    }

}
