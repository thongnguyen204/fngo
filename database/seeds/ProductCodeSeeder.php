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
            'product_code' => 'temp',
            'name' => 'name',
            'avatar' => 'avatar',
        ]);


        Products::create([
            'product_code' => 'tour_1',
            'name' => 'ĐÀ LẠT – 4N3Đ – THÀNH PHỐ SƯƠNG MÙ',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1632636749/FnGO/TourImage/main/hinh-anh-ho-xuan-huong-da-lat-ve-dem-hinh1_utcmrz.jpg',
        ]);
        Products::create([
            'product_code' => 'tour_2',
            'name' => 'TOUR NHA TRANG 3N3Đ- LỄ 30/04',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1632636749/FnGO/TourImage/main/hinh-anh-ho-xuan-huong-da-lat-ve-dem-hinh1_utcmrz.jpg',
        ]);
        Products::create([
            'product_code' => 'tour_3',
            'name' => 'ĐÀ LẠT – 3N2Đ – THÀNH PHỐ NGÀN HOA',
            'avatar' => 'https://hoasenviettourist.vn/wp-content/uploads/2021/04/R071dbf03938225c42bb0377bfc5cbfd0.jpg',
        ]);
        Products::create([
            'product_code' => 'tour_4',
            'name' => 'NHA TRANG – 4N3Đ – THÀNH PHỐ BIỂN THƠ MỘNG',
            'avatar' => 'https://hoasenviettourist.vn/wp-content/uploads/2021/04/R9f433e3b20553a746cec466dec8de8f1.jpg',
        ]);
        Products::create([
            'product_code' => 'tour_5',
            'name' => 'PHÚ YÊN – 3N2Đ – NƠI ĐẤT PHÚ TRỜI YÊN',
            'avatar' => 'https://hoasenviettourist.vn/wp-content/uploads/2021/04/R9f433e3b20553a746cec466dec8de8f1.jpg',
        ]);
        Products::create([
            'product_code' => 'tour_6',
            'name' => 'NHA TRANG – 4N3Đ – THÀNH PHỐ BIỂN THƠ MỘNG',
            'avatar' => 'https://hoasenviettourist.vn/wp-content/uploads/2021/04/R9460745190600cb82108c9ff0e39cad3-1024x682.jpg',
        ]);
        Products::create([
            'product_code' => 'tour_7',
            'name' => 'NHA TRANG – 4N3Đ – THÀNH PHỐ BIỂN THƠ MỘNG',
            'avatar' => 'https://hoasenviettourist.vn/wp-content/uploads/2021/04/R9f433e3b20553a746cec466dec8de8f1.jpg',
        ]);


        //hotel 
        Products::create([
            'product_code' => 'hotel_1',
            'name' => 'Hotel 1',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633248212/FnGO/hotelImage/hotelAvatar_wudbhl.jpg',
        ]);
        Products::create([
            'product_code' => 'hotel_2',
            'name' => 'Hotel 2',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633248212/FnGO/hotelImage/hotelAvatar_wudbhl.jpg',
        ]);
        Products::create([
            'product_code' => 'hotel_3',
            'name' => 'Hotel 3',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633248212/FnGO/hotelImage/hotelAvatar_wudbhl.jpg',
        ]);
        Products::create([
            'product_code' => 'hotel_4',
            'name' => 'Hotel 4',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633248212/FnGO/hotelImage/hotelAvatar_wudbhl.jpg',
        ]);

        //hotel 1 seeder
        Products::create([
            'product_code' => 'hotel_1_room_1',
            'name' => 'Room 1',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
        ]);
        Products::create([
            'product_code' => 'hotel_1_room_2',
            'name' => 'Room 2',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
        ]);


        //hotel 2 seeder
        Products::create([
            'product_code' => 'hotel_2_room_1',
            'name' => 'Room 1',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
        ]);
        Products::create([
            'product_code' => 'hotel_2_room_2',
            'name' => 'Room 2',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
        ]);

        //hotel 3 seeder
        Products::create([
            'product_code' => 'hotel_3_room_1',
            'name' => 'Room 1',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
        ]);
        Products::create([
            'product_code' => 'hotel_3_room_2',
            'name' => 'Room 2',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
        ]);

        //hotel 4 seeder
        Products::create([
            'product_code' => 'hotel_4_room_1',
            'name' => 'Room 1',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
        ]);
        Products::create([
            'product_code' => 'hotel_4_room_2',
            'name' => 'Room 2',
            'avatar' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1631955491/sample.jpg',
        ]);
    }
}
