<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan; // Pastikan model Perusahaan di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import Validator
use Illuminate\Support\Facades\Log; // Import Log facade untuk debugging

class PerusahaanController extends Controller
{
    /**
     * Menampilkan formulir untuk mengedit profil perusahaan.
     */
    public function edit()
    {
        // Ambil data perusahaan pertama (asumsi hanya ada satu perusahaan)
        // firstOrFail() akan otomatis menampilkan 404 jika tidak ditemukan,
        // yang membantu debugging jika tidak ada data perusahaan.
        try {
            $perusahaan = Perusahaan::firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Tidak ada data perusahaan ditemukan saat mengakses profil perusahaan SuperAdmin.');
            // Jika tidak ada perusahaan, Anda bisa mengalihkan ke halaman pembuatan perusahaan
            // atau menampilkan pesan error yang ramah pengguna.
            return redirect()->route('superadmin.dashboard')->with('error', 'Data perusahaan belum diatur. Silakan tambahkan data perusahaan terlebih dahulu.');
        }


        return view('superadmin.perusahaan.edit', compact('perusahaan'));
    }

    /**
     * Memperbarui profil perusahaan di database.
     */
    public function update(Request $request)
    {
        $perusahaan = Perusahaan::firstOrFail(); // Ambil data perusahaan yang akan diperbarui

        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => ['required', 'string', 'max:255'],
            'email_perusahaan' => ['required', 'string', 'email', 'max:255'],
            'telepon' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
            'visi' => ['nullable', 'string'],
            'misi' => ['nullable', 'string'],
            'npwp' => ['nullable', 'string', 'max:20'], // Tambahkan validasi untuk NPWP
            'website' => ['nullable', 'url', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Perbarui data perusahaan
        $perusahaan->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'email_perusahaan' => $request->email_perusahaan,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'npwp' => $request->npwp, // Simpan nilai NPWP
            'website' => $request->website,
        ]);

        return redirect()->route('superadmin.perusahaan.edit')->with('status', 'Profil perusahaan berhasil diperbarui!');
    }
}
