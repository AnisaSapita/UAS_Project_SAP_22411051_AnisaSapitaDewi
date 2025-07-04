@extends('layouts.app')

{{-- SET JUDUL HALAMAN --}}
@section('title', 'Dashboard')

{{-- KONTEN UTAMA HALAMAN --}}
@section('content')
<div class="space-y-8">

    {{-- HEADER & TOMBOL TAMBAH ADMIN --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Halo Super Admin!</h1>
            <p class="mt-1 text-gray-500">Selamat datang kembali</p>
        </div>
        <div class="mt-4 sm:mt-0 flex-shrink-0">
            {{-- TOMBOL TAMBAH PENGGUNA --}}
            <a href="{{ route('superadmin.pengguna.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#191970] hover:bg-opacity-90 transition-colors">
                + Tambah Pengguna Admin
            </a>
        </div>
    </div>

    {{-- GRID UTAMA (2 KOLOM BESAR & 1 KOLOM KANAN) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- KOLOM KIRI: Statistik & Daftar Admin --}}
        <div class="lg:col-span-2 space-y-8">

            {{-- KARTU TOTAL ADMIN --}}
            <div class="grid grid-cols-1">
                <div class="bg-[#191970] text-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-start justify-between">
                        <div class="flex flex-col">
                            <span class="text-lg font-semibold">Total Pengguna Admin</span>
                            <span class="text-4xl font-bold mt-2">{{ $totalAdmin }}</span>
                        </div>
                        <div class="bg-white/10 p-3 rounded-full">
                            {{-- ICON --}}
                            <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- TABEL ADMIN TERBARU --}}
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Admin Baru Ditambahkan</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-[#191970]/5">
                            <tr>
                                <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Nama</th>
                                <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Email</th>
                                <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Tanggal Dibuat</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            {{-- JIKA DATA ADA --}}
                            @forelse ($adminTerbaru as $admin)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 font-medium text-gray-900">{{ $admin->name }}</td>
                                    <td class="py-3 px-4 text-gray-600">{{ $admin->email }}</td>
                                    <td class="py-3 px-4 text-gray-600">{{ $admin->created_at->format('d F Y') }}</td>
                                </tr>
                            {{-- JIKA DATA KOSONG --}}
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-10 text-gray-500">
                                        <div class="flex flex-col items-center">
                                            <svg class="h-12 w-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-1a6 6 0 00-5.176-5.97m8.352 5.97l-3.265-3.265A6.002 6.002 0 0012 9.5a6 6 0 10-6 6" />
                                            </svg>
                                            <p class="mt-2">Belum ada admin baru.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: Shortcut Card --}}
        <div class="lg:col-span-1">
            <div class="space-y-8">

                {{-- KARTU PROFIL PERUSAHAAN --}}
                <a href="{{ route('superadmin.perusahaan.edit') }}" class="group block bg-white p-6 rounded-xl shadow-lg h-full hover:bg-gray-50 transition-colors">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Profil Perusahaan</h3>
                    <p class="text-sm text-gray-500 mb-4">Klik untuk mengedit detail, visi, misi, dan informasi legal perusahaan.</p>
                    <div class="mt-4 border-t border-gray-200 pt-4">
                        <div class="flex items-center gap-4">
                            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-[#191970]/10 flex items-center justify-center">
                                {{-- ICON --}}
                                <svg class="h-6 w-6 text-[#191970]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ \App\Models\Perusahaan::first()->nama_perusahaan ?? 'Nama Perusahaan' }}</p>
                                <p class="text-sm text-[#191970] font-semibold truncate">Lihat & Edit Detail <span class="inline-block transition-transform duration-200 group-hover:translate-x-1">&rarr;</span></p>
                            </div>
                        </div>
                    </div>
                </a>

                {{-- KARTU MANAJEMEN AKSES --}}
                <a href="{{ route('superadmin.pengguna.index') }}" class="group block bg-white p-6 rounded-xl shadow-lg h-full hover:bg-gray-50 transition-colors">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Manajemen Akses</h3>
                    <p class="text-sm text-gray-500 mb-4">Klik untuk menambah atau mengelola akun pengguna dengan hak akses admin.</p>
                    <div class="mt-4 border-t border-gray-200 pt-4">
                        <div class="flex items-center gap-4">
                            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-[#191970]/10 flex items-center justify-center">
                                {{-- ICON --}}
                                <svg class="h-6 w-6 text-[#191970]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">Kelola Pengguna Admin</p>
                                <p class="text-sm text-[#191970] font-semibold truncate">Buka Manajemen <span class="inline-block transition-transform duration-200 group-hover:translate-x-1">&rarr;</span></p>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        </div>

    </div>
</div>
@endsection
