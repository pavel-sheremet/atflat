<?php

use App\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(City::class, 10)
            ->make()
            ->each(function ($faker) {
                $realty = new City();
                $realty->name = $faker->name;
                $realty->slug = $faker->slug;
                $realty->save();
            });
    }
}
