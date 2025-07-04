<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\Gaji;
use Illuminate\Support\Facades\Auth;

class GajiController extends Controller
{
    /**
     * Menampilkan riwayat gaji hanya untuk karyawan yang login.
     */
    public function index()
    {
        $karyawanId = Auth::user()->karyawan->id;
        $gajis = Gaji::where('karyawan_id', $karyawanId)->latest()->paginate(10);

        return view('karyawan.gaji.index', compact('gajis'));
    }
}
