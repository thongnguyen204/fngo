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
            'code' => 1,
            'name' => 'VIP',
            'hotel_id' => $i,
            'max_person' => rand(1,4),
            'price_per_night' => 2000,
        ]);
        $normal =  RoomType::create([
            'code' => 2,
            'name' => 'Normal',
            'hotel_id' => $i,
            'max_person' => rand(1,4),
            'price_per_night' => 1000,
        ]);
    }
    }
}
