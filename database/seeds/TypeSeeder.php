<?php

use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\RoomType;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i <= Hotel::count(); $i++) { 
        $vip =  RoomType::create([
            'product_code' => 'hotel_'.$i.'_room_',
            'name' => 'Room 1',
            'hotel_id' => $i,
            'max_person' => 2,
            'price' => 2000000,
            'bed' => '1-2',
            'refund' => true,
            'breakfast' => true,
            'area' => 22,
            'image' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633314438/FnGO/hotelImage/roomType/1_double_bed_tupdnd.jpg',
        ]);
        $normal =  RoomType::create([
            'product_code' => 'hotel_'.$i.'_room_',
            'name' => 'Room 2',
            'hotel_id' => $i,
            'max_person' => 4,
            'price' => 3000000,
            'bed' => '2-2',
            'refund' => false,
            'breakfast' => false,
            'area' => 24,
            'image' => 'https://res.cloudinary.com/dloeyqk30/image/upload/v1633314428/FnGO/hotelImage/roomType/2_double_bed_zv5hjp.jpg',
        ]);
    }
    }
}
