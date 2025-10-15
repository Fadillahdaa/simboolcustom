<section class="hero" style="background-image: url('{{ $content && $content->hero_background ? asset('storage/'.$content->hero_background) : asset('images/default-hero.jpg') }}');">
    <div class="container text-center">
        <h1>{!! $content->hero_title ?? 'SIMBOOL CUSTOM INDUSTRIES' !!}</h1>
        <p>{!! $content->hero_subtitle ?? 'digital printing and everything<br>Build for quality' !!}</p>
    </div>
</section>

<section class="services">
    <div class="container">
        <div class="row">
            @if($content && is_array($content->services))
                @foreach($content->services as $svc)
                <div class="col-md-3 text-center">
                    @if(!empty($svc['image']))
                        <img src="{{ asset('storage/'.$svc['image']) }}" alt="" style="max-width:120px">
                    @endif
                    <h5>{{ $svc['title'] }}</h5>
                    <p>{{ $svc['desc'] }}</p>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
