<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class version_multiplierseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('multipliers_versions')->insert([
            'version_ID' => '1',
            'multiplier_ID' => '2',
        ]);


        DB::table('multipliers_versions')->insert([
            'version_ID' => '3',
            'multiplier_ID' => '3',
        ]);


        DB::table('multipliers_versions')->insert([
            'version_ID' => '3',
            'multiplier_ID' => '1',
        ]);


        DB::table('multipliers_versions')->insert([
            'version_ID' => '5',
            'multiplier_ID' => '4',
        ]);


        DB::table('multipliers_versions')->insert([
            'version_ID' => '5',
            'multiplier_ID' => '5',
        ]);

    }
}
