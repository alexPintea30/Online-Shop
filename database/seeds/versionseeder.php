<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class versionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('versions')->insert([
            'start_date' => '2020-01-01 23:59:59',
            'end_date' => '2020-02-02 23:59:59',
            'version_description'=> 'Jan Version',
        ]);


        DB::table('versions')->insert([
            'start_date' => '2020-02-02 03:15:15',
            'end_date' => '2020-03-03 03:15:15',
            'version_description'=> 'February Version',
        ]);


        DB::table('versions')->insert([
            'start_date' => '2020-06-01 03:00:00',
            'end_date' => '2020-08-31 03:00:00',
            'version_description'=> 'Summer Version',
        ]);


        DB::table('versions')->insert([
            'start_date' => '2020-09-01 13:15:15',
            'end_date' => '2020-10-01 13:15:15',
            'version_description'=> 'Students Version',
        ]);


        DB::table('versions')->insert([
            'start_date' => '2020-12-10 05:15:15',
            'end_date' => '2020-12-30 05:15:15',
            'version_description'=> 'X-mas Version',
        ]);
    }
}
