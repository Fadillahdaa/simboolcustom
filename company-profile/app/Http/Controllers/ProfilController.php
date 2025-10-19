<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilController extends Controller
{
    // Tampilkan halaman profil untuk pengunjung
    public function index()
    {
        $profil = Profil::first();
        return view('visit.profile', compact('profil'));
    }

    // (opsional) jika ada halaman detail profil
    public function show($id)
    {
        $profil = Profil::findOrFail($id);
        return view('visit.profile-detail', compact('profil'));
    }
}
