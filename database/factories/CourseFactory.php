<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'title' => ucfirst($faker->unique()->word),
        'duration' => $faker->randomNumber,
        'price' => $faker->numberBetween(5,200),
        'author' => $faker->name
    ];
});
