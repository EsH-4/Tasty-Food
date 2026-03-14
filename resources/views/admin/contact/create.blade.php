@extends('layouts.admin')

@section('title', 'Tambah Kontak')
@section('page-title', 'Tambah Kontak')

@section('content')

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.contact.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block font-semibold mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                       class="w-full border rounded px-3 py-2 focus:outline-indigo-500" required>
            </div>

            <div>
                <label for="phone" class="block font-semibold mb-1">Telepon</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" 
                       class="w-full border rounded px-3 py-2 focus:outline-indigo-500" required>
            </div>

            <div>
                <label for="location" class="block font-semibold mb-1">Alamat</label>
                <input type="text" id="location" name="location" value="{{ old('location') }}" 
                       class="w-full border rounded px-3 py-2 focus:outline-indigo-500" required>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.contact.index') }}" 
                   class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Batal</a>
                <button type="submit" 
                        class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    Simpan
                </button>
            </div>
        </form>

@endsection
