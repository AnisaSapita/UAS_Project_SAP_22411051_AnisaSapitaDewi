{{-- resources/views/superadmin/perusahaan/edit.blade.php --}}

@extends('layouts.app')
{{-- Menggunakan layout master app.blade.php sebagai template dasar --}}

@section('title', 'Pengaturan Profil Perusahaan')
{{-- Set judul halaman di browser tab dan di dalam layout jika dipanggil --}}

@section('content')
{{-- Mulai bagian konten utama halaman --}}

    {{-- Judul halaman --}}
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Perbarui Detail Perusahaan</h2>
    <p class="text-gray-600 mb-8">Perbarui detail, visi, dan misi perusahaan Anda di sini.</p>

    {{-- Pesan status sukses --}}
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('status') }}</span>
        </div>
    @endif

    {{-- Pesan error --}}
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    {{-- FORM EDIT PERUSAHAAN --}}
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <form method="POST" action="{{ route('superadmin.perusahaan.update') }}">
            @csrf
            @method('PATCH')
            {{-- Gunakan metode PATCH untuk update data --}}

            {{-- INPUT DATA 2 KOLOM --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Perusahaan --}}
                <div>
                    <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700">Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                           value="{{ old('nama_perusahaan', $perusahaan->nama_perusahaan) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    @error('nama_perusahaan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email Resmi --}}
                <div>
                    <label for="email_perusahaan" class="block text-sm font-medium text-gray-700">Email Resmi</label>
                    <input type="email" name="email_perusahaan" id="email_perusahaan"
                           value="{{ old('email_perusahaan', $perusahaan->email_perusahaan) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    @error('email_perusahaan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Telepon --}}
                <div>
                    <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                    <input type="text" name="telepon" id="telepon"
                           value="{{ old('telepon', $perusahaan->telepon) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    @error('telepon')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Website --}}
                <div>
                    <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                    <input type="url" name="website" id="website"
                           value="{{ old('website', $perusahaan->website) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('website')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- NPWP --}}
                <div>
                    <label for="npwp" class="block text-sm font-medium text-gray-700">NPWP</label>
                    <input type="text" name="npwp" id="npwp"
                           value="{{ old('npwp', $perusahaan->npwp) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('npwp')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Alamat Kantor Pusat --}}
            <div class="mt-6">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Kantor Pusat</label>
                <textarea name="alamat" id="alamat" rows="3"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('alamat', $perusahaan->alamat) }}</textarea>
                @error('alamat')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Visi & Misi --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                {{-- Visi --}}
                <div>
                    <label for="visi" class="block text-sm font-medium text-gray-700">Visi Perusahaan</label>
                    <textarea name="visi" id="visi" rows="3"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('visi', $perusahaan->visi) }}</textarea>
                    @error('visi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Misi --}}
                <div>
                    <label for="misi" class="block text-sm font-medium text-gray-700">Misi Perusahaan</label>
                    <textarea name="misi" id="misi" rows="3"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('misi', $perusahaan->misi) }}</textarea>
                    @error('misi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Tombol Submit --}}
            <div class="mt-6 flex justify-end">
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-[#191970] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#191970] disabled:opacity-25 transition ease-in-out duration-150">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

@endsection
