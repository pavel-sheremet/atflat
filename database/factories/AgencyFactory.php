<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Agency::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'user_id' => User::all()->random(1)->first()->id,
    ];
});
