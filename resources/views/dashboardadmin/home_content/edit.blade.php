
@extends('layouts.admin') {{-- layout admin mu --}}

@section('content')
<div class="container">
    <h1>Edit Home Content</h1>
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <form action="{{ route('admin.home-content.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Hero Title</label>
            <input type="text" name="hero_title" class="form-control" value="{{ old('hero_title', $content->hero_title ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Hero Subtitle</label>
            <textarea name="hero_subtitle" class="form-control" rows="3">{{ old('hero_subtitle', $content->hero_subtitle ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Hero Background (image)</label>
            @if(!empty($content->hero_background))
                <div><img src="{{ asset('storage/' . $content->hero_background) }}" alt="" style="max-width:300px"></div>
            @endif
            <input type="file" name="hero_background" class="form-control">
        </div>

        <h4>Services</h4>
        <div id="services-wrapper">
            @php $services = old('services', $content->services ?? [['title'=>'','desc'=>'','image'=>null]]); @endphp

            @foreach($services as $i => $svc)
            <div class="card mb-2 p-2">
                <label>Title</label>
                <input type="text" name="services[{{ $i }}][title]" class="form-control" value="{{ $svc['title'] ?? '' }}">
                <label>Description</label>
                <input type="text" name="services[{{ $i }}][desc]" class="form-control" value="{{ $svc['desc'] ?? '' }}">
                @if(!empty($svc['image']))
                    <img src="{{ asset('storage/' . $svc['image']) }}" style="max-width:150px" class="mt-2">
                @endif
                <label>Image</label>
                <input type="file" name="services[{{ $i }}][image]" class="form-control">
            </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
