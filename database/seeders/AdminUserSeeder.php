<?php

namespace Database\Seeders;

use App\Models\Admin_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Admin_user::create([
            'name' => 'Pritom GK',
            'phone' => '0000',
            'email' => 'pritomguha62@gmail.com',
            'email_verified' => 1,
            'verify_token' => 657434,
            'status' => 1,
            'role_id' => 1,
            'password' => Hash::make('Pritomgk@12#'),
        ]);

        Admin_user::create([
            'name' => 'Holy IT',
            'phone' => '+8801734167539',
            'email' => 'holy.it01@gmail.com',
            'email_verified' => 1,
            'verify_token' => 657467,
            'status' => 1,
            'role_id' => 2,
            'password' => Hash::make('#HolyIT@2024#'),
        ]);

    }
}


