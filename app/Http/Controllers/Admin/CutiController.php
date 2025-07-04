<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    public function index()
    {
        $perusahaanId = Auth::user()->perusahaan_id;
        $cutis = Cuti::whereHas('karyawan', function($q) use ($perusahaanId) {
            $q->where('perusahaan_id', $perusahaanId);
        })->with('karyawan')->latest()->paginate(10);

        return view('admin.cuti.index', compact('cutis'));
    }

    public function edit(Cuti $cuti)
    {
        // Pastikan cuti yang diakses milik karyawan di perusahaan admin
        if ($cuti->karyawan->perusahaan_id != Auth::user()->perusahaan_id) {
            abort(403);
        }
        return view('admin.cuti.edit', compact('cuti'));
    }

    public function update(Request $request, Cuti $cuti)
    {
        if ($cuti->karyawan->perusahaan_id != Auth::user()->perusahaan_id) {
            abort(403);
        }

        $request->validate(['status' => 'required|in:disetujui,ditolak']);

        $cuti->update(['status' => $request->status]);

        return redirect()->route('admin.cuti.index')->with('success', 'Status cuti berhasil diperbarui.');
    }
}
