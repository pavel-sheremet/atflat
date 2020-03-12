<?php

use App\RealtyType;
use Illuminate\Database\Seeder;

class RealtyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $realtyType = new RealtyType();
        $realtyType->name = 'Квартиры';
        $realtyType->save();

        $realtyType = new RealtyType();
        $realtyType->name = 'Комнаты';
        $realtyType->save();
    }
}
