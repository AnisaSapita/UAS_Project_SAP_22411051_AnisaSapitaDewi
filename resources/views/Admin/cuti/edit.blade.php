@extends('layouts.app')

@section('title', 'Proses Pengajuan Cuti')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="mb-6 pb-4 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-800">Proses Pengajuan Cuti</h2>
        <p class="text-sm text-gray-500 mt-1">Tinjau dan ubah status pengajuan cuti dari karyawan.</p>
    </div>

    <div class="space-y-4 mb-6">
        <p><strong>Nama Karyawan:</strong> {{ $cuti->karyawan->nama_lengkap }}</p>
        <p><strong>Tanggal Cuti:</strong> {{ $cuti->tanggal_mulai->format('d M Y') }} - {{ $cuti->tanggal_selesai->format('d M Y') }}</p>
        <p><strong>Alasan:</strong></p>
        <p class="p-4 bg-gray-50 rounded-md border">{{ $cuti->alasan }}</p>
    </div>

    <form action="{{ route('admin.cuti.update', $cuti->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="border-t pt-6">
            <label for="status" class="block font-medium text-sm text-gray-700 mb-2">Ubah Status Pengajuan</label>
            <select id="status" name="status" class="block w-full md:w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                <option value="disetujui" {{ $cuti->status == 'disetujui' ? 'selected' : '' }}>Setujui</option>
                <option value="ditolak" {{ $cuti->status == 'ditolak' ? 'selected' : '' }}>Tolak</option>
                <option value="diajukan" {{ $cuti->status == 'diajukan' ? 'selected' : '' }}>Kembalikan ke Diajukan</option>
            </select>
        </div>
        <div class="mt-6 flex items-center gap-4">
            {{-- PERUBAHAN: Mengganti kelas warna tombol --}}
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#191970] border border-transparent rounded-md font-semibold text-sm text-white shadow-sm hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#191970] transition duration-150">
                Simpan Status
            </button>
            <a href="{{ route('admin.cuti.index') }}" class="text-gray-600 hover:text-gray-800">Kembali</a>
        </div>
    </form>
</div>
@endsection
