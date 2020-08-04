<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        factory(\App\Version::class, 10)->create();

        /*
         *  Daca vreti sa introduceti date specifice (comentati apelul factory de mai sus)
         */

/*
        DB::table('versions')->insert([
           [
               'start_date' => '2020-07-1',
               'end_date' => '2020-07-30',
               'description' => 'Summer Sale !!'
           ]
        ]);

*/
    }
}
