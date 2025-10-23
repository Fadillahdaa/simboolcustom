@extends('layout.adminlte')

@section('title', 'Dashboard Admin')

@section('sidebar')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
        <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link active">
                <i class="nav-icon fas fa-home"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('admin/profil/edit') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Kelola Profil</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('admin/contact/edit') }}" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                <p>Kelola Kontak</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('admin/product/edit') }}" class="nav-link">
                <i class="nav-icon fas fa-box"></i>
                <p>Kelola Produk</p>
            </a>
        </li>
    </ul>
</nav>
@endsection

@section('content')
    <h3>Selamat Datang, {{ Auth::user()->name }} 👋</h3>
    <p>Anda login sebagai <b>Admin</b>. Gunakan menu di sidebar untuk mengelola website.</p>

    <div class="card mt-3 shadow-sm">
        <div class="card-body">
            <h5 class="fw-bold">Informasi Cepat</h5>
            <p>Gunakan panel di sebelah kiri untuk memperbarui data perusahaan, kontak, dan produk.</p>
        </div>
    </div>
@endsection
