@extends('layouts.admin')

@section('title', 'Edit Staff')
@section('page-title', 'Edit Staff')

@section('content')

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Staff</h1>
            <a href="{{ route('settings.staffs.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
                <i class="ph ph-arrow-left"></i> Kembali ke Daftar Staff
            </a>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <form action="{{ route('settings.staffs.update', $staff->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror"
                               id="name" name="name" value="{{ old('name', $staff->name) }}" required placeholder="Masukkan nama lengkap">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="md:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                               id="email" name="email" value="{{ old('email', $staff->email) }}" required placeholder="Masukkan email">
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Nomor Telepon
                        </label>
                        <input type="text"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-indigo-500 focus:border-indigo-500 @error('phone') border-red-500 @enderror"
                               id="phone" name="phone" value="{{ old('phone', $staff->phone) }}" placeholder="Masukkan nomor telepon">
                        @error('phone')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Position -->
                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-700 mb-2">
                            Posisi
                        </label>
                        <input type="text"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-indigo-500 focus:border-indigo-500 @error('position') border-red-500 @enderror"
                               id="position" name="position" value="{{ old('position', $staff->position) }}" placeholder="Masukkan posisi">
                        @error('position')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Department -->
                    <div>
                        <label for="department" class="block text-sm font-medium text-gray-700 mb-2">
                            Departemen
                        </label>
                        <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-indigo-500 focus:border-indigo-500 @error('department') border-red-500 @enderror"
                                id="department" name="department">
                            <option value="">Pilih Departemen</option>
                            <option value="IT" {{ old('department', $staff->department) == 'IT' ? 'selected' : '' }}>IT</option>
                            <option value="HR" {{ old('department', $staff->department) == 'HR' ? 'selected' : '' }}>HR</option>
                            <option value="Finance" {{ old('department', $staff->department) == 'Finance' ? 'selected' : '' }}>Finance</option>
                            <option value="Marketing" {{ old('department', $staff->department) == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                            <option value="Operations" {{ old('department', $staff->department) == 'Operations' ? 'selected' : '' }}>Operations</option>
                            <option value="Sales" {{ old('department', $staff->department) == 'Sales' ? 'selected' : '' }}>Sales</option>
                            <option value="Other" {{ old('department', $staff->department) == 'Other' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('department')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Status
                        </label>
                        <div class="flex items-center">
                            <input type="checkbox"
                                   class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500"
                                   id="status" name="status" value="1" {{ old('status', $staff->status) ? 'checked' : '' }}>
                            <label for="status" class="ml-2 text-sm text-gray-700">
                                Aktif
                            </label>
                        </div>
                        @error('status')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="md:col-span-2">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password Baru (kosongkan jika tidak ingin mengubah)
                        </label>
                        <input type="password"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror"
                               id="password" name="password" placeholder="Masukkan password baru">
                        @error('password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="md:col-span-2">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            Konfirmasi Password Baru
                        </label>
                        <input type="password"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-indigo-500 focus:border-indigo-500"
                               id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password baru">
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3 pt-6 border-t mt-6">
                    <a href="{{ route('settings.staffs.index') }}"
                       class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-6 py-2 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition">
                        <i class="ph ph-check mr-2"></i> Update Staff
                    </button>
                </div>
            </form>
        </div>

@endsection
