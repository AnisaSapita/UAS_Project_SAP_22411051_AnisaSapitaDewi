<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan ini diimport
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna sudah login dan rolenya adalah 'admin'.
        if (Auth::check() && Auth::user()->role == 'admin') {
            // Jika ya, izinkan akses.
            return $next($request);
        }

        // Jika tidak, tolak dan redirect.
        return redirect()->route('login')->with('error', 'Anda tidak memiliki hak akses Admin Perusahaan.');
    }
}
