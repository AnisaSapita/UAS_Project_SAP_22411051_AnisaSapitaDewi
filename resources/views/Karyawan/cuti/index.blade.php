@extends('layouts.app')

@section('title', 'Riwayat Pengajuan Cuti')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Riwayat Pengajuan Cuti Anda</h2>
            <p class="text-sm text-gray-500 mt-1">Lihat status semua pengajuan cuti yang telah Anda buat.</p>
        </div>
        {{-- PERUBAHAN: Mengganti kelas warna tombol --}}
        <a href="{{ route('karyawan.cuti.create') }}" class="inline-flex items-center px-4 py-2 bg-[#191970] border border-transparent rounded-md font-semibold text-sm text-white shadow-sm hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#191970] transition duration-150">
            Ajukan Cuti Baru
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            {{-- PERUBAHAN: Menyesuaikan warna header tabel --}}
            <thead class="bg-[#191970]/5">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Tanggal Mulai</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Tanggal Selesai</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-[#191970] uppercase tracking-wider">Alasan</th>
                    <th class="py-3 px-4 text-center text-sm font-semibold text-[#191970] uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($cutis as $cuti)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $cuti->tanggal_mulai->format('d M Y') }}</td>
                        <td class="py-3 px-4">{{ $cuti->tanggal_selesai->format('d M Y') }}</td>
                        <td class="py-3 px-4">{{ Str::limit($cuti->alasan, 60) }}</td>
                        <td class="py-3 px-4 text-center">
                            @if($cuti->status == 'disetujui')
                                <span class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Disetujui</span>
                            @elseif($cuti->status == 'ditolak')
                                <span class="px-3 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">Ditolak</span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">Diajukan</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-10 text-gray-500">Anda belum memiliki riwayat pengajuan cuti.</td>
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
