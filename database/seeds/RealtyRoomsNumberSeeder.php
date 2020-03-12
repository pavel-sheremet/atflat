<?php

use App\RealtyRoomsNumber;
use Illuminate\Database\Seeder;

class RealtyRoomsNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $length = 8;

        for ($i = 0; $i <= $length; $i++)
        {
            $realtyRoomsNumber = new RealtyRoomsNumber();
            $realtyRoomsNumber->value = $i;
            $realtyRoomsNumber->save();
        }
    }
}
