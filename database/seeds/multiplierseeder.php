<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class multiplierseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('multipliers')->insert([
            'name' => 'multiplier1',
            'identifier' => '2020-02-02 23:59:59',
            'multiplier'=> '1',
        ]);


        DB::table('multipliers')->insert([
            'name' => 'multiplier2',
            'identifier' => '2020-02-02 23:59:59',
            'multiplier'=> '0.85',
        ]);


        DB::table('multipliers')->insert([
            'name' => 'multiplier3',
            'identifier' => '2020-02-02 23:59:59',
            'multiplier'=> '0.9',
        ]);


        DB::table('multipliers')->insert([
            'name' => 'multiplier4',
            'identifier' => '2020-02-02 23:59:59',
            'multiplier'=> '0.95',
        ]);


        DB::table('multipliers')->insert([
            'name' => 'multiplier5',
            'identifier' => '2020-02-02 23:59:59',
            'multiplier'=> '1.05',
        ]);
    }
}
