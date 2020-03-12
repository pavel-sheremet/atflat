<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(AgencyTableSeeder::class);
        $this->call(AgentTableSeeder::class);
        $this->call(RealtyTypeSeeder::class);
        $this->call(RealtyRoomsNumberSeeder::class);
        $this->call(RealtyTableSeeder::class);
    }
}
