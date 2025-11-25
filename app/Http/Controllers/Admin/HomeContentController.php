<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContent;
use Illuminate\Support\Facades\Storage;

class HomeContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // tambahan: cek role di middleware atau di method
    }

    // form edit
    public function edit()
    {
        // ambil record pertama (satu row untuk home)
        $content = HomeContent::first();
        return view('admin.home_content.edit', compact('content'));
    }

    // proses update
    public function update(Request $request)
    {
        $content = HomeContent::first();
        if (!$content) {
            $content = new HomeContent();
        }

        $data = $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string',
            'tagline' => 'nullable|string|max:255',
            'hero_background' => 'nullable|image|max:2048', // 2MB
            // services ditangani sebagai arrays
            'services' => 'nullable|array',
            'services.*.title' => 'nullable|string|max:100',
            'services.*.desc' => 'nullable|string|max:255',
            'services.*.image' => 'nullable|image|max:2048',
        ]);

        // handle hero image upload
        if ($request->hasFile('hero_background')) {
            // hapus file lama jika ada
            if ($content->hero_background && Storage::disk('public')->exists($content->hero_background)) {
                Storage::disk('public')->delete($content->hero_background);
            }
            $path = $request->file('hero_background')->store('home', 'public');
            $data['hero_background'] = $path;
        }

        // handle services images (simpan path)
        $services = $content->services ?? [];
        if ($request->has('services') && is_array($request->services)) {
            $newServices = [];
            foreach ($request->services as $index => $svc) {
                $svcTitle = $svc['title'] ?? null;
                $svcDesc = $svc['desc'] ?? null;
                $svcImagePath = $services[$index]['image'] ?? null;

                // kalau ada file baru untuk service
                if (isset($svc['image']) && $request->file("services.$index.image")) {
                    // hapus lama kalau ada
                    if ($svcImagePath && Storage::disk('public')->exists($svcImagePath)) {
                        Storage::disk('public')->delete($svcImagePath);
                    }
                    $svcImagePath = $request->file("services.$index.image")->store("home/services", 'public');
                }

                $newServices[] = [
                    'title' => $svcTitle,
                    'desc' => $svcDesc,
                    'image' => $svcImagePath,
                ];
            }
            $data['services'] = $newServices;
        }

        $content->fill($data);
        $content->save();

        return redirect()->back()->with('success', 'Konten home berhasil disimpan.');
    }
}
