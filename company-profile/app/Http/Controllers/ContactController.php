<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // FRONTEND
    public function frontendIndex()
    {
        $contact = Contact::first();
        return view('visit.contact', compact('contact'));
    }

    // ADMIN
    public function adminIndex()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'whatsapp' => 'nullable|string|max:20',
        ]);

        $contact->update($data);

        return redirect()->route('admin.contact.index')->with('success', 'Contact berhasil diperbarui!');
    }
}
