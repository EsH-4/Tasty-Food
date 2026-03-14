@extends('layouts.admin')

@section('title', 'Kelola Kontak Permanen')
@section('page-title', 'Kelola Kontak Permanen')

@section('content')

<div class="bg-white rounded-lg shadow p-6">
    <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">
            <i class="ph ph-map-pin text-blue-600"></i> Informasi Kontak Restoran
        </h3>
        <div class="bg-blue-50 border-l-4 border-blue-400 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="ph ph-info-circle text-blue-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-blue-700">
                        <strong>Informasi Kontak Permanen</strong> - Data ini tidak dapat dihapus karena merupakan fitur permanen website.
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ph ph-envelope"></i> Email
                </label>
                <input type="email" id="email" name="email" value="{{ old('email', $contact->email) }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror" required>
                @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="ph ph-phone"></i> Telepon
                </label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $contact->phone) }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('phone') border-red-500 @enderror" required>
                @error('phone')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                <i class="ph ph-map-pin"></i> Alamat Restoran
            </label>
            <input type="text" id="location" name="location" value="{{ old('location', $contact->location) }}"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('location') border-red-500 @enderror" required>
            @error('location')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="map_embed_url" class="block text-sm font-medium text-gray-700 mb-2">
                <i class="ph ph-link"></i> URL Embed Peta (Google Maps)
            </label>
            <textarea id="map_embed_url" name="map_embed_url" rows="4"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('map_embed_url') border-red-500 @enderror"
                placeholder="https://www.google.com/maps/embed?pb=...">{{ old('map_embed_url', $contact->map_embed_url) }}</textarea>
            @error('map_embed_url')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
            <p class="text-sm text-gray-600 mt-1">
                <i class="ph ph-info"></i> Paste embed URL dari Google Maps. Biarkan kosong jika tidak ingin menampilkan peta.
            </p>
        </div>

        <div class="flex justify-end gap-3 pt-6 border-t border-gray-200">
            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 font-medium">
                <i class="ph ph-check"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>

@endsection