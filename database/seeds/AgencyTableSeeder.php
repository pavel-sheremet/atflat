<?php

use App\{Agency, User, Agent};
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
        $user = User::where('email', 'pavel-sheremet-dev@yandex.ru')->first();

        if ($user)
        {
            $agency = new Agency();
            $agency->name = 'Atflat';
            $agency->user_id = $user->id;
            $agency->save();
        }


        $user = factory(User::class, 1)->create()->first();
        $agency = new Agency();
        $agency->name = 'Other';
        $agency->user_id = $user->id;
        $agency->save();
    }
}
