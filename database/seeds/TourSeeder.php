<?php

use App\Models\Tour;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i < 15; $i++) { 
            $tour =  Tour::create([
                'name' => 'ĐÀ LẠT – 4N3Đ – THÀNH PHỐ SƯƠNG MÙ',
                'content' => 'Tham quan 1 vong ĐÀ LẠT',
                'product_code' => 'tour_'.$i,
                'price' => 3000000,
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1632636749/FnGO/TourImage/main/hinh-anh-ho-xuan-huong-da-lat-ve-dem-hinh1_utcmrz.jpg',
                'departure_date' => DateTime::createFromFormat('Y-m-d',
                '2000-04-20'),
                'departure_place' => 'TPHCM',
                'passenger_num' => 10,
                'departure_time' => '05:30',
                'departure_hour' => 5,
                'departure_minute' => 30,
                'day_number' => 4,
            ]);
        }
        
    }
}
