<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Sale;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    factory(App\Sale::class,100)->create();
    }
}
