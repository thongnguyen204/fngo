<?php

use App\Models\Receipt;
use Illuminate\Database\Seeder;
use App\Models\Receipt_Detail;

class ReceiptDetailSeeder extends Seeder
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
            $room = Receipt_Detail::create([
                'receipt_id' => rand(1,Receipt::count()),
                'service_id' => rand(1,25),
                'category' => "nơi ở",
                'unit_price' => rand(1000,4000),
                'quantity' => rand(1,10),
            ]);
            
        }
        
    }
}
