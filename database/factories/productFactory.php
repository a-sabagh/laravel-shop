<?php

use Faker\Generator as Faker;

$factory->define(App\products::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->unique()->word),
        'status' =>1,
        'description' => $faker->sentence($faker->randomDigit),
        'price' => $faker->numberBetween(5,200),
        'weight' => $faker->numberBetween(3,50)
    ];
});
