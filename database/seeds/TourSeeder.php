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
        
            $tour =  Tour::create([
                'name' => 'ĐÀ LẠT – 4N3Đ – THÀNH PHỐ SƯƠNG MÙ',
                'content' => 'Tham quan 1 vong ĐÀ LẠT',
                'product_code' => 'tour_1',
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
                'city_province_id' => 3,
            ]);

            
            $tour =  Tour::create([
                'name' => 'TOUR NHA TRANG 3N3Đ- LỄ 30/04',
                'content' => 'Tham quan 1 vong ĐÀ LẠT',
                'product_code' => 'tour_2',
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
                'city_province_id' => 3,
            ]);

            $tour =  Tour::create([
                'name' => 'ĐÀ LẠT – 3N2Đ – THÀNH PHỐ NGÀN HOA',
                'content' => 'Tham quan 1 vong ĐÀ LẠT',
                'product_code' => 'tour_3',
                'price' => 3000000,
                'avatar' => 'https://hoasenviettourist.vn/wp-content/uploads/2021/04/R071dbf03938225c42bb0377bfc5cbfd0.jpg',
                'departure_date' => DateTime::createFromFormat('Y-m-d',
                '2000-04-20'),
                'departure_place' => 'TPHCM',
                'passenger_num' => 10,
                'departure_time' => '05:30',
                'departure_hour' => 5,
                'departure_minute' => 30,
                'day_number' => 4,
                'city_province_id' => 3,
            ]);

            $tour =  Tour::create([
                'name' => ' NHA TRANG – 4N3Đ – THÀNH PHỐ BIỂN THƠ MỘNG',
                'content' => 'Tham quan 1 vong ĐÀ LẠT',
                'product_code' => 'tour_4',
                'price' => 3000000,
                'avatar' => 'https://hoasenviettourist.vn/wp-content/uploads/2021/04/R9f433e3b20553a746cec466dec8de8f1.jpg',
                'departure_date' => DateTime::createFromFormat('Y-m-d',
                '2000-04-20'),
                'departure_place' => 'TPHCM',
                'passenger_num' => 10,
                'departure_time' => '05:30',
                'departure_hour' => 5,
                'departure_minute' => 30,
                'day_number' => 4,
                'city_province_id' => 3,
            ]);
    }
}
