@extends('layouts.admin')

@section('title', 'Edit Gambar Galeri')
@section('page-title', 'Edit Gambar Galeri')

@section('content')
        <div class="bg-white rounded-lg shadow-lg p-6">
            <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Judul Gambar</label>
                        <input type="text" name="judul" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-indigo-500 focus:border-indigo-500" 
                               value="{{ old('judul', $galeri->judul) }}" required placeholder="Masukkan judul gambar">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                        @if($galeri->gambar)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $galeri->gambar) }}" 
                                     alt="Gambar Galeri" class="w-64 h-48 object-cover rounded-lg border">
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

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('admin.galeri.index') }}" 
                           class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                            Batal
                        </a>
                        <button type="submit" 
                                class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            Update Gambar
                        </button>
                    </div>
                </div>
            </form>
        </div>

@endsection
