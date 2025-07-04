{{-- resources/views/profile/edit.blade.php --}}

@extends('layouts.app') {{-- Pastikan ini menggunakan layout yang benar --}}

@section('title', 'Profil Saya') {{-- Menentukan judul halaman --}}

@section('content') {{-- Menentukan bagian konten utama --}}
    <h2 class="text-2xl font-bold text-gray-900 mb-3">Profil Saya</h2>
    <p class="text-md text-gray-700 mb-8">Kelola informasi profil dan kata sandi Anda.</p>

    <div class="space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
