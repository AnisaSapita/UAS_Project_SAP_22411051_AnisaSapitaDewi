<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Perusahaan; // Diperlukan jika Anda mengisi perusahaan_id untuk admin
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PenggunaController extends Controller
{
    /**
     * Menampilkan daftar pengguna dengan role 'admin'.
     */
    public function index()
    {
        // Hanya ambil pengguna dengan role 'admin'
        $penggunas = User::where('role', 'admin')->latest()->paginate(10);
        return view('superadmin.pengguna.index', compact('penggunas'));
    }

    /**
     * Menampilkan form untuk membuat admin baru.
     */
    public function create()
    {
        return view('superadmin.pengguna.create');
    }

    /**
     * Menyimpan admin baru.
     */
    public function store(Request $request)
    {
        // Ambil perusahaan pertama (dan satu-satunya)
        $perusahaan = Perusahaan::firstOrFail();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'jabatan' tidak divalidasi di sini karena admin tidak memiliki jabatan yang relevan
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'perusahaan_id' => $perusahaan->id, // Otomatis set ke satu-satunya perusahaan
            'role' => 'admin',
            // 'jabatan' tidak disimpan di sini untuk admin
        ]);

        return redirect()->route('superadmin.pengguna.index')
                         ->with('success', 'Pengguna admin baru berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data admin.
     */
    public function edit(User $pengguna)
    {
        return view('superadmin.pengguna.edit', compact('pengguna'));
    }

    /**
     * Memperbarui data admin.
     */
    public function update(Request $request, User $pengguna)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$pengguna->id],
            // 'jabatan' tidak divalidasi di sini
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        // $pengguna->jabatan = $request->jabatan; // Hapus baris ini, karena jabatan tidak relevan untuk admin

        if ($request->filled('password')) {
            $pengguna->password = Hash::make($request->password);
        }

        $pengguna->save();

        return redirect()->route('superadmin.pengguna.index')
                         ->with('success', 'Data admin berhasil diperbarui.');
    }

    /**
     * Menghapus akun admin.
     */
    public function destroy(User $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('superadmin.pengguna.index')
                         ->with('success', 'Pengguna admin berhasil dihapus.');
    }
}
