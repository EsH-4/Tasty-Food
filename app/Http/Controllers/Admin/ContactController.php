<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display the contact edit form directly (permanent contact).
     */
    public function index()
    {
        $contact = Contact::firstOrCreate([
            'email' => 'tastyfood@gmail.com',
            'phone' => '+62 822 5434 7654',
        ], [
            'location' => 'PKBM CSBI',
            'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15843.147745670245!2d107.62817481327224!3d-6.916058087685017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7ba86babe3d%3A0x1f6841b427a062f6!2sPKBM%20CSBI%20-%20Paket%20C%20Bandung!5e0!3m2!1sid!2sid!4v1757850927387!5m2!1sid!2sid'
        ]);

        // Langsung return edit view karena kontak permanen
        return view('admin.contact.contact', compact('contact'));
    }

    /**
     * Show the form for editing the restaurant location.
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update the restaurant location in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'map_embed_url' => 'nullable|url|max:1000',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->only('email', 'phone', 'location', 'map_embed_url'));

        return redirect()->route('admin.contact.index')->with('success', 'Informasi kontak berhasil diperbarui.');
    }
}
