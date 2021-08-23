<?php

use App\Models\Receipt;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReceiptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //R
        // for ($i=0; $i < 10; $i++) { 
        //         DB::table('receipts')->insert([
        //             'user_id' => rand(2,3),
        //             'price_sum' => rand(1000,2000),
        //             'description' => Str::random(10),

        //         ]);
        // }
        
        $receipt = new Receipt;
        $receipt->user_id = rand(2,3);
        $receipt->price_sum = rand(1000,2000);
        $receipt->description = Str::random(10);
        $receipt->save();

    }
}
