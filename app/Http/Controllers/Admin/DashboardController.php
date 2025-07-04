<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Untuk menghitung total karyawan
use App\Models\Cuti; // Untuk menghitung total cuti
use App\Models\Gaji; // Import model Gaji untuk menghitung total gaji
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan user yang login

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil total karyawan (role 'karyawan')
        $totalKaryawan = User::where('role', 'karyawan')->count();

        // Ambil total cuti yang diajukan dan disetujui (untuk semua karyawan)
        $cutiDiajukan = Cuti::where('status', 'diajukan')->count();
        $cutiDisetujui = Cuti::where('status', 'disetujui')->count();

        // Ambil total pengeluaran gaji (asumsi ada tabel 'gajis' dengan kolom 'total_gaji')
        // PERBAIKAN: Mengubah 'jumlah_gaji' menjadi 'total_gaji' agar sesuai dengan skema database Anda
        $totalGaji = Gaji::sum('total_gaji'); // Menjumlahkan semua nilai di kolom 'total_gaji'

        // Lewatkan semua data ke view
        return view('admin.dashboard', compact('totalKaryawan', 'cutiDiajukan', 'cutiDisetujui', 'totalGaji'));
    }
}
