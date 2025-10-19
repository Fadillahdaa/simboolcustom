@extends('layout.app')

@section('content')
<div class="container">
    <h1>Contact Kami</h1>

    <p>Alamat: {{ $contact->alamat }}</p>
    <p>Telepon: {{ $contact->telepon }}</p>
    <p>Email: {{ $contact->email }}</p>
    <p>Whatsapp: {{ $contact->whatsapp }}</p>
</div>
@endsection
