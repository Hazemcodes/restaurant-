<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Dish;
use App\Resturant;
use Faker\Generator as Faker;

$factory->define(Dish::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1),
        'description' => $faker->text(),
        'price' => $faker->numberBetween(50,200),
    ];
});
