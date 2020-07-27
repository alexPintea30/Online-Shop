<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Version::class, function (Faker $faker) {

    $start = $faker->dateTimeBetween('next Monday', 'next Monday +7 days');
    return [
        'start_date' => $start,
        'end_date' => $faker->dateTimeBetween($start, $start->format('Y-m-d').' +10 days'),
        'description' => Str::random(20)
    ];
});
