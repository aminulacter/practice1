<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
       'type' => $faker->unique()->word($minNbChars = 5),
       'price' => rand(10, 100)
    ];
});
