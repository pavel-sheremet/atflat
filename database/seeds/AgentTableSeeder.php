<?php

use App\Agency;
use App\Agent;
use App\User;
use Illuminate\Database\Seeder;

class AgentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 100)
            ->create()
            ->each(function ($user) {
                $agent = new Agent();
                $agent->user_id = $user->id;
                $agent->agency_id = rand(0, 1) ? Agency::all()->random(1)->first()->id : null;
                $agent->save();
            });
    }
}
