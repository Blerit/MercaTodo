<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'title'         => $faker->sentence,
        'description'   => $faker->text(100),
        'price'         => $faker->price(),
    ];
});
