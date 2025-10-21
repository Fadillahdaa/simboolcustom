@extends('layout.main')

@section('title', 'Home - SIMBOOL CUSTOM INDUSTRIES')

@section('content')
    {{-- Hero Section --}}
    <section class="hero text-center py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <h1 class="fw-bold text-uppercase" style="color:#f72585;">
                SIMBOOL CUSTOM INDUSTRIES
            </h1>
            <p class="lead text-dark mb-4">
                Digital Printing and Everything<br>
                <span class="fw-semibold">Build for Quality</span>
            </p>

            <div class="hero-images d-flex justify-content-center flex-wrap gap-4">
                <img src="{{ asset('images/hero_printing.png') }}" alt="Printing" style="height:130px;">
                <img src="{{ asset('images/hero_design.png') }}" alt="Design" style="height:130px;">
                <img src="{{ asset('images/hero_fashion.png') }}" alt="Fashion" style="height:130px;">
                <img src="{{ asset('images/hero_handprint.png') }}" alt="Handprint" style="height:130px;">
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="services py-5 bg-dark text-white">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold" style="color:#f72585;">Layanan Kami</h2>

            <div class="d-flex justify-content-center mb-4 flex-wrap gap-3">
                <button class="btn btn-outline-light btn-sm px-3 active">All</button>
                <button class="btn btn-outline-light btn-sm px-3">Banner</button>
                <button class="btn btn-outline-light btn-sm px-3">Decal</button>
                <button class="btn btn-outline-light btn-sm px-3">Striping</button>
                <button class="btn btn-outline-light btn-sm px-3">Sablon Kaos</button>
                <button class="btn btn-outline-light btn-sm px-3">Stiker</button>
            </div>

            <div class="row justify-content-center g-4">
                <div class="col-6 col-md-2 text-center">
                    <img src="{{ asset('images/stiker.jpg') }}" alt="Stiker" class="img-fluid rounded shadow-sm mb-2" style="height:100px; object-fit:cover;">
                    <h6 class="fw-semibold" style="color:#f72585;">STIKER</h6>
                </div>
                <div class="col-6 col-md-2 text-center">
                    <img src="{{ asset('images/sablon.jpg') }}" alt="Sablon Kaos" class="img-fluid rounded shadow-sm mb-2" style="height:100px; object-fit:cover;">
                    <h6 class="fw-semibold" style="color:#f72585;">SABLON KAOS</h6>
                </div>
                <div class="col-6 col-md-2 text-center">
                    <img src="{{ asset('images/striping.jpg') }}" alt="Striping" class="img-fluid rounded shadow-sm mb-2" style="height:100px; object-fit:cover;">
                    <h6 class="fw-semibold" style="color:#f72585;">STRIPING</h6>
                </div>
                <div class="col-6 col-md-2 text-center">
                    <img src="{{ asset('images/decal.jpg') }}" alt="Decal" class="img-fluid rounded shadow-sm mb-2" style="height:100px; object-fit:cover;">
                    <h6 class="fw-semibold" style="color:#f72585;">DECAL</h6>
                </div>
            </div>
        </div>
    </section>

    {{-- Mengapa Kami Section --}}
    <section class="why-us py-5" style="background-color:#fff;">
        <div class="container text-center">
            <h2 class="fw-bold mb-5" style="color:#f72585;">Mengapa Kami</h2>

            <div class="row justify-content-center g-4">
                <div class="col-md-3">
                    <div class="p-3 bg-dark text-white rounded-4">
                        <h6 class="fw-semibold mb-2">Kualitas Print Bagus</h6>
                        <p class="small">Menggunakan printer berkualitas didukung tinta dan bahan premium untuk hasil maksimal.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 bg-dark text-white rounded-4">
                        <h6 class="fw-semibold mb-2">Print Quickly</h6>
                        <p class="small">Dikerjakan dengan waktu yang cepat sehingga pelanggan tidak menunggu lama.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 bg-dark text-white rounded-4">
                        <h6 class="fw-semibold mb-2">Best Service</h6>
                        <p class="small">Pelayanan ramah dan hasil sesuai keinginan pelanggan untuk kepuasan Anda.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 bg-dark text-white rounded-4">
                        <h6 class="fw-semibold mb-2">Best Price</h6>
                        <p class="small">Harga bersaing tanpa mengorbankan kualitas hasil printing yang tinggi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
