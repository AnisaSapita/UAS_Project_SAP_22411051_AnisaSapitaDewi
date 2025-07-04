<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'perusahaan_id',
        'nama_lengkap',
        'alamat',
        'nomor_telepon',
        'jabatan',
        'tanggal_bergabung',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_bergabung' => 'date', // Gunakan 'date' jika kolom di DB adalah DATE
        // Atau 'tanggal_bergabung' => 'datetime', jika kolom di DB adalah DATETIME atau TIMESTAMP
    ];

    /**
     * Relasi dengan model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan model Perusahaan.
     */
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
