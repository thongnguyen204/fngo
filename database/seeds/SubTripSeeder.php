<?php

use App\Models\SubTrip;
use Illuminate\Database\Seeder;

class SubTripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $trip2 =  SubTrip::create([
            'title' => 'tham quan Q1',
            'content' => 'tham quan vong quanh q1',
        ]);
        $trip3 =  SubTrip::create([
            'title' => 'tham quan Q11',
            'content' => 'tham quan vong quanh q11',
        ]);
    }
}
