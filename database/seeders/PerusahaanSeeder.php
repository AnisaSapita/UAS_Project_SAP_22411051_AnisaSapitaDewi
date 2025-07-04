<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perusahaan;

class PerusahaanSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat data perusahaan default jika belum ada
        Perusahaan::firstOrCreate(
            ['id' => 1], // Kunci untuk memastikan hanya ada satu record
            [
                'nama_perusahaan' => 'PT. Makmur Sejahtera Abadi',
                'email_perusahaan' => 'contact@makmursejahtera.co.id',
                'telepon' => '(021) 555-1234',
                'alamat' => 'Jl. Jenderal Sudirman Kav. 52-53, Jakarta',
            ]
        );
    }
}
