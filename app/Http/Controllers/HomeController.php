<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Contact;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->take(5)->get();
        $galeris = Galeri::latest()->take(6)->get();

        return view('home', compact('beritas', 'galeris'));
    }

    public function kontak()
    {
        $contact = Contact::first();

        return view('kontak', compact('contact'));
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('kontak')->with('success', 'Pesan Anda telah berhasil dikirim. Terima kasih!');
    }
}
