<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MultipliersSeeder extends Seeder{


    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(){
        factory(\App\Multiplier::class, 30)->create();
    }
}
