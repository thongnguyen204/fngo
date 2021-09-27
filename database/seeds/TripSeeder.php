<?php

use App\Models\Trip;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $trip1 =  Trip::create([
            'title' => 'ĐÀ LẠT – 4N3Đ – THÀNH PHỐ SƯƠNG MÙ',
            'content' => 'Tham quan 1 vong ĐÀ LẠT',
            'tour_code' => '2042000',
            'price' => 3000000,
            'day_start' => DateTime::createFromFormat('Y-m-d',
            '2000-04-20'),
            'place_start' => 'TPHCM',
            'space_available' => 10,
            'time_start' => '05:30',
            'day_number' => 4,
        ]);
        
    }
}