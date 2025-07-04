<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();

            // Foreign Key ke tabel 'users'
            // onDelete('cascade') berarti jika data user dihapus, data karyawan ini juga ikut terhapus
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Foreign Key ke tabel 'perusahaans'
            // onDelete('cascade') berarti jika perusahaan dihapus, data karyawan ini juga ikut terhapus
            $table->foreignId('perusahaan_id')->constrained('perusahaans')->onDelete('cascade');

            $table->string('nama_lengkap'); // Nama lengkap bisa berbeda dari nama login
            $table->string('jabatan'); // Atau $table->string('jabatan')->nullable(); jika boleh kosong
            $table->string('nomor_telepon');
            $table->text('alamat');
            $table->date('tanggal_bergabung'); // Kolom khusus tanggal
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
