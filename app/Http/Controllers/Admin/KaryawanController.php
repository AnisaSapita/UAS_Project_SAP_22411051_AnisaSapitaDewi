<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class KaryawanController extends Controller
{
    /**
     * Menampilkan daftar karyawan di perusahaan admin.
     */
    public function index()
    {
        $perusahaanId = Auth::user()->perusahaan_id;
        $karyawans = Karyawan::where('perusahaan_id', $perusahaanId)->with('user')->latest()->paginate(10);
        return view('admin.karyawan.index', compact('karyawans'));
    }

    /**
     * PERUBAHAN: Metode create() dan store() DIHAPUS.
     * Admin tidak lagi membuat akun karyawan. Karyawan mendaftar sendiri.
     * Tugas admin adalah mengedit data karyawan yang sudah terdaftar.
     */

    /**
     * Menampilkan form untuk mengedit data karyawan.
     */
    public function edit(Karyawan $karyawan)
    {
        // Pemeriksaan keamanan untuk memastikan admin hanya bisa mengedit karyawan di perusahaannya.
        if ($karyawan->perusahaan_id != Auth::user()->perusahaan_id) {
            abort(403, 'Akses Ditolak.');
        }
        return view('admin.karyawan.edit', compact('karyawan'));
    }

    /**
     * PERUBAHAN: Memperbarui HANYA jabatan karyawan.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        // Pemeriksaan keamanan
        if ($karyawan->perusahaan_id != Auth::user()->perusahaan_id) {
            abort(403, 'Akses Ditolak.');
        }

        // Validasi hanya untuk field 'jabatan'
        $request->validate([
            'jabatan' => ['required', 'string', 'max:255'],
        ]);

        // Langsung update jabatan di model Karyawan
        $karyawan->update([
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('admin.karyawan.index')
                         ->with('success', 'Jabatan karyawan berhasil diperbarui.');
    }

    /**
     * Menghapus data karyawan.
     */
    public function destroy(Karyawan $karyawan)
    {
        if ($karyawan->perusahaan_id != Auth::user()->perusahaan_id) {
            abort(403);
        }

        $karyawan->user->delete();

        return redirect()->route('admin.karyawan.index')
                         ->with('success', 'Data karyawan berhasil dihapus.');
    }
}
