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
        $price = rand(10000,30000);
        
            $tour =  Tour::create([
                'name' => 'ĐÀ LẠT – 4N3Đ – THÀNH PHỐ SƯƠNG MÙ',
                'content' => 'Tham quan 1 vong ĐÀ LẠT',
                'product_code' => 'tour_1',
                'price' => $price ,
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
                'purchases_number' => 2,
            ]);

            
            $tour =  Tour::create([
                'name' => 'TOUR NHA TRANG 3N3Đ- LỄ 30/04',
                'content' => 'Tham quan 1 vong ĐÀ LẠT',
                'product_code' => 'tour_2',
                'price' => $price ,
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1632636749/FnGO/TourImage/main/hinh-anh-ho-xuan-huong-da-lat-ve-dem-hinh1_utcmrz.jpg',
                'departure_date' => DateTime::createFromFormat('Y-m-d',
                '2000-04-20'),
                'departure_place' => 'TPHCM',
                'passenger_num' => 10,
                'departure_time' => '05:30',
                'departure_hour' => 5,
                'departure_minute' => 30,
                'day_number' => 4,
                'city_province_id' => 1,
                'purchases_number' => 3,
            ]);

            $tour =  Tour::create([
                'name' => 'ĐÀ LẠT – 3N2Đ – THÀNH PHỐ NGÀN HOA',
                'content' => 'Tham quan 1 vong ĐÀ LẠT',
                'product_code' => 'tour_3',
                'price' => $price ,
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955501/samples/landscapes/beach-boat.jpg',
                'departure_date' => DateTime::createFromFormat('Y-m-d',
                '2000-04-20'),
                'departure_place' => 'TPHCM',
                'passenger_num' => 10,
                'departure_time' => '05:30',
                'departure_hour' => 5,
                'departure_minute' => 30,
                'day_number' => 4,
                'city_province_id' => 4,
                'purchases_number' => 1,
            ]);

            Tour::create([
                'name' => ' NHA TRANG – 4N3Đ – THÀNH PHỐ BIỂN THƠ MỘNG',
                'content' => 'Tham quan 1 vong ĐÀ LẠT',
                'product_code' => 'tour_4',
                'price' => $price ,
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955504/samples/landscapes/nature-mountains.jpg',
                'departure_date' => DateTime::createFromFormat('Y-m-d',
                '2000-04-20'),
                'departure_place' => 'TPHCM',
                'passenger_num' => 10,
                'departure_time' => '05:30',
                'departure_hour' => 5,
                'departure_minute' => 30,
                'day_number' => 4,
                'city_province_id' => 3,
                'purchases_number' => 4,
            ]);

            Tour::create([
                'name' => 'PHÚ YÊN – 3N2Đ – NƠI ĐẤT PHÚ TRỜI YÊN',
                'content' => 'Tham quan 1 vong ĐÀ LẠT',
                'product_code' => 'tour_5',
                'price' => $price ,
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955497/samples/landscapes/girl-urban-view.jpg',
                'departure_date' => DateTime::createFromFormat('Y-m-d',
                '2000-04-20'),
                'departure_place' => 'TPHCM',
                'passenger_num' => 10,
                'departure_time' => '05:30',
                'departure_hour' => 5,
                'departure_minute' => 30,
                'day_number' => 4,
                'city_province_id' => 2,
                'purchases_number' => 4,
            ]);

            Tour::create([
                'name' => ' NHA TRANG – 4N3Đ – THÀNH PHỐ BIỂN THƠ MỘNG',
                'content' => 'Tham quan 1 vong ĐÀ LẠT',
                'product_code' => 'tour_6',
                'price' => $price ,
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955500/samples/landscapes/architecture-signs.jpg',
                'departure_date' => DateTime::createFromFormat('Y-m-d',
                '2000-04-20'),
                'departure_place' => 'TPHCM',
                'passenger_num' => 10,
                'departure_time' => '05:30',
                'departure_hour' => 5,
                'departure_minute' => 30,
                'day_number' => 4,
                'city_province_id' => 4,
                'purchases_number' => 4,
            ]);

            Tour::create([
                'name' => ' NHA TRANG – 4N3Đ – THÀNH PHỐ BIỂN THƠ MỘNG',
                'content' => 'Tham quan 1 vong ĐÀ LẠT',
                'product_code' => 'tour_7',
                'price' => $price ,
                'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955495/samples/animals/reindeer.jpg',
                'departure_date' => DateTime::createFromFormat('Y-m-d',
                '2000-04-20'),
                'departure_place' => 'TPHCM',
                'passenger_num' => 10,
                'departure_time' => '05:30',
                'departure_hour' => 5,
                'departure_minute' => 30,
                'day_number' => 4,
                'city_province_id' => 1,
                'purchases_number' => 4,
            ]);
    }
}
