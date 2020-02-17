<?php

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
        $users = User::whereIn('name', ['Thomas Anderson', 'Mister Smith'])
            ->select('id')
            ->get();

        foreach ($users as $user)
        {
            $agent = new Agent();
            $agent->user_id = $user->id;
            $agent->save();
        }
    }
}
