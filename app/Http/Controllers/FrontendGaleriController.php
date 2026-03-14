<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class FrontendGaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(8);
        return view('galeri', compact('galeris'));
    }
}
