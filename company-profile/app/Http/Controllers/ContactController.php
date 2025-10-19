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

   public function editPage()
{
    $contact = Contact::first(); // ambil data kontak pertama (atau sesuai kebutuhan)
    return view('admin.contact.edit', compact('contact'));
}

// Update data kontak
public function updatePage(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required|string',
        'description' => 'nullable|string'
    ]);

    $contact = Contact::first();
    $contact->update([
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'description' => $request->description,
    ]);

    return redirect()->route('admin.contact.editpage')->with('success', 'Kontak berhasil diperbarui');
}
}