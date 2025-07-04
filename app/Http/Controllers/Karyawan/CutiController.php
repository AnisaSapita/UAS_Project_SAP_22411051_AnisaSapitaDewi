<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    public function index()
    {
        // Ambil ID karyawan dari user yang login
        $karyawanId = Auth::user()->karyawan->id;
        // Tampilkan hanya daftar cuti milik karyawan tersebut
        $cutis = Cuti::where('karyawan_id', $karyawanId)->latest()->paginate(10);

        return view('karyawan.cuti.index', compact('cutis'));
    }

    public function create()
    {
        return view('karyawan.cuti.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
        ]);

        $karyawanId = Auth::user()->karyawan->id;

        Cuti::create([
            'karyawan_id' => $karyawanId,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan' => $request->alasan,
            'status' => 'diajukan', // Status default saat pengajuan
        ]);

        return redirect()->route('karyawan.cuti.index')->with('success', 'Pengajuan cuti berhasil dikirim.');
    }
}
