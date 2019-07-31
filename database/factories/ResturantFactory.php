<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Resturant;
use Faker\Generator as Faker;

$factory->define(Resturant::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'address' => $faker->unique()->address,
        'phone' => $faker->unique()->phoneNumber ,
        'description' => $faker->text,
    
    ];
});
