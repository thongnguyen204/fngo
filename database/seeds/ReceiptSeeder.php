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
        //
        for ($i=0; $i < 20; $i++) { 
                $receipt =  Receipt::create([
                    'user_id' => User::where('name','thong')->first()->id,
                    'price_sum' => rand(1000,2000),
                    'description' => Str::random(10),
                ]);
        }
    }
}
