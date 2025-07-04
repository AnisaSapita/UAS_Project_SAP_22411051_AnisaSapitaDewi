@extends('layouts.app')

@section('title', 'Riwayat Gaji Anda')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Riwayat Gaji Anda</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-4 text-left">Periode</th>
                    <th class="py-3 px-4 text-right">Gaji Pokok</th>
                    <th class="py-3 px-4 text-right">Tunjangan</th>
                    <th class="py-3 px-4 text-right">Potongan</th>
                    <th class="py-3 px-4 text-right font-bold">Total Diterima</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($gajis as $gaji)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $gaji->bulan_tahun->format('F Y') }}</td>
                        <td class="py-3 px-4 text-right">Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
                        <td class="py-3 px-4 text-right">Rp {{ number_format($gaji->tunjangan, 0, ',', '.') }}</td>
                        <td class="py-3 px-4 text-right text-red-600">- Rp {{ number_format($gaji->potongan, 0, ',', '.') }}</td>
                        <td class="py-3 px-4 text-right font-bold">Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Belum ada riwayat data gaji untuk Anda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $gajis->links() }}
    </div>
</div>
@endsection
