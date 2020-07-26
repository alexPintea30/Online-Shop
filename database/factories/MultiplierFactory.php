<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Multiplier;
use App\User;
use Faker\Generator as Faker;

function generateCombination($comb){

    $names = ['age', 'region', 'category'];
    $regions = ['AB', 'SV', 'BV'];
    $categories = ['RO', 'OTHER'];

    $ret = array();
    switch($comb){
        case 0:
            $ret[0] = 'age';

            $a1 = rand(0, 70);
            $a2 = rand($a1, 80);

            $ret[1] = $a1.'-'.$a2;
            break;
        case 1:
            $ret[0] = 'region';
            $ret[1] = $regions[rand(0, count($regions) - 1)];
            break;
        case 2:
            $ret[0] = 'category';
            $ret[1] = $categories[rand(0,count($categories) - 1)];
            break;
        default:
            break;
    }

    return $ret;
}


$factory->define(Multiplier::class, function (Faker $faker) {

    $combination = generateCombination(rand(0,2));

    return [
        'name' => $combination[0],
        'identifier' => $combination[1],
        'multiplier' => rand(1,20) / 10
    ];
});
