<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@klinik.test'],
            [
                'name'     => 'Admin Klinik',
                'password' => Hash::make('password123'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'petugas@klinik.test'],
            [
                'name'     => 'Petugas Pendaftaran',
                'password' => Hash::make('password123'),
            ]
        );
    }
}