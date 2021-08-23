<?php

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i < 6; $i++) { 
            $hotel = new Hotel([
                'name' => 'Khach san '.$i,
                'price_avg' => rand(1000,2000),
            ]);
            $hotel->save();
        }
    }
}
