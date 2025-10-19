@extends('layout.app') {{-- kalau kamu punya layout utama, kalau tidak bisa hapus baris ini --}}

@section('content')
<section class="py-5 text-center bg-light">
  <div class="container">

    {{-- Ambil data profil --}}
    @php
        $profil = App\Models\Profil::first();
    @endphp

    {{-- Gambar Profil --}}
    @if(!empty($profil->image))
      <img src="{{ asset('storage/'.$profil->image) }}" 
           class="img-fluid mb-4 rounded shadow" 
           alt="Profil" 
           style="max-width: 350px;">
    @endif

    {{-- Judul dan Tentang --}}
    <h2 class="fw-bold text-dark">{{ $profil->title ?? 'Tentang Kami' }}</h2>
    <p class="mt-3 text-secondary fs-5">{{ $profil->tentang ?? 'Belum ada deskripsi.' }}</p>

    {{-- Visi & Misi --}}
    <div class="row mt-5 g-4 justify-content-center">
      <div class="col-md-5">
        <div class="p-4 bg-dark text-white rounded-3 shadow-sm h-100">
          <h4 class="fw-bold mb-2">VISI</h4>
          <p class="mb-0">{{ $profil->visi ?? '-' }}</p>
        </div>
      </div>

      <div class="col-md-5">
        <div class="p-4 bg-dark text-white rounded-3 shadow-sm h-100">
          <h4 class="fw-bold mb-2">MISI</h4>
          <p class="mb-0">{{ $profil->misi ?? '-' }}</p>
        </div>
      </div>
    </div>

    {{-- Layanan --}}
    <div class="mt-5">
      <h3 class="fw-bold text-dark">Layanan Kami</h3>
      <p class="mt-2 text-secondary fs-5">{{ $profil->layanan ?? 'Belum ada layanan.' }}</p>
    </div>
  </div>
</section>
@endsection
