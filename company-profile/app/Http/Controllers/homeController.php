<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeContent;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data pertama dari tabel home_contents
        $content = HomeContent::first();

        // Kirim data ke tampilan (halaman pengunjung)
        return view('visit.home', compact('content'));
    }
}
