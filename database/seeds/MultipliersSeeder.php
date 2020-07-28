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

        /*
         *  Daca vreti sa introduceti date specifice (comentati apelul factory de mai sus)
         *
        DB::table('multipliers')->insert([
           [
               'name' => 'age',
               'identifier' => '20-27',
               'multiplier' => 0.87
           ],

            [
               'name' => 'region',
               'identifier' => 'Cluj',
               'multiplier' => 1.4
           ],
        ]);
        */

    }
}
