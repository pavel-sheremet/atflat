<?php

use App\Agency;
use Illuminate\Database\Seeder;

class AgencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Agency::class, 5)
            ->make()
            ->each(function ($faker) {
                $agency = new Agency();
                $agency->name = $faker->name;
                $agency->user_id = $faker->user_id;
                $agency->save();
            });
    }
}
