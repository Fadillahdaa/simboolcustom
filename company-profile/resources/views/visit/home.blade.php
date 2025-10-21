@extends('layout.main') {{-- ganti sesuai nama layout kamu --}}

@section('title', 'Home - SIMBOOL CUSTOM INDUSTRIES')

@section('content')
{{-- Hero Section --}}
<section class="hero d-flex align-items-center text-center text-white"
    {{-- Overlay --}}
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0,0,0,0.55);"></div>

    <div class="container position-relative">
        <h1 class="fw-bold text-uppercase display-5" style="color:#f72585;">
            {!! $content->hero_title ?? 'SIMBOOL CUSTOM INDUSTRIES' !!}
        </h1>
        <p class="lead">
            {!! $content->hero_subtitle ?? 'Digital Printing and Everything<br>Build for Quality' !!}
        </p>
    </div>
</section>

{{-- Services Section --}}
<section class="services py-5 bg-dark text-white">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold" style="color:#f72585;">Layanan Kami</h2>

        <div class="row justify-content-center g-4">
            @if(!empty($content) && !empty($content->services) && is_array($content->services))
                @foreach($content->services as $svc)
                    <div class="col-6 col-md-3 text-center">
                        @if(!empty($svc['image']))
                            <img src="{{ asset('storage/'.$svc['image']) }}" 
                                 alt="{{ $svc['title'] ?? 'Service' }}" 
                                 class="img-fluid rounded mb-3 shadow-sm" 
                                 style="max-height:120px; object-fit:contain;">
                        @endif
                        <h5 class="fw-semibold text-uppercase" style="color:#f72585;">
                            {{ $svc['title'] ?? 'Layanan' }}
                        </h5>
                        <p class="small text-secondary">
                            {{ $svc['desc'] ?? 'Deskripsi layanan belum tersedia.' }}
                        </p>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center text-secondary">
                    <p>Belum ada data layanan yang tersedia.</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection