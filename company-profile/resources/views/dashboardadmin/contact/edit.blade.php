@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Contact</h1>

    <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $contact->alamat) }}">
        </div>

        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $contact->telepon) }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $contact->email) }}">
        </div>

        <div class="mb-3">
            <label>Whatsapp</label>
            <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp', $contact->whatsapp) }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
