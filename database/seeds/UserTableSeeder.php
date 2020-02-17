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
        $user = new User();
        $user->name = 'Pavel Sheremet';
        $user->email = 'pavel-sheremet-dev@yandex.ru';
        $user->email_verified_at = Carbon::now();
        $user->password = bcrypt('12345678');
        $user->save();

        $user = new User();
        $user->name = 'Thomas Anderson';
        $user->email = 'thomas-anderson@test.test';
        $user->email_verified_at = Carbon::now();
        $user->password = bcrypt('12345678');
        $user->save();

        $user = new User();
        $user->name = 'Mister Smith';
        $user->email = 'mister-smith@test.test';
        $user->email_verified_at = Carbon::now();
        $user->password = bcrypt('12345678');
        $user->save();
    }
}
