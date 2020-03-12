<?php

use App\Realty;
use Illuminate\Database\Seeder;

class RealtyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Realty::class, 100)
            ->make()
            ->each(function ($faker) {
                $realty = new Realty();
                $realty->type_id = $faker->type_id;
                $realty->user_id = $faker->user_id;
                $realty->price = $faker->price;
                $realty->sub_price = $faker->sub_price;
                $realty->area = $faker->area;
                $realty->rooms_number_id = $faker->rooms_number_id;
                $realty->description = $faker->description;
                $realty->lat = $faker->lat;
                $realty->long = $faker->long;
                $realty->region = $faker->region;
                $realty->city_id = $faker->city_id;
                $realty->district = $faker->district;
                $realty->street = $faker->street;
                $realty->house = $faker->house;
                $realty->save();
            });
    }
}
