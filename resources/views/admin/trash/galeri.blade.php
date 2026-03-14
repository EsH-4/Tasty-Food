@extends('layouts.admin')

@section('title', 'Sampah Galeri')
@section('page-title', 'Sampah Galeri')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Sampah Galeri</h1>
        <div class="flex gap-3">
            <a href="{{ route('admin.trash.berita') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
                <i class="ph ph-newspaper"></i> Lihat Sampah Berita
            </a>
            <a href="{{ route('admin.trash.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
                <i class="ph ph-eye"></i> Lihat Semua Sampah
            </a>
            <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
                <i class="ph ph-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

    <!-- Galeri Section -->
    @if($deletedGaleris->count() > 0)
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Galeri yang Dihapus ({{ $deletedGaleris->count() }})</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Dihapus</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($deletedGaleris as $galeri)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $galeri->judul }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}" class="h-12 w-12 object-cover rounded">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $galeri->deleted_at->format('d/m/Y H:i') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex gap-2">
                                <button onclick="showRestoreModal(this.nextElementSibling)" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">
                                    <i class="ph ph-arrow-counter-clockwise"></i> Pulihkan
                                </button>
                                <form action="{{ route('admin.trash.restore-galeri', $galeri->id) }}" method="POST" class="hidden">
                                    @csrf
                                </form>

                                <button onclick="showDeleteModal(this.nextElementSibling)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                    <i class="ph ph-trash"></i> Hapus Permanen
                                </button>
                                <form action="{{ route('admin.trash.force-delete-galeri', $galeri->id) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="bg-white rounded-lg shadow p-8 text-center">
        <i class="ph ph-image-square text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak Ada Galeri yang Dihapus</h3>
        <p class="text-gray-500">Saat ini tidak ada galeri yang dihapus.</p>
        <div class="mt-4 flex justify-center gap-3">
            <a href="{{ route('admin.trash.berita') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">
                Lihat Sampah Berita
            </a>
            <a href="{{ route('admin.trash.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                Lihat Semua Sampah
            </a>
        </div>
    </div>
    @endif
</div>


@endsection