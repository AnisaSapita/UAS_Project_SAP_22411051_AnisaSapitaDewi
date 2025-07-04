<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Cuti;
use App\Models\Karyawan as KaryawanModel; // Alias untuk menghindari konflik nama kelas
use Illuminate\Support\Facades\Log; // Pastikan ini diimport jika digunakan

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Dapatkan pengguna yang sedang login

        // Pastikan pengguna memiliki relasi 'karyawan' yang terisi
        $karyawan = $user->karyawan;

        if (!$karyawan) {
            // Jika data karyawan tidak ditemukan, log error dan alihkan ke halaman home
            Log::error('Data karyawan tidak ditemukan untuk user ID: ' . ($user ? $user->id : 'null'));
            return redirect('/')->with('error', 'Data karyawan Anda tidak lengkap. Silakan hubungi administrator.');
        }

        // Ambil statistik cuti HANYA untuk karyawan yang sedang login
        $cutiDiajukan = Cuti::where('karyawan_id', $karyawan->id)
                            ->where('status', 'diajukan')
                            ->count();
        $cutiDisetujui = Cuti::where('karyawan_id', $karyawan->id)
                             ->where('status', 'disetujui')
                             ->count();

        // Lewatkan hanya data yang relevan untuk karyawan ke view
        return view('karyawan.dashboard', compact('karyawan', 'cutiDiajukan', 'cutiDisetujui'));
    }
}
