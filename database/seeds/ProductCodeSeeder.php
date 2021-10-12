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
        for ($i=1; $i < 20; $i++) { 
            Products::create([
                'product_code' => 'tour_'.$i,
                'name' => 'ĐÀ LẠT – 4N3Đ – THÀNH PHỐ SƯƠNG MÙ',
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1632636749/FnGO/TourImage/main/hinh-anh-ho-xuan-huong-da-lat-ve-dem-hinh1_utcmrz.jpg',
            ]);
            Products::create([
                'product_code' => 'hotel_'.$i.'_room_1',
                'name' => 'Hotel '.$i,
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
            ]);
        }
        
    }
}
