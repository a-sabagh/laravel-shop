<?php

use Faker\Generator as Faker;

$factory->define(App\category::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->unique()->word)
    ];
});
