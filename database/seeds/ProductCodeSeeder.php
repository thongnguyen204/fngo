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
            'name' => 'Khách Sạn Mường Thanh',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1636695729/FnGO/HotelImage/etqirvvm47dyeyxezxbz.jpg',
            'category_id' => 1,
        ]);
        Products::create([
            'product_code' => 'hotel_2',
            'name' => 'Khách Sạn Sheraton',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1636704421/FnGO/HotelImage/jirjz04g4syjxbyttcpd.jpg',
            'category_id' => 1,
        ]);
        Products::create([
            'product_code' => 'hotel_3',
            'name' => 'Khách Sạn Dạ Hương',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1636695250/FnGO/HotelImage/q5qzbwh1jetpkeud5o3e.jpg',
            'category_id' => 1,
        ]);
        Products::create([
            'product_code' => 'hotel_4',
            'name' => 'Palace Hotel',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1636695624/FnGO/HotelImage/hssew7aazgjbxln5aiuf.jpg',
            'category_id' => 1,
        ]);

        Products::create([
            'product_code' => 'hotel_5',
            'name' => 'Khách Sạn Rex',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1636684715/FnGO/HotelImage/oijopyphwbahhszgjsky.jpg',
            'category_id' => 1,
        ]);

         Products::create([
            'product_code' => 'hotel_6',
            'name' => 'Khách sạn Mường Thanh Luxury',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1635854168/FnGO/HotelImage/k1vismer6ozplsfm8qi1.jpg',
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

         Products::create([
            'product_code' => 'hotel_5_room_1',
            'name' => 'Room 1',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1636894593/FnGO/roomImage/phongks3_brioev.jpg',
            'category_id' => 4,
        ]);
        Products::create([
            'product_code' => 'hotel_5_room_2',
            'name' => 'Room 2',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1636894593/FnGO/roomImage/phongks3_brioev.jpg',
            'category_id' => 4,
        ]);

         Products::create([
            'product_code' => 'hotel_6_room_1',
            'name' => 'Room 1',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1636894593/FnGO/roomImage/phongks3_brioev.jpg',
            'category_id' => 4,
        ]);
        Products::create([
            'product_code' => 'hotel_6_room_2',
            'name' => 'Room 2',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1636894593/FnGO/roomImage/phongks3_brioev.jpg',
            'category_id' => 4,
        ]);
        Products::create([
            'product_code' => 'hotel_6_room_3',
            'name' => 'Room 3',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1636894902/FnGO/roomImage/phongks4_ksrkpa.jpg',
            'category_id' => 4,
        ]);
    }
}
