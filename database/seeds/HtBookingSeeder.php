<?php

use App\Models\ht_booking;
use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HtBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arrive = "20/04/2000";
        $checkout = "30/04/2000";
        for ($i=1; $i < 25; $i++) { 
        $ht_booking =  ht_booking::create([
            'room_id' => rand(1,Room::count()),
            'arrive' => 
            DateTime::createFromFormat('d/m/Y',$arrive),
            'checkout' => 
            DateTime::createFromFormat('d/m/Y',$checkout),
            'description' => Str::random(30),
        ]);
        }   
    }
}
