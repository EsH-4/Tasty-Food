@extends('layouts.admin')

@section('title', 'Edit Kontak Permanen')
@section('page-title', 'Edit Kontak Permanen')

@section('content')

<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">
            <i class="ph ph-map-pin text-blue-600"></i> Edit Informasi Kontak
        </h3>
        <div class="bg-amber-50 border-l-4 border-amber-400 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="ph ph-warning-circle text-amber-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-amber-700">
                        <strong>Kontak Permanen</strong> - Data ini tidak dapat dihapus karena merupakan fitur permanen website.
                        Anda hanya dapat mengedit informasi kontak sesuai kebutuhan.
                    </p>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-400 text-green-700 p-4 mb-6">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $contact->email) }}"
                class="w-full border rounded px-3 py-2 focus:outline-indigo-500 @error('email') border-red-500 @enderror" required>
            @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="phone" class="block font-semibold mb-1">Telepon</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $contact->phone) }}"
                class="w-full border rounded px-3 py-2 focus:outline-indigo-500 @error('phone') border-red-500 @enderror" required>
            @error('phone')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="location" class="block font-semibold mb-1">Alamat Restoran</label>
            <input type="text" id="location" name="location" value="{{ old('location', $contact->location) }}"
                class="w-full border rounded px-3 py-2 focus:outline-indigo-500 @error('location') border-red-500 @enderror" required>
            @error('location')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="map_embed_url" class="block font-semibold mb-1">URL Embed Peta (Google Maps)</label>
            <textarea id="map_embed_url" name="map_embed_url" rows="3"
                class="w-full border rounded px-3 py-2 focus:outline-indigo-500 @error('map_embed_url') border-red-500 @enderror"
                placeholder="https://www.google.com/maps/embed?pb=...">{{ old('map_embed_url', $contact->map_embed_url) }}</textarea>
            @error('map_embed_url')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
            <p class="text-sm text-gray-600 mt-1">Paste embed URL dari Google Maps. Biarkan kosong jika tidak ingin menampilkan peta.</p>
        </div>

        <div class="flex justify-end gap-2">
            <button type="submit"
                class="px-4 py-2 bg-yellow-400 text-white rounded hover:bg-yellow-500 font-semibold">
                Simpan
            </button>
            <a href="{{ route('admin.contact.index') }}"
                class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 font-semibold">
                Kembali
            </a>
        </div>
    </form>

    @endsection