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
        $user = \App\User::where('email', 'pavel-sheremet-dev@yandex.ru')->first();

        if ($user)
        {
            $agency = new Agency();
            $agency->name = 'Atflat';
            $agency->user_id = $user->id;
            $agency->save();
        }
    }
}
