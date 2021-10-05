<?php

use App\Models\CityProvince;
use Illuminate\Database\Seeder;

class CityProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CityProvince::create([
            'name' => 'Đà Nẵng',
        ]);
        CityProvince::create([
            'name' => 'Hà Nội',
        ]);
        CityProvince::create([
            'name' => 'Hồ Chí Minh',
        ]);
        CityProvince::create([
            'name' => 'Bà Rịa–Vũng Tàu',
        ]);
    }
}
