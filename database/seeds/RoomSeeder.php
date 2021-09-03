<?php

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

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
        $count = 1;
        for ($i=1; $i < 10; $i++) {
            $room = new Room([
                'room_number' => rand(100,400),
                'hotel_id' => $i,
                'type_id' => $count,
                'description' => Str::random(40),
                'available' => true,
            ]);
            $room->save();
            $count++;
        }
        $count2 = 2;
        for ($i=1; $i < 10; $i++) {
            $room = new Room([
                'room_number' => rand(100,400),
                'hotel_id' => $i,
                'type_id' => $count2,
                'description' => Str::random(40),
                'available' => true,
            ]);
            $room->save();
            $count2++;
        }
    }
}
