<?php

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i < 25; $i++) { 
            $room = new Room([
                'room_number' => rand(100,400),
                'hotel_id' => rand(1,6),
                'type' => rand(1,2),
                'max_person' => rand(1,4),
                'price_per_night' => rand(1000,4000),
                'description' => Str::random(40),
                'available' => true,
            ]);
            $room->save();
        }
    }
}
