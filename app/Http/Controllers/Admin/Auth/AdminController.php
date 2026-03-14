<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Contact;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();
        $totalKontak = Contact::count();
        $totalPengguna = User::count();

        return view('admin.dashboard', compact('totalBerita', 'totalGaleri', 'totalKontak', 'totalPengguna'));
    }
}
