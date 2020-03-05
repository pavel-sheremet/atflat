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
        $user->first_name = 'Pavel';
        $user->last_name = 'Sheremet';
        $user->email = 'pavel-sheremet-dev@yandex.ru';
        $user->email_verified_at = Carbon::now();
        $user->password = bcrypt('12345678');
        $user->save();
    }
}
