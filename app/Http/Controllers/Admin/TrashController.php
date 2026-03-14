<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Contact;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function index()
    {
        $deletedBeritas = Berita::onlyTrashed()->latest()->get();
        $deletedGaleris = Galeri::onlyTrashed()->latest()->get();
        $deletedContacts = Contact::onlyTrashed()->latest()->get();

        return view('admin.trash.index', compact('deletedBeritas', 'deletedGaleris', 'deletedContacts'));
    }

    public function berita()
    {
        $deletedBeritas = Berita::onlyTrashed()->latest()->get();

        return view('admin.trash.berita', compact('deletedBeritas'));
    }

    public function galeri()
    {
        $deletedGaleris = Galeri::onlyTrashed()->latest()->get();

        return view('admin.trash.galeri', compact('deletedGaleris'));
    }

    public function restoreBerita($id)
    {
        $berita = Berita::withTrashed()->findOrFail($id);
        $berita->restore();

        return redirect()->route('admin.trash.index')->with('success', 'Berita berhasil dikembalikan.');
    }

    public function restoreGaleri($id)
    {
        $galeri = Galeri::withTrashed()->findOrFail($id);
        $galeri->restore();

        return redirect()->route('admin.trash.index')->with('success', 'Galeri berhasil dikembalikan.');
    }

    public function forceDeleteBerita($id)
    {
        $berita = Berita::withTrashed()->findOrFail($id);
        $berita->forceDelete();

        return redirect()->route('admin.trash.index')->with('success', 'Berita berhasil dihapus permanen.');
    }

    public function forceDeleteGaleri($id)
    {
        $galeri = Galeri::withTrashed()->findOrFail($id);
        $galeri->forceDelete();

        return redirect()->route('admin.trash.index')->with('success', 'Galeri berhasil dihapus permanen.');
    }

    public function restoreContact($id)
    {
        $contact = Contact::withTrashed()->findOrFail($id);
        $contact->restore();

        return redirect()->route('admin.trash.index')->with('success', 'Kontak berhasil dikembalikan.');
    }

    public function forceDeleteContact($id)
    {
        $contact = Contact::withTrashed()->findOrFail($id);
        $contact->forceDelete();

        return redirect()->route('admin.trash.index')->with('success', 'Kontak berhasil dihapus permanen.');
    }
}
