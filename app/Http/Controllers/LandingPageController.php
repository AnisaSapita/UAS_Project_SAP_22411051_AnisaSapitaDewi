<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil data perusahaan pertama (dan satu-satunya) dari database
        $perusahaan = Perusahaan::first();

        // Kirim data perusahaan tersebut ke view 'welcome'
        return view('welcome', compact('perusahaan'));
    }
}
