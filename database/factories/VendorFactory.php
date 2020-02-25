<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vendor;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Vendor::class, function (Faker $faker) {
    $company_name = $faker->unique()->company;
    $slug = Str::kebab($company_name);

    return [
        'name' => $company_name,
        'slug' => $slug,
        'user_id' => $faker->numberBetween($min = 5, $max = 15),
        'description' => $faker->paragraph(),
        'facebook_profile' => $faker->url,
        'tweet_profile' => $faker->url,
        'linkedin_profile' => $faker->url

    ];
});
