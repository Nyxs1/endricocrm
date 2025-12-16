<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'sales@demo.com'],
            [
                'name' => 'Sales Demo',
                'password' => Hash::make('password'),
                'role' => 'sales',
            ]
        );

        User::updateOrCreate(
            ['email' => 'manager@demo.com'],
            [
                'name' => 'Manager Demo',
                'password' => Hash::make('password'),
                'role' => 'manager',
            ]
        );
    }
}
