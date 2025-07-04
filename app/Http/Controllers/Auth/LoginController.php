<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan ini diimport

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Properti $redirectTo dikomentari karena kita menggunakan fungsi authenticated
     * untuk pengalihan dinamis berdasarkan role.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Fungsi ini akan dijalankan SECARA OTOMATIS setelah pengguna berhasil login.
     * Di sinilah kita menambahkan logika pengalihan berdasarkan role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // Periksa kolom 'role' dari pengguna yang login
        switch ($user->role) {
            case 'superadmin':
                // Jika role adalah superadmin, arahkan ke rute dashboard superadmin
                return redirect()->route('superadmin.dashboard');
            case 'admin':
                // Jika role adalah admin, arahkan ke rute dashboard admin
                return redirect()->route('admin.dashboard');
            case 'karyawan':
                // Jika role adalah karyawan, arahkan ke rute dashboard karyawan
                return redirect()->route('karyawan.dashboard');
            default:
                // Jika tidak ada role yang cocok, logout dan kembali ke halaman login
                Auth::logout();
                return redirect('/login')->with('error', 'Role pengguna tidak valid.');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
