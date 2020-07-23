<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'title'         => $faker->sentence,
        'description'   => $faker->text(100),
        'price'         => $faker->numberBetween($min = 100, $max = 9000),
        'tags'          => $faker->sentence,
        'stock'         => $faker->numberBetween($min = 0, $max = 20)
    ];
});
