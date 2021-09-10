<?php

use App\Models\TripSubtrip;
use Illuminate\Database\Seeder;

class TripSubTripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $trip1 =  TripSubtrip::create([
            'trip_id' => 1,
            'subTrip_id' => 1,
        ]);
        $trip1 =  TripSubtrip::create([
            'trip_id' => 1,
            'subTrip_id' => 2,
        ]);
    }
}
