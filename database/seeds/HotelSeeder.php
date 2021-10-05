<?php

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // for ($i=1; $i < 6; $i++) { 
        //     $hotel = new Hotel([
        //         'name' => 'Khach san '.$i,
        //         'price_avg' => rand(1000,2000),
        //     ]);
        //     $hotel->save();
        // }
        for ($i=1; $i < 10; $i++) { 
            $hotel = Hotel::create([
                'name' => 'Khach san '. $i,
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633248212/FnGO/hotelImage/hotelAvatar_wudbhl.jpg',
                'price' => rand(1000,2000),
                'address' => '36 - 38 Lâm Hoành, Phước Mỹ, Sơn Trà, Đà Nẵng, Việt Nam, 550000',
                'city_province_id' => 3,
            ]);
        }
    }
}
