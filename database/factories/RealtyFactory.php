<?php

/** @var Factory $factory */

use App\City;
use App\Realty;
use App\RealtyRoomsNumber;
use App\RealtyType;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Realty::class, function (Faker $faker) {
    return [
        'type_id' => RealtyType::inRandomOrder()->first()->id,
        'price' => $faker->randomFloat(0,10000, 30000),
        'sub_price' => $faker->randomFloat(0,10000, 30000),
        'area' => $faker->randomFloat(0,10, 60),
        'rooms_number_id' => RealtyRoomsNumber::inRandomOrder()->first()->id,
        'description' => $faker->realText(),
        'lat' => $faker->latitude,
        'long' => $faker->longitude,
        'city_id' => City::inRandomOrder()->first()->id,
        'user_id' => User::inRandomOrder()->first()->id,
        'street' => $faker->streetName,
    ];
});
