<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     */
    protected $fillable = [
        'karyawan_id',
        'bulan_tahun',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji'
    ];

    /**
     * Casting tipe data atribut.
     */
    protected $casts = [
        'bulan_tahun' => 'date',
    ];

    /**
     * Relasi ke model Karyawan.
     * Data Gaji ini adalah milik satu Karyawan.
     */
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
