<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Cek apakah pengguna sudah login.
        // 2. Cek apakah role pengguna adalah 'superadmin'.
        if (Auth::check() && Auth::user()->role == 'superadmin') {
            // Jika kedua syarat terpenuhi, izinkan akses ke halaman.
            return $next($request);
        }

        // Jika tidak, redirect ke halaman login dengan pesan error.
        return redirect()->route('login')->with('error', 'Anda tidak memiliki hak akses Super Admin.');
    }
}
