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
        factory(Agency::class, 30)
            ->make()
            ->each(function ($faker) {
                $agency = new Agency();
                $agency->name = $faker->name;
                $agency->user_id = $faker->user_id;
                $agency->save();
            });
//
//        if ($user)
//        {
//            $agency = new Agency();
//            $agency->name = 'Atflat';
//            $agency->user_id = $user->id;
//            $agency->save();
//        }
//
//
//        $user = factory(User::class, 1)->create()->first();
//        $agency = new Agency();
//        $agency->name = 'Other';
//        $agency->user_id = $user->id;
//        $agency->save();
    }
}
