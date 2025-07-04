<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    // Pastikan semua kolom baru bisa diisi
    protected $fillable = [
        'nama_perusahaan', 'email_perusahaan', 'telepon', 'alamat',
        'visi', 'misi', 'npwp', 'website' // Tambahkan 'npwp' di sini
    ];
}
