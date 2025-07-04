{{-- resources/views/Karyawan/dashboard.blade.php --}}

@extends('layouts.app')

@section('title', 'Dashboard Karyawan')

@section('content')
    {{-- Header Sambutan --}}
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Halo, {{ Auth::user()->name }}!</h2>
        <p class="text-md text-gray-500 mt-1">Selamat datang di dashboard pribadi Anda.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Kolom Kiri: Informasi & Aksi --}}
        <div class="lg:col-span-2 space-y-8">

            <!-- Kartu Statistik Cuti -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Cuti Diajukan -->
                <div class="bg-white p-5 rounded-xl shadow-md flex items-center gap-4">
                    <div class="flex-shrink-0 h-12 w-12 rounded-full bg-yellow-500/10 flex items-center justify-center">
                        <svg class="h-6 w-6 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Cuti Diajukan</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $cutiDiajukan ?? 0 }}</p>
                    </div>
                </div>

                <!-- Cuti Disetujui -->
                <div class="bg-white p-5 rounded-xl shadow-md flex items-center gap-4">
                    <div class="flex-shrink-0 h-12 w-12 rounded-full bg-green-600/10 flex items-center justify-center">
                        <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Cuti Disetujui</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $cutiDisetujui ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <!-- Kartu Aksi Cepat -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Aksi Cepat</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <a href="{{ route('karyawan.gaji.index') }}" class="group flex items-center p-4 bg-gray-50 rounded-lg hover:bg-[#191970] hover:text-white transition-colors duration-200">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-[#191970]/20 flex items-center justify-center group-hover:bg-white/20">
                            <svg class="h-5 w-5 text-[#191970] group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        </div>
                        <span class="ml-4 text-sm font-semibold text-gray-700 group-hover:text-white">Lihat Riwayat Gaji</span>
                    </a>
                    <a href="{{ route('karyawan.cuti.create') }}" class="group flex items-center p-4 bg-gray-50 rounded-lg hover:bg-[#191970] hover:text-white transition-colors duration-200">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-[#191970]/20 flex items-center justify-center group-hover:bg-white/20">
                           <svg class="h-5 w-5 text-[#191970] group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                        </div>
                        <span class="ml-4 text-sm font-semibold text-gray-700 group-hover:text-white">Ajukan Cuti Baru</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Informasi Pribadi --}}
        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-xl shadow-lg space-y-4">
                <div class="flex items-center gap-4 pb-4 border-b">
                    <div class="flex-shrink-0 h-12 w-12 rounded-full bg-[#191970]/10 flex items-center justify-center">
                        <svg class="h-6 w-6 text-[#191970]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ $karyawan->nama_lengkap }}</h3>
                        <p class="text-sm text-gray-500">{{ $karyawan->jabatan }}</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm text-gray-600">
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Telepon:</strong> {{ $karyawan->nomor_telepon }}</p>
                    <p><strong>Alamat:</strong> {{ $karyawan->alamat }}</p>
                    <p><strong>Bergabung Sejak:</strong> {{ $karyawan->tanggal_bergabung->format('d F Y') }}</p>
                </div>
                 <div class="pt-4 border-t">
                    <a href="{{ route('profile.edit') }}" class="text-sm font-semibold text-[#191970] hover:underline">Edit Profil & Password &rarr;</a>
                </div>
            </div>
        </div>
    </div>
@endsection
