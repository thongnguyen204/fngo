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
            'title' => 'du lich TPHCM',
            'content' => 'du lich vong quanh Ho Chi Minh',
        ]);
        
    }
}
