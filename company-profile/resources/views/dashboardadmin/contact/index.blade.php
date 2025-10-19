@extends('layout.admin')

@section('content')
<div class="container">
    <h1>Daftar Contact</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Whatsapp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->alamat }}</td>
                <td>{{ $contact->telepon }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->whatsapp }}</td>
                <td>
                    <a href="{{ route('contact.index', $contact->id) }}" class="btn btn-primary btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
