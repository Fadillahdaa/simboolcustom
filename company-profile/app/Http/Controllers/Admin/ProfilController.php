<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function edit()
    {
        $profil = Profil::first();
        return view('dashboardadmin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'tentang' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'layanan' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $profil = Profil::first() ?? new Profil();

        // upload gambar baru
        if ($request->hasFile('image')) {
            if ($profil->image) {
                Storage::disk('public')->delete($profil->image);
            }
            $profil->image = $request->file('image')->store('profil_images', 'public');
        }

        $profil->fill($request->only(['title', 'tentang', 'visi', 'misi', 'layanan']))->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
