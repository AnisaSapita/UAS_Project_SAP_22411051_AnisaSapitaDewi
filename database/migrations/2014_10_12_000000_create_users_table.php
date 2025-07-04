<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama lengkap pengguna atau nama login
            $table->string('email')->unique(); // Email harus unik untuk setiap user
            $table->timestamp('email_verified_at')->nullable(); // Untuk verifikasi email, bisa dikosongkan
            $table->string('password'); // Kolom untuk menyimpan password yang sudah di-hash
            $table->enum('role', ['superadmin', 'admin', 'karyawan']); // Kolom role dengan pilihan terbatas

            // Kolom Foreign Key ke tabel 'perusahaans'
            // Nullable karena SuperAdmin tidak terikat ke perusahaan manapun
            // onDelete('set null') berarti jika perusahaan dihapus, field ini akan menjadi NULL
            $table->foreignId('perusahaan_id')->nullable()->constrained('perusahaans')->onDelete('set null');

            $table->rememberToken(); // Untuk fitur "Remember Me"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
