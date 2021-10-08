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
            ]);
            Products::create([
                'product_code' => 'hotel_'.$i.'_room_1',
                'name' => 'Hotel '.$i,
            ]);
        }
        
    }
}
