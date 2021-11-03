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
        $random = rand(1000000,2000000);
        // 1 - da nang
        //  2 - ha noi
        //  3 - HCM
        // 4 = BR-VT
        Hotel::create([
            'name' => 'Khach san 1',
            'product_code' => 'hotel_1',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955495/samples/people/kitchen-bar.jpg',
            'price' => $random,
            'address' => '36 - 38 Lâm Hoành, Phước Mỹ, Sơn Trà, Đà Nẵng, Việt Nam, 550000',
            'city_province_id' => 1,
            'purchases_number' => 1,
        ]);

        Hotel::create([
            'name' => 'Khach san 2',
            'product_code' => 'hotel_2',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955498/samples/people/boy-snow-hoodie.jpg',
            'price' => $random,
            'address' => '36 - 38 Lâm Hoành, Phước Mỹ, Sơn Trà, Đà Nẵng, Việt Nam, 550000',
            'city_province_id' => 2,
            'purchases_number' => 3,
        ]);

        Hotel::create([
            'name' => 'Khach san 3',
            'product_code' => 'hotel_3',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955499/samples/animals/three-dogs.jpg',
            'price' => rand(1000000,2000000),
            'address' => '36 - 38 Lâm Hoành, Phước Mỹ, Sơn Trà, Đà Nẵng, Việt Nam, 550000',
            'city_province_id' => 3,
            'purchases_number' => 2,
        ]);

        Hotel::create([
            'name' => 'Khach san 4',
            'product_code' => 'hotel_4',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955505/samples/animals/kitten-playing.gif',
            'price' => rand(1000000,2000000),
            'address' => '36 - 38 Lâm Hoành, Phước Mỹ, Sơn Trà, Đà Nẵng, Việt Nam, 550000',
            'city_province_id' => 4,
            'purchases_number' => 4,
        ]);
        
    }
}
