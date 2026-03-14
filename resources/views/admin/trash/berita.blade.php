@extends('layouts.admin')

@section('title', 'Sampah Berita')
@section('page-title', 'Sampah Berita')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Sampah Berita</h1>
        <div class="flex gap-3">
            <a href="{{ route('admin.trash.galeri') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
                <i class="ph ph-image-square"></i> Lihat Sampah Galeri
            </a>
            <a href="{{ route('admin.trash.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
                <i class="ph ph-eye"></i> Lihat Semua Sampah
            </a>
            <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
                <i class="ph ph-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

    <!-- Berita Section -->
    @if($deletedBeritas->count() > 0)
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Berita yang Dihapus ({{ $deletedBeritas->count() }})</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Dihapus</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($deletedBeritas as $berita)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $berita->judul }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $berita->penulis }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $berita->deleted_at->format('d/m/Y H:i') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex gap-2">
                                <button onclick="showRestoreModal(this.nextElementSibling)" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">
                                    <i class="ph ph-arrow-counter-clockwise"></i> Pulihkan
                                </button>
                                <form action="{{ route('admin.trash.restore-berita', $berita->id) }}" method="POST" class="hidden">
                                    @csrf
                                </form>

                                <button onclick="showDeleteModal(this.nextElementSibling)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                    <i class="ph ph-trash"></i> Hapus Permanen
                                </button>
                                <form action="{{ route('admin.trash.force-delete-berita', $berita->id) }}" method="POST" class="hidden">
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
        <i class="ph ph-newspaper text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak Ada Berita yang Dihapus</h3>
        <p class="text-gray-500">Saat ini tidak ada berita yang dihapus.</p>
        <div class="mt-4 flex justify-center gap-3">
            <a href="{{ route('admin.trash.galeri') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                Lihat Sampah Galeri
            </a>
            <a href="{{ route('admin.trash.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                Lihat Semua Sampah
            </a>
        </div>
    </div>
    @endif
</div>
@endsection