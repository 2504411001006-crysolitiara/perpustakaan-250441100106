<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'),
            ]
        );

        $admin->assignRole('Admin');


        // Membuat akun Petugas
        $petugas = User::firstOrCreate(
            ['email' => 'petugas@gmail.com'],
            [
                'name' => 'Petugas',
                'password' => Hash::make('password123'),
            ]
        );

        $petugas->assignRole('Petugas');


        // Membuat akun Siswa
        $siswa = User::firstOrCreate(
            ['email' => 'siswa@gmail.com'],
            [
                'name' => 'Siswa',
                'password' => Hash::make('password123'),
            ]
        );

        $siswa->assignRole('Siswa');
    }
}