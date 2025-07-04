<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gaji;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GajiController extends Controller
{
    public function index()
    {
        $perusahaanId = Auth::user()->perusahaan_id;
        $gajis = Gaji::whereHas('karyawan', function($q) use ($perusahaanId) {
            $q->where('perusahaan_id', $perusahaanId);
        })->with('karyawan')->latest()->paginate(10);

        return view('admin.gaji.index', compact('gajis'));
    }

    public function create()
    {
        // Ambil hanya karyawan dari perusahaan admin yang login
        $karyawans = Karyawan::where('perusahaan_id', Auth::user()->perusahaan_id)->get();
        return view('admin.gaji.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'bulan_tahun' => 'required|date',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $karyawan = Karyawan::find($request->karyawan_id);
        if($karyawan->perusahaan_id != Auth::user()->perusahaan_id) {
            abort(403, 'Akses Ditolak');
        }

        $total_gaji = ($request->gaji_pokok + $request->tunjangan) - $request->potongan;

        Gaji::create(array_merge($request->all(), ['total_gaji' => $total_gaji]));

        return redirect()->route('admin.gaji.index')->with('success', 'Data gaji berhasil ditambahkan.');
    }

    // Untuk edit, update, dan destroy akan mengikuti pola yang sama dengan validasi kepemilikan.
}
