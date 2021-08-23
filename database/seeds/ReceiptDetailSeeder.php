<?php

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
        for ($i=0; $i < 5; $i++) { 
            $receipt = new Receipt_Detail;
            $receipt->user_id = User::where('name','dialga11')->first()->id;
            $receipt->price_sum = rand(1000,2000);
            $receipt->description = Str::random(10);
            $receipt->save();
        }
        
    }
}
