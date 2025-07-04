@extends('layouts.app')

@section('title', 'Form Pengajuan Cuti')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    {{-- Header Halaman --}}
    <div class="mb-6 pb-4 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-800">Buat Pengajuan Cuti Baru</h2>
        <p class="text-sm text-gray-500 mt-1">Isi formulir di bawah ini untuk mengajukan permohonan cuti.</p>
    </div>

    <form action="{{ route('karyawan.cuti.store') }}" method="POST">
        @csrf
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="tanggal_mulai" class="block font-medium text-sm text-gray-700">Tanggal Mulai Cuti</label>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>
                <div>
                    <label for="tanggal_selesai" class="block font-medium text-sm text-gray-700">Tanggal Selesai Cuti</label>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>
            </div>
            <div>
                <label for="alasan" class="block font-medium text-sm text-gray-700">Alasan Cuti</label>
                <textarea id="alasan" name="alasan" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required placeholder="Jelaskan alasan Anda mengajukan cuti..."></textarea>
            </div>
        </div>
        <div class="mt-8 pt-5 border-t border-gray-200 flex items-center gap-4">
            {{-- PERUBAHAN: Mengganti kelas warna tombol --}}
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#191970] border border-transparent rounded-md font-semibold text-sm text-white shadow-sm hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#191970] transition duration-150">
                Kirim Pengajuan
            </button>
            <a href="{{ route('karyawan.cuti.index') }}" class="text-gray-600 hover:text-gray-800">Batal</a>
        </div>
    </form>
</div>
@endsection
