<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan model User diimport
use Illuminate\Support\Facades\Hash; // Pastikan Hash diimport

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat user superadmin
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@perusahaan.com',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang lebih kuat
            'role' => 'superadmin',
        ]);
    }
}
