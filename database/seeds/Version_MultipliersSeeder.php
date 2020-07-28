<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Version_MultipliersSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $multiplierIDs = DB::table('multipliers')->select('id')->get()->map(
            function($item, $key){
                return (array)$item;
            }
        )->all();

        $versionIDs = DB::table('versions')->select('id')->get()->map(
            function($item, $key){
                return (array)$item;
            }
        )->all();

        for($i = 0;$i<20;$i++){
            $index = rand(1, count($versionIDs) - 1);
            $idMultiplier = $multiplierIDs[$i]["id"];
            $idVersion = $versionIDs[$index]["id"];

            //if(empty(DB::table('multipliers_versions')->where('version_id', $idVersion)
            //   ->where('multiplier_id', $idMultiplier)->get()->toArray())) {
            DB::table('multipliers_versions')->insert([
                [
                    'multiplier_id' => $idMultiplier,
                    'version_id' => $idVersion
                ]
            ]);
        }
    }
}
