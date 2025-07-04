<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('karyawans')->onDelete('cascade');
            $table->date('bulan_tahun'); // Periode gaji (misal: 2025-06-01)
            $table->decimal('gaji_pokok', 15, 2); // Angka desimal untuk nominal uang
            $table->decimal('tunjangan', 15, 2)->default(0); // Nilai default 0 jika tidak diisi
            $table->decimal('potongan', 15, 2)->default(0);
            $table->decimal('total_gaji', 15, 2); // Total gaji setelah perhitungan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};
