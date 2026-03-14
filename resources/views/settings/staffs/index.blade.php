@extends('layouts.admin')

@section('title', 'Kelola Staff')
@section('page-title', 'Kelola Staff')

@section('content')

<!-- Header dengan tombol tambah -->
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Kelola Staff</h1>
    <a href="{{ route('settings.staffs.create') }}"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow flex items-center gap-2 transition">
        <i class="ph ph-plus"></i> Tambah Staff
    </a>
</div>

<!-- Alert Messages -->
@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
    {{ session('error') }}
</div>
@endif

<!-- Staff Table -->
<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="min-w-full border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-3 text-left font-semibold">ID</th>
                <th class="px-4 py-3 text-left font-semibold">Nama</th>
                <th class="px-4 py-3 text-left font-semibold">Email</th>
                <th class="px-4 py-3 text-left font-semibold">Telepon</th>
                <th class="px-4 py-3 text-left font-semibold">Posisi</th>
                <th class="px-4 py-3 text-left font-semibold">Departemen</th>
                <th class="px-4 py-3 text-left font-semibold">Status</th>
                <th class="px-4 py-3 text-center font-semibold">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($staffs ?? [] as $staff)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-3">{{ $staff->id }}</td>
                <td class="px-4 py-3">{{ $staff->name }}</td>
                <td class="px-4 py-3">{{ $staff->email }}</td>
                <td class="px-4 py-3">{{ $staff->phone ?? '-' }}</td>
                <td class="px-4 py-3">{{ $staff->position ?? '-' }}</td>
                <td class="px-4 py-3">{{ $staff->department ?? '-' }}</td>
                <td class="px-4 py-3">
                    <span class="px-2 py-1 rounded-full text-xs font-medium {{ $staff->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $staff->status ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                </td>
                <td class="px-4 py-3 text-center">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('settings.staffs.edit', $staff->id) }}"
                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                            <i class="ph ph-pencil"></i>
                        </a>
                        <button onclick="showDeleteModal(this.nextElementSibling)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                            <i class="ph ph-trash"></i>
                        </button>
                        <form action="{{ route('settings.staffs.destroy', $staff->id) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="px-4 py-4 text-center text-gray-500">Tidak ada data staff.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection