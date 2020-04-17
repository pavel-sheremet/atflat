<?php

use App\RentPeriod;
use Illuminate\Database\Seeder;

class RentPeriodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RentPeriod::create([
            'code' => 'short'
        ]);

        RentPeriod::create([
            'code' => 'long'
        ]);
    }
}
