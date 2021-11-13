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
        // a temporary product
        


        Products::create([
            'product_code' => 'tour_1',
            'name' => 'ĐÀ LẠT – 4N3Đ – THÀNH PHỐ SƯƠNG MÙ',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1632636749/FnGO/TourImage/main/hinh-anh-ho-xuan-huong-da-lat-ve-dem-hinh1_utcmrz.jpg',
            'category_id' => 2,
        ]);
        Products::create([
            'product_code' => 'tour_2',
            'name' => 'TOUR NHA TRANG 3N3Đ- LỄ 30/04',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1632636749/FnGO/TourImage/main/hinh-anh-ho-xuan-huong-da-lat-ve-dem-hinh1_utcmrz.jpg',
            'category_id' => 2,
        ]);
        Products::create([
            'product_code' => 'tour_3',
            'name' => 'ĐÀ LẠT – 3N2Đ – THÀNH PHỐ NGÀN HOA',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955501/samples/landscapes/beach-boat.jpg',
            'category_id' => 2,
        ]);
        Products::create([
            'product_code' => 'tour_4',
            'name' => 'NHA TRANG – 4N3Đ – THÀNH PHỐ BIỂN THƠ MỘNG',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955504/samples/landscapes/nature-mountains.jpg',
            'category_id' => 2,
        ]);
        Products::create([
            'product_code' => 'tour_5',
            'name' => 'PHÚ YÊN – 3N2Đ – NƠI ĐẤT PHÚ TRỜI YÊN',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955497/samples/landscapes/girl-urban-view.jpg',
            'category_id' => 2,
        ]);
        Products::create([
            'product_code' => 'tour_6',
            'name' => 'NHA TRANG – 4N3Đ – THÀNH PHỐ BIỂN THƠ MỘNG',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955500/samples/landscapes/architecture-signs.jpg',
            'category_id' => 2,
        ]);
        Products::create([
            'product_code' => 'tour_7',
            'name' => 'NHA TRANG – 4N3Đ – THÀNH PHỐ BIỂN THƠ MỘNG',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955495/samples/animals/reindeer.jpg',
            'category_id' => 2,
        ]);


        //hotel 
        Products::create([
            'product_code' => 'hotel_1',
            'name' => 'Hotel 1',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955495/samples/people/kitchen-bar.jpg',
            'category_id' => 1,
        ]);
        Products::create([
            'product_code' => 'hotel_2',
            'name' => 'Hotel 2',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955498/samples/people/boy-snow-hoodie.jpg',
            'category_id' => 1,
        ]);
        Products::create([
            'product_code' => 'hotel_3',
            'name' => 'Hotel 3',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955499/samples/animals/three-dogs.jpg',
            'category_id' => 1,
        ]);
        Products::create([
            'product_code' => 'hotel_4',
            'name' => 'Hotel 4',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955505/samples/animals/kitten-playing.gif',
            'category_id' => 1,
        ]);

        //hotel 1 seeder
        Products::create([
            'product_code' => 'hotel_1_room_1',
            'name' => 'Room 1',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633314438/FnGO/hotelImage/roomType/1_double_bed_tupdnd.jpg',
            'category_id' => 4,
        ]);
        Products::create([
            'product_code' => 'hotel_1_room_2',
            'name' => 'Room 2',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633314438/FnGO/hotelImage/roomType/1_double_bed_tupdnd.jpg',
            'category_id' => 4,
        ]);


        //hotel 2 seeder
        Products::create([
            'product_code' => 'hotel_2_room_1',
            'name' => 'Room 1',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633314428/FnGO/hotelImage/roomType/2_double_bed_zv5hjp.jpg',
            'category_id' => 4,
        ]);
        Products::create([
            'product_code' => 'hotel_2_room_2',
            'name' => 'Room 2',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633314428/FnGO/hotelImage/roomType/2_double_bed_zv5hjp.jpg',
            'category_id' => 4,
        ]);

        //hotel 3 seeder
        Products::create([
            'product_code' => 'hotel_3_room_1',
            'name' => 'Room 1',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633314428/FnGO/hotelImage/roomType/2_double_bed_zv5hjp.jpg',
            'category_id' => 4,
        ]);
        Products::create([
            'product_code' => 'hotel_3_room_2',
            'name' => 'Room 2',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633314428/FnGO/hotelImage/roomType/2_double_bed_zv5hjp.jpg',
            'category_id' => 4,
        ]);

        //hotel 4 seeder
        Products::create([
            'product_code' => 'hotel_4_room_1',
            'name' => 'Room 1',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633314428/FnGO/hotelImage/roomType/2_double_bed_zv5hjp.jpg',
            'category_id' => 4,
        ]);
        Products::create([
            'product_code' => 'hotel_4_room_2',
            'name' => 'Room 2',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633314428/FnGO/hotelImage/roomType/2_double_bed_zv5hjp.jpg',
            'category_id' => 4,
        ]);
    }
}
