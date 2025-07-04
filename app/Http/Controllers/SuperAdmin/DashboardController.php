<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard untuk SuperAdmin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Menghitung total semua pengguna dengan role 'admin'
        $totalAdmin = User::where('role', 'admin')->count();

        // Mengambil 5 pengguna admin yang baru saja ditambahkan
        $adminTerbaru = User::where('role', 'admin')->latest()->take(5)->get();

        // Mengirim data yang relevan ke view
        return view('superadmin.dashboard', compact('totalAdmin', 'adminTerbaru'));
    }
}
