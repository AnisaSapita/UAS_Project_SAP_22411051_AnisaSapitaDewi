<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // Cek apakah pengguna sudah login
            if (Auth::guard($guard)->check()) {
                // Jika sudah login, tentukan redirect berdasarkan role
                $user = Auth::user();
                switch ($user->role) {
                    case 'superadmin':
                        return redirect()->route('superadmin.dashboard');
                        // break; // 'break' tidak diperlukan setelah 'return'
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                        // break;
                    case 'karyawan':
                        return redirect()->route('karyawan.dashboard');
                        // break;
                    default:
                        // Fallback jika role tidak terdefinisi
                        return redirect(RouteServiceProvider::HOME);
                        // break;
                }
            }
        }

        // Jika belum login, lanjutkan ke halaman yang dituju (misal: halaman login)
        return $next($request);
    }
}
