@extends('layouts.app')

@section('title', 'Manajemen Pengajuan Cuti')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4">Daftar Pengajuan Cuti</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 text-left">Nama Karyawan</th>
                    <th class="py-2 px-4 text-left">Tanggal Mulai</th>
                    <th class="py-2 px-4 text-left">Tanggal Selesai</th>
                    <th class="py-2 px-4 text-left">Status</th>
                    <th class="py-2 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cutis as $cuti)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $cuti->karyawan->nama_lengkap }}</td>
                        <td class="py-2 px-4">{{ $cuti->tanggal_mulai->format('d M Y') }}</td>
                        <td class="py-2 px-4">{{ $cuti->tanggal_selesai->format('d M Y') }}</td>
                        <td class="py-2 px-4">
                            @if($cuti->status == 'disetujui')
                                <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Disetujui</span>
                            @elseif($cuti->status == 'ditolak')
                                <span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-200 rounded-full">Ditolak</span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full">Diajukan</span>
                            @endif
                        </td>
                        <td class="py-2 px-4">
                            <a href="{{ route('admin.cuti.edit', $cuti->id) }}" class="text-blue-500 hover:text-blue-700">Proses</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Tidak ada pengajuan cuti.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $cutis->links() }}
    </div>
</div>
@endsection
