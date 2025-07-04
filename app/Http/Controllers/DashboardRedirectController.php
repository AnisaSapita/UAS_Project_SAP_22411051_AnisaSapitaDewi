<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DashboardRedirectController extends Controller
{
    /**
     * Arahkan pengguna ke dashboard yang benar berdasarkan peran mereka.
     */
    public function index(): RedirectResponse
    {
        $role = Auth::user()->role;

        switch ($role) {
            case 'superadmin':
                return redirect()->route('superadmin.dashboard');
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'karyawan':
                return redirect()->route('karyawan.dashboard');
            default:
                Auth::logout();
                return redirect('/login')->with('error', 'Peran Anda tidak valid.');
        }
    }
}
