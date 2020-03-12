<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(User::class, 50)
            ->make()
            ->each(function ($faker) {
                $user = new User();
                $user->name = $faker->name;
                $user->last_name = $faker->name;
                $user->password = $faker->password;
                $user->email = $faker->email;
                $user->email_verified_at = $faker->email_verified_at;
                $user->password = $faker->password;
                $user->remember_token = $faker->remember_token;
                $user->save();
            });
    }
}
