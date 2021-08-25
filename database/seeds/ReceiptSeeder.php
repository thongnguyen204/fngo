<?php

use App\Models\Receipt;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;use App\User;

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
        for ($i=0; $i < 5; $i++) { 
            $receipt = new Receipt;
            $receipt->user_id = User::where('name','thong')->first()->id;
            $receipt->price_sum = rand(1000,2000);
            $receipt->description = Str::random(15);
            $receipt->save();
        }

    }
}
