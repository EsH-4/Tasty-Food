<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class FrontendBeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(8);
        return view('berita', compact('beritas'));
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('berita-detail', compact('berita'));
    }
}
