@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

        <!-- Statistik Ringkas -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow p-5 flex items-center gap-4">
                <div class="bg-indigo-100 p-3 rounded-full">
                    <i class="ph ph-newspaper text-indigo-600 text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-sm text-gray-500">Total Berita</h3>
                    <p class="text-xl font-bold">{{ $totalBerita }}</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-5 flex items-center gap-4">
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="ph ph-image-square text-green-600 text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-sm text-gray-500">Total Galeri</h3>
                    <p class="text-xl font-bold">{{ $totalGaleri }}</p>
                </div>
            </div>
            <!-- Removed Total Kontak card as per user request -->
            <!--
            <div class="bg-white rounded-lg shadow p-5 flex items-center gap-4">
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="ph ph-phone text-blue-600 text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-sm text-gray-500">Total Kontak</h3>
                    <p class="text-xl font-bold">{{ $totalKontak }}</p>
                </div>
            </div>
            -->
        </div>

        <!-- Menu Utama -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('admin.berita.index') }}"
               class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition transform hover:-translate-y-1">
                <i class="ph ph-newspaper text-indigo-600 text-4xl mb-3"></i>
                <h2 class="text-lg font-semibold mb-1">Berita</h2>
                <p class="text-sm text-gray-600">Kelola konten berita website.</p>
            </a>

            <a href="{{ route('admin.galeri.index') }}"
               class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition transform hover:-translate-y-1">
                <i class="ph ph-image-square text-green-600 text-4xl mb-3"></i>
                <h2 class="text-lg font-semibold mb-1">Galeri</h2>
                <p class="text-sm text-gray-600">Kelola gambar-gambar galeri.</p>
            </a>

            <a href="{{ route('admin.contact.index') }}"
               class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition transform hover:-translate-y-1">
                <i class="ph ph-phone text-blue-600 text-4xl mb-3"></i>
                <h2 class="text-lg font-semibold mb-1">Kontak</h2>
                <p class="text-sm text-gray-600">Kelola informasi kontak website.</p>
            </a>
        </div>

@endsection
