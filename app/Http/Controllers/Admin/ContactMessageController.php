<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactMessages = ContactMessage::latest()->paginate(15);

        return view('admin.contact-messages.index', compact('contactMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact-messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->all());

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Pesan kontak berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactMessage $contactMessage)
    {
        return view('admin.contact-messages.show', compact('contactMessage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactMessage $contactMessage)
    {
        return view('admin.contact-messages.edit', compact('contactMessage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactMessage $contactMessage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contactMessage->update($request->all());

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Pesan kontak berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Pesan kontak berhasil dihapus.');
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restore($id)
    {
        $contactMessage = ContactMessage::withTrashed()->findOrFail($id);
        $contactMessage->restore();

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Pesan kontak berhasil dipulihkan.');
    }

    /**
     * Force delete the specified resource permanently.
     */
    public function forceDelete($id)
    {
        $contactMessage = ContactMessage::withTrashed()->findOrFail($id);
        $contactMessage->forceDelete();

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Pesan kontak berhasil dihapus permanen.');
    }
}
