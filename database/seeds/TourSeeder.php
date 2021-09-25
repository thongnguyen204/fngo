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
            'title' => 'ĐÀ LẠT – 4N3Đ – THÀNH PHỐ SƯƠNG MÙ',
            'content' => 'Tham quan 1 vong ĐÀ LẠT',
            'tour_code' => '2042000',
            'price' => 3000000,
            'departure_date' => DateTime::createFromFormat('Y-m-d',
            '2000-04-20'),
            'departure_place' => 'TPHCM',
            'passenger_num' => 10,
            'departure_time' => '05:30',
            'day_number' => 4,
        ]);
    }
}
