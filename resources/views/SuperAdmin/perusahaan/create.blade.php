@extends('layouts.app')

@section('title', 'Tambah Perusahaan Baru')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <form action="{{ route('superadmin.perusahaan.store') }}" method="POST">
        @csrf
        <div class="space-y-4">
            <div>
                <label for="nama_perusahaan" class="block font-medium text-sm text-gray-700">Nama Perusahaan</label>
                <input type="text" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                @error('nama_perusahaan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- INPUT FIELD BARU UNTUK EMAIL PERUSAHAAN --}}
            <div>
                <label for="email_perusahaan" class="block font-medium text-sm text-gray-700">Email Perusahaan</label>
                <input type="email" id="email_perusahaan" name="email_perusahaan" value="{{ old('email_perusahaan') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                @error('email_perusahaan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="alamat" class="block font-medium text-sm text-gray-700">Alamat</label>
                <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ old('alamat') }}</textarea>
                @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="telepon" class="block font-medium text-sm text-gray-700">Nomor Telepon</label>
                <input type="text" id="telepon" name="telepon" value="{{ old('telepon') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                @error('telepon') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mt-6">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Simpan</button>
            <a href="{{ route('superadmin.perusahaan.index') }}" class="ml-2 text-gray-600">Batal</a>
        </div>
    </form>
</div>
@endsection
