<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'address' => 'Jakarta',
            'phone_number' => '081234567890',
            'member' => '0'
        ]);

        // USER
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'user',
            'address' => 'Bandung',
            'phone_number' => '089876543210',
            'member' => '1'
        ]);
    }
}