<?php

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            Products::create([
                'product_code' => 'tour_1',
                'name' => 'ĐÀ LẠT – 4N3Đ – THÀNH PHỐ SƯƠNG MÙ',
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1632636749/FnGO/TourImage/main/hinh-anh-ho-xuan-huong-da-lat-ve-dem-hinh1_utcmrz.jpg',
            ]);
            Products::create([
                'product_code' => 'tour_2',
                'name' => 'ĐÀ LẠT – 4N3Đ – THÀNH PHỐ SƯƠNG MÙ',
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1632636749/FnGO/TourImage/main/hinh-anh-ho-xuan-huong-da-lat-ve-dem-hinh1_utcmrz.jpg',
            ]);


            //hotel 1 seeder
            Products::create([
                'product_code' => 'hotel_1_room_1',
                'name' => 'Hotel 1',
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
            ]);
            Products::create([
                'product_code' => 'hotel_1_room_2',
                'name' => 'Hotel 1',
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
            ]);


            //hotel 2 seeder
            Products::create([
                'product_code' => 'hotel_2_room_1',
                'name' => 'Hotel 2',
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
            ]);
            Products::create([
                'product_code' => 'hotel_2_room_2',
                'name' => 'Hotel 2',
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
            ]);
    }
}
