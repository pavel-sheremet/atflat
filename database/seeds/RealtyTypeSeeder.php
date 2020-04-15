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
        $realtyType->name = 'Квартира';
        $realtyType->code = 'flat';
        $realtyType->save();

        $realtyType = new RealtyType();
        $realtyType->name = 'Комната';
        $realtyType->code = 'room';
        $realtyType->save();
    }
}
