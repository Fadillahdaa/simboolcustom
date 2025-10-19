@extends('layout.app')

@section('title', 'Edit Kontak')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Halaman Kontak</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.contact.updatepage') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $contact->email) }}" required>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $contact->phone) }}" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="address" class="form-control" rows="3" required>{{ old('address', $contact->address) }}</textarea>
        </div>
        <div class="mb-3">
            <label>Deskripsi / Catatan</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $contact->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
