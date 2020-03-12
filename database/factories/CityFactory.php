<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    $name = $faker->city;

    return [
        'name' => $name,
        'slug' => \Str::slug($name, '-')
    ];
});
