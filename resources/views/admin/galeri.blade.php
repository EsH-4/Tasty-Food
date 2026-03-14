@extends('layouts.admin')

@section('title', 'Kelola Galeri')
@section('page-title', 'Kelola Galeri')

@section('content')

<!-- Tombol tambah -->
<div class="flex justify-end mb-4">
    <a href="{{ route('admin.galeri.create') }}"
        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow flex items-center gap-2">
        <i class="ph ph-plus"></i> Tambah Gambar
    </a>
</div>

<!-- Grid galeri -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @forelse($galeri as $item)
    <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar" class="w-full h-48 object-cover">
        <div class="p-4 flex justify-between items-center">
            <span class="text-gray-700 font-medium">{{ $item->judul }}</span>
            <div class="flex gap-2">
                <a href="{{ route('admin.galeri.edit', $item->id) }}"
                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                    <i class="ph ph-pencil"></i>
                </a>
                <button onclick="showDeleteModal(this.nextElementSibling)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                    <i class="ph ph-trash"></i>
                </button>
                <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
    @empty
    <p class="text-center text-gray-500 col-span-3">Tidak ada gambar di galeri.</p>
    @endforelse
</div>



@endsection