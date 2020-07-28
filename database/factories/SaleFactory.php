<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sale;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Sale::class, function (Faker $faker) {
return [
'userID' => $faker->numberBetween(1,20),
'bookID' => $faker->numberBetween(1,98),
'cantitate'=> $faker->numberBetween(1,5),
'pret' => $faker->numberBetween(30,150),
'data_vanzarii' => $faker->dateTimeBetween('-2 years', 'now'),
];
});
