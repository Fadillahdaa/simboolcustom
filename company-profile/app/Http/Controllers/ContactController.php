<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    // ✅ Halaman edit untuk admin
    public function editPage()
    {
        $contact = Contact::first();
        return view('dashboardadmin.contact.edit', compact('contact'));
    }

    // ✅ Menyimpan perubahan dari admin
    public function updatePage(Request $request)
    {
        $contact = Contact::first();

        // --- Validasi input ---
        $validated = $request->validate([
            'alamat' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:4096', // maks 4MB
            'whatsapp' => 'required|array',
            'whatsapp.*' => 'string',
        ]);

        // --- Upload gambar baru jika ada ---
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama kalau ada
            if ($contact->gambar && Storage::exists('public/' . $contact->gambar)) {
                Storage::delete('public/' . $contact->gambar);
            }

            // Simpan gambar baru ke storage/app/public/contact
            $path = $request->file('gambar')->store('contact', 'public');
            $validated['gambar'] = $path;
        }

        // --- Update data ke database ---
        $contact->update($validated);

        // --- Redirect dengan pesan sukses ---
        return redirect()->back()->with('success', 'Kontak berhasil diperbarui!');
    }

    // ✅ Halaman untuk pengunjung
    public function frontendIndex()
    {
        $contact = Contact::first();
        return view('visit.contact', compact('contact'));
    }
}
