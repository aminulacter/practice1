<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->words($nb = 2, $asText = true),
        'slug' =>$faker->unique()->word,
        'details' => $faker->text($maxNbChars = 200),
        'price' =>$faker->numberBetween($min = 10, $max = 100),
        'image' => 'default.jpg',
        'images' => 'default1.jpg, default2.jpg, default3.jpg',
        'layout' => 'responsive',
        'browser' => 'crome, firefox'
    ];
});
