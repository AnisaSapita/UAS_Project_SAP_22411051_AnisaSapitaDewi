{{-- resources/views/Admin/dashboard.blade.php --}}

@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    {{-- Header Sambutan --}}
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Halo, {{ Auth::user()->name }}!</h2>
        <p class="text-md text-gray-500 mt-1">Selamat datang di dashboard admin. Kelola operasional perusahaan dengan mudah.</p>
    </div>

    {{-- Kartu Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <!-- Card Total Karyawan -->
        <div class="bg-white p-5 rounded-xl shadow-md flex items-center gap-4">
            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-[#191970]/10 flex items-center justify-center">
                <svg class="h-6 w-6 text-[#191970]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-500">Total Karyawan</p>
                <p class="text-2xl font-bold text-gray-800 truncate">{{ $totalKaryawan ?? 0 }}</p>
            </div>
        </div>

        <!-- Card Cuti Diajukan -->
        <div class="bg-white p-5 rounded-xl shadow-md flex items-center gap-4">
            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-yellow-500/10 flex items-center justify-center">
                <svg class="h-6 w-6 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-500">Cuti Diajukan</p>
                <p class="text-2xl font-bold text-gray-800 truncate">{{ $cutiDiajukan ?? 0 }}</p>
            </div>
        </div>

        <!-- Card Cuti Disetujui -->
        <div class="bg-white p-5 rounded-xl shadow-md flex items-center gap-4">
            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-green-600/10 flex items-center justify-center">
                <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-500">Cuti Disetujui</p>
                <p class="text-2xl font-bold text-gray-800 truncate">{{ $cutiDisetujui ?? 0 }}</p>
            </div>
        </div>

        <!-- Card Pengeluaran Gaji -->
        <div class="bg-white p-5 rounded-xl shadow-md flex items-center gap-4">
            <div class="flex-shrink-0 h-12 w-12 rounded-full bg-red-600/10 flex items-center justify-center">
                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-500">Pengeluaran Gaji</p>
                @php
                    $gaji = $totalGaji ?? 0;
                    $formattedGaji = 'Rp ' . number_format($gaji, 0, ',', '.');
                    if ($gaji >= 1000000) {
                        // Format ke jutaan dengan 1 angka desimal jika perlu
                        $formattedGaji = 'Rp ' . rtrim(rtrim(number_format($gaji / 1000000, 1, ',', '.'), '0'), ',') . ' Jt';
                    } elseif ($gaji >= 1000) {
                        $formattedGaji = 'Rp ' . number_format($gaji / 1000, 0, ',', '.') . ' Rb';
                    }
                @endphp
                {{-- PERUBAHAN: Ukuran teks dikecilkan dan format angka diubah --}}
                <p class="text-xl font-bold text-gray-800 truncate">{{ $formattedGaji }}</p>
            </div>
        </div>
    </div>

    <!-- Bagian Aksi Cepat -->
    <div class="bg-white p-6 rounded-xl shadow-lg">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Aksi Cepat</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

            <a href="{{ route('admin.karyawan.index') }}" class="group flex items-center p-4 bg-gray-50 rounded-lg hover:bg-[#191970] hover:text-white transition-colors duration-200">
                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-[#191970]/20 flex items-center justify-center group-hover:bg-white/20">
                    <svg class="h-5 w-5 text-[#191970] group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                </div>
                <span class="ml-4 text-sm font-semibold text-gray-700 group-hover:text-white">Kelola Karyawan</span>
            </a>

            <a href="{{ route('admin.gaji.index') }}" class="group flex items-center p-4 bg-gray-50 rounded-lg hover:bg-[#191970] hover:text-white transition-colors duration-200">
                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-[#191970]/20 flex items-center justify-center group-hover:bg-white/20">
                    <svg class="h-5 w-5 text-[#191970] group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                </div>
                <span class="ml-4 text-sm font-semibold text-gray-700 group-hover:text-white">Kelola Gaji</span>
            </a>

            <a href="{{ route('admin.cuti.index') }}" class="group flex items-center p-4 bg-gray-50 rounded-lg hover:bg-[#191970] hover:text-white transition-colors duration-200">
                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-[#191970]/20 flex items-center justify-center group-hover:bg-white/20">
                    <svg class="h-5 w-5 text-[#191970] group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                </div>
                <span class="ml-4 text-sm font-semibold text-gray-700 group-hover:text-white">Kelola Cuti</span>
            </a>

        </div>
    </div>
@endsection
