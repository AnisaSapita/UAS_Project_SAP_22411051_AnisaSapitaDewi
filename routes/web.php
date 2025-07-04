<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// Mengimpor semua Controller
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController; // Pastikan ini diimport
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboard;
use App\Http\Controllers\SuperAdmin\PerusahaanController as SuperAdminPerusahaan;
use App\Http\Controllers\SuperAdmin\PenggunaController as SuperAdminPengguna;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\KaryawanController as AdminKaryawan;
use App\Http\Controllers\Admin\GajiController as AdminGaji;
use App\Http\Controllers\Admin\CutiController as AdminCuti;
use App\Http\Controllers\Karyawan\DashboardController as KaryawanDashboard;
use App\Http\Controllers\Karyawan\GajiController as KaryawanGaji;
use App\Http\Controllers\Karyawan\CutiController as KaryawanCuti;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- RUTE PUBLIK ---
Route::get('/', [LandingPageController::class, 'index'])->name('welcome');


// --- RUTE AUTENTIKASI ---
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

// Rute logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// --- RUTE CATCH-ALL UNTUK /dashboard ---
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user) {
            switch ($user->role) {
                case 'superadmin':
                    return redirect()->route('superadmin.dashboard');
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'karyawan':
                    return redirect()->route('karyawan.dashboard');
                default:
                    Auth::logout();
                    return redirect('/')->with('error', 'Role pengguna tidak valid.');
            }
        }
        return redirect()->route('login');
    })->name('dashboard');
});


// --- GRUP RUTE UNTUK SUPERADMIN ---
Route::middleware(['auth', 'superadmin'])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('dashboard', [SuperAdminDashboard::class, 'index'])->name('dashboard');
    Route::get('profil-perusahaan', [SuperAdminPerusahaan::class, 'edit'])->name('perusahaan.edit');
    Route::patch('profil-perusahaan', [SuperAdminPerusahaan::class, 'update'])->name('perusahaan.update');
    Route::resource('pengguna', SuperAdminPengguna::class);
});


// --- GRUP RUTE UNTUK ADMIN PERUSAHAAN ---
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::resource('karyawan', AdminKaryawan::class);
    Route::resource('gaji', AdminGaji::class);
    Route::resource('cuti', AdminCuti::class)->only(['index', 'edit', 'update']);
});


// --- GRUP RUTE UNTUK KARYAWAN ---
Route::middleware(['auth', 'karyawan'])->prefix('karyawan')->name('karyawan.')->group(function () {
    Route::get('dashboard', [KaryawanDashboard::class, 'index'])->name('dashboard');
    Route::get('gaji', [KaryawanGaji::class, 'index'])->name('gaji.index');
    Route::resource('cuti', KaryawanCuti::class)->only(['index', 'create', 'store']);
});


// --- RUTE PROFIL PENGGUNA ---
// Pastikan rute ini ada dan mengarah ke ProfileController
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update'); // Rute untuk update password
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Rute untuk delete user
});
