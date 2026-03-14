<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();
        return view('admin.berita', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita-create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'penulis' => 'required|string|max:100',
                'konten' => 'required|string',
                'konten_lengkap' => 'nullable|string',
                'gambar' => 'required|image|mimes:jpg,jpeg,png|max:5120'
            ]);

            $slug = Str::slug($request->judul);

            // Check if slug already exists
            if (Berita::where('slug', $slug)->exists()) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Judul berita sudah digunakan. Silakan gunakan judul yang berbeda.');
            }

            // Handle file upload
            if ($request->hasFile('gambar')) {
                $path = $request->file('gambar')->store('berita', 'public');
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Gambar berita harus diunggah.');
            }

            // Create berita record
            Berita::create([
                'judul' => $request->judul,
                'slug' => $slug,
                'penulis' => $request->penulis,
                'konten' => $request->konten,
                'konten_lengkap' => $request->konten_lengkap,
                'gambar' => $path
            ]);

            return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors($e->validator->errors());
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan berita: ' . $e->getMessage());
        }
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita-edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'penulis' => 'required|string|max:100',
                'konten' => 'required|string',
                'konten_lengkap' => 'nullable|string',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120'
            ]);

            $slug = Str::slug($request->judul);

            // Check if slug already exists (excluding current berita)
            if (Berita::where('slug', $slug)->where('id', '!=', $berita->id)->exists()) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Judul berita sudah digunakan. Silakan gunakan judul yang berbeda.');
            }

            // Handle file upload
            if ($request->hasFile('gambar')) {
                $path = $request->file('gambar')->store('berita', 'public');
                $berita->gambar = $path;
            }

            $berita->judul = $request->judul;
            $berita->slug = $slug;
            $berita->penulis = $request->penulis;
            $berita->konten = $request->konten;
            $berita->konten_lengkap = $request->konten_lengkap;
            $berita->save();

            return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors($e->validator->errors());
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui berita: ' . $e->getMessage());
        }
    }

    // public function destroy(Berita $berita)
    // {
    //     dd($berita);
    //     $berita->delete();
    //     return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    // }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dipindahkan ke sampah.');
    }
}
