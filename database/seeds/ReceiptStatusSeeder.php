<?php

use App\Models\ReceiptStatus;
use Illuminate\Database\Seeder;

class ReceiptStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Accepted = ReceiptStatus::create([
            'name' => 'Accepted'
        ]);
        $Canceled = ReceiptStatus::create([
            'name' => 'Canceled'
        ]);
        $Waiting = ReceiptStatus::create([
            'name' => 'Waiting'
        ]);
    }
}
