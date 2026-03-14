@extends('layouts.admin')

@section('title', 'Detail Pesan Kontak')

@section('page-title', 'Detail Pesan Kontak')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.contact-messages.index') }}"
                class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900">
                <i class="ph ph-arrow-left"></i>
                <span>Kembali</span>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Pesan Kontak</h1>
                <p class="text-gray-600">Pesan dari {{ $contactMessage->name }}</p>
            </div>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.contact-messages.edit', $contactMessage) }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors">
                <i class="ph ph-pencil"></i>
                <span>Edit</span>
            </a>
            <form action="{{ route('admin.contact-messages.destroy', $contactMessage) }}"
                method="POST"
                class="inline"
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                    <i class="ph ph-trash"></i>
                    <span>Hapus</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Message Card -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-start justify-between">
                <div class="flex items-center gap-4">
                    <div class="h-12 w-12 rounded-full bg-indigo-100 flex items-center justify-center">
                        <span class="text-lg font-semibold text-indigo-600">
                            {{ strtoupper(substr($contactMessage->name, 0, 1)) }}
                        </span>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $contactMessage->name }}</h3>
                        <p class="text-gray-600">{{ $contactMessage->email }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-500">Dikirim pada</p>
                    <p class="font-medium text-gray-900">{{ $contactMessage->created_at->format('d F Y') }}</p>
                    <p class="text-sm text-gray-500">{{ $contactMessage->created_at->format('H:i') }}</p>
                </div>
            </div>
        </div>

        <div class="p-6 space-y-6">
            <!-- Subject -->
            <div>
                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Subjek</h4>
                <p class="text-lg font-medium text-gray-900">{{ $contactMessage->subject }}</p>
            </div>

            <!-- Message -->
            <div>
                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Pesan</h4>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-gray-900 whitespace-pre-wrap leading-relaxed">{{ $contactMessage->message }}</p>
                </div>
            </div>

            <!-- Metadata -->
            <div class="border-t border-gray-200 pt-6">
                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-4">Informasi Tambahan</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">ID Pesan</p>
                        <p class="font-mono text-sm text-gray-900">#{{ $contactMessage->id }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Status</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <i class="ph ph-check-circle mr-1"></i>
                            Aktif
                        </span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Dibuat</p>
                        <p class="text-sm text-gray-900">{{ $contactMessage->created_at->diffForHumans() }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Terakhir Diupdate</p>
                        <p class="text-sm text-gray-900">{{ $contactMessage->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="flex justify-between items-center">
        <div class="text-sm text-gray-500">
            <i class="ph ph-info mr-1"></i>
            Pesan ini dikirim melalui formulir kontak di website Tasty Food
        </div>
        <div class="flex gap-3">
            <a href="mailto:{{ $contactMessage->email }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <i class="ph ph-envelope"></i>
                <span>Balas Email</span>
            </a>
        </div>
    </div>
</div>
@endsection