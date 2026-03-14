@extends('layouts.admin')

@section('title', 'Kelola Berita')
@section('page-title', 'Kelola Berita')

@section('content')

<!-- Tombol tambah -->
<div class="flex justify-end mb-4">
    <a href="{{ route('admin.berita.create') }}"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded shadow flex items-center gap-2">
        <i class="ph ph-plus"></i> Tambah Berita
    </a>
</div>

<!-- Tabel berita -->
<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="min-w-full border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Gambar</th>
                <th class="px-4 py-2 text-left">Judul</th>
                <th class="px-4 py-2 text-left">Penulis</th>
                <th class="px-4 py-2 text-left">Tanggal</th>
                <th class="px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($berita as $item)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">
                    @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}"
                        alt="Gambar Berita" class="w-16 h-12 object-cover rounded">
                    @else
                    <span class="text-gray-400">No image</span>
                    @endif
                </td>
                <td class="px-4 py-2">{{ $item->judul }}</td>
                <td class="px-4 py-2">{{ $item->penulis }}</td>
                <td class="px-4 py-2">{{ $item->created_at->format('d M Y') }}</td>
                <td class="px-4 py-2 text-center flex justify-center gap-2">
                    <a href="{{ route('admin.berita.edit', $item->id) }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                        <i class="ph ph-pencil"></i>
                    </a>
                    <button onclick="showDeleteModal(this.nextElementSibling)"
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                        <i class="ph ph-trash"></i>
                    </button>
                    <form action="{{ route('admin.berita.destroy', $item->id) }}"
                        method="POST"
                        class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-4 py-4 text-center text-gray-500">Tidak ada berita.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

</main>

<!-- Modal Tambah Berita -->
<div id="modalBerita"
    class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
        <!-- Header -->
        <div class="flex justify-between items-center border-b px-4 py-2">
            <h2 class="text-xl font-semibold text-indigo-600">Tambah Berita</h2>
            <button id="closeModal"
                class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.berita.store') }}"
            method="POST"
            class="p-4 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium">Judul</label>
                <input type="text" name="judul"
                    class="w-full border rounded px-3 py-2 focus:outline-indigo-500"
                    required>
            </div>
            <div>
                <label class="block text-sm font-medium">Penulis</label>
                <input type="text" name="penulis"
                    class="w-full border rounded px-3 py-2 focus:outline-indigo-500"
                    required>
            </div>
            <div>
                <label class="block text-sm font-medium">Ringkasan Berita</label>
                <textarea name="konten" rows="4"
                    class="w-full border rounded px-3 py-2 focus:outline-indigo-500"
                    required placeholder="Tulis ringkasan singkat berita..."></textarea>
                <p class="text-sm text-gray-500 mt-1">Ringkasan ini akan ditampilkan di halaman berita utama</p>
            </div>

            <div>
                <label class="block text-sm font-medium">Konten Lengkap Berita</label>
                <textarea name="konten_lengkap" rows="8"
                    class="w-full border rounded px-3 py-2 focus:outline-indigo-500"
                    placeholder="Tulis konten lengkap berita yang akan ditampilkan di halaman detail..."></textarea>
                <p class="text-sm text-gray-500 mt-1">Konten lengkap ini akan ditampilkan saat user klik "Baca Selengkapnya"</p>
            </div>

            <!-- Action -->
            <div class="flex justify-end gap-2">
                <button type="button" id="cancelModal"
                    class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Script Modal -->
<script>
    const openModal = document.getElementById('openModal');
    const closeModal = document.getElementById('closeModal');
    const cancelModal = document.getElementById('cancelModal');
    const modal = document.getElementById('modalBerita');

    openModal.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    closeModal.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    cancelModal.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    // Klik area luar modal untuk close
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
</script>

@endsection