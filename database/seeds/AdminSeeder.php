<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = User::create([
            'name' => 'admin',
            'role_id' => 1,
            'email' => 'admin@gmail.com',
            'phone' => '0903828499',
            'gender' => 'male',
            'password' => Hash::make('123456'),
        ]);
        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'phone' => '0905200419',
            'gender' => 'female',
            'password' => Hash::make('123456'),
        ]);
    }
}
