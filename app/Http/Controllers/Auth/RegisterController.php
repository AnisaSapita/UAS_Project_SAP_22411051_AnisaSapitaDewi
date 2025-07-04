<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\Perusahaan; // Pastikan model Perusahaan di-import
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; // Import Log facade untuk debugging

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/karyawan/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Menampilkan form registrasi.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Memvalidasi input dari form registrasi.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'alamat' => ['required', 'string', 'max:255'],
            'nomor_telepon' => ['required', 'string', 'max:20'],
            'jabatan' => ['required', 'string', 'max:255'], // Validasi jabatan
        ]);
    }

    /**
     * Membuat user dan data karyawan baru setelah validasi berhasil.
     */
    protected function create(array $data)
    {
        try {
            // Langkah 1: Buat data di tabel 'users'
            $user = User::create([
                'name' => $data['nama_lengkap'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'karyawan',
            ]);

            // Tentukan ID perusahaan tunggal di sini.
            $perusahaan = Perusahaan::first();
            if (!$perusahaan) {
                Log::error('Tidak ada perusahaan ditemukan di database saat registrasi karyawan.');
                throw new \Exception('Tidak ada perusahaan yang tersedia untuk registrasi karyawan.');
            }
            $singleCompanyId = $perusahaan->id;

            // Langkah 2: Buat data di tabel 'karyawans'
            Karyawan::create([
                'user_id' => $user->id,
                'perusahaan_id' => $singleCompanyId,
                'nama_lengkap' => $data['nama_lengkap'],
                'alamat' => $data['alamat'],
                'nomor_telepon' => $data['nomor_telepon'],
                'jabatan' => $data['jabatan'], // Menambahkan kolom jabatan
                'tanggal_bergabung' => now(), // Otomatis mengisi tanggal dan waktu saat ini
            ]);

            Log::info('Karyawan berhasil dibuat: ' . $user->email);
            return $user;

        } catch (\Exception $e) {
            Log::error('Gagal membuat karyawan: ' . $e->getMessage());
            throw $e;
        }
    }
}
