@extends('layouts.admin')

@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Judul Berita</label>
                <input type="text" name="judul"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-indigo-500 focus:border-indigo-500"
                    value="{{ old('judul', $berita->judul) }}" required placeholder="Masukkan judul berita">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Penulis</label>
                <input type="text" name="penulis"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-indigo-500 focus:border-indigo-500"
                    value="{{ old('penulis', $berita->penulis) }}" required placeholder="Nama penulis">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Berita Saat Ini</label>
                @if($berita->gambar)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                        alt="Gambar Berita" class="w-64 h-48 object-cover rounded-lg border">
                </div>
                @else
                <p class="text-gray-500">Tidak ada gambar</p>
                @endif

                <label class="block text-sm font-medium text-gray-700 mb-2 mt-4">Ubah Gambar (Opsional)</label>
                <input type="file" name="gambar"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-indigo-500 focus:border-indigo-500"
                    accept="image/jpg,image/jpeg,image/png">
                <p class="text-sm text-gray-500 mt-1">Format: JPG, JPEG, PNG (Max: 2MB)</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Ringkasan Berita</label>
                <textarea name="konten" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-indigo-500 focus:border-indigo-500"
                    required placeholder="Tulis ringkasan singkat berita untuk ditampilkan di halaman utama...">{{ old('konten', $berita->konten) }}</textarea>
                <p class="text-sm text-gray-500 mt-1">Ringkasan ini akan ditampilkan di halaman berita utama</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Konten Lengkap Berita</label>
                <textarea name="konten_lengkap" rows="12"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-indigo-500 focus:border-indigo-500"
                    placeholder="Tulis konten lengkap berita yang akan ditampilkan di halaman detail...">{{ old('konten_lengkap', $berita->konten_lengkap) }}</textarea>
                <p class="text-sm text-gray-500 mt-1">Konten lengkap ini akan ditampilkan saat user klik "Baca Selengkapnya"</p>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.berita.index') }}"
                    class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Update Berita
                </button>
            </div>
        </div>
    </form>
</div>

@endsection