<?php 


$profil = App\Models\Profil::first(); ?>
<!-- <p>{{ $profil->tentang }}</p>
<h3>Visi</h3>
<p>{{ $profil->visi }}</p>
<h3>Misi</h3>
<p>{{ $profil->misi }}</p> -->



<section class="py-5 text-center">
  <div class="container">
    @if(!empty($profil->image))
      <img src="{{ asset('storage/'.$profil->image) }}" class="img-fluid mb-4 rounded shadow" alt="Profil">
    @endif

    <h2 class="fw-bold">{{ $profil->title ?? 'Tentang Kami' }}</h2>
    <p class="mt-3">{{ $profil->tentang ?? 'Belum ada deskripsi.' }}</p>

    <div class="row mt-5">
      <div class="col-md-6">
        <div class="p-4 bg-dark text-white rounded-3 shadow-sm">
          <h4 class="fw-bold mb-2">VISI</h4>
          <p>{{ $profil->visi ?? '-' }}</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="p-4 bg-dark text-white rounded-3 shadow-sm">
          <h4 class="fw-bold mb-2">MISI</h4>
          <p>{{ $profil->misi ?? '-' }}</p>
        </div>
      </div>
    </div>

    <div class="mt-5">
      <h3 class="fw-bold">Layanan Kami</h3>
      <p class="mt-2">{{ $profil->layanan ?? 'Belum ada layanan.' }}</p>
    </div>
  </div>
</section>
