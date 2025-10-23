@extends('layout.adminlte')

@section('title', 'Dashboard Superadmin')

@section('sidebar')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
        <li class="nav-item">
            <a href="{{ url('superadmin/dashboard') }}" class="nav-link active">
                <i class="nav-icon fas fa-home"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('superadmin/profil/edit') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Kelola Profil</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('superadmin/contact/edit') }}" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                <p>Kelola Kontak</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('superadmin/product/edit') }}" class="nav-link">
                <i class="nav-icon fas fa-box"></i>
                <p>Kelola Produk</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('superadmin/users') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Kelola User</p>
            </a>
        </li>
    </ul>
</nav>
@endsection

@section('content')
    <h3>Selamat Datang, {{ Auth::user()->name }} 👋</h3>
    <p>Anda login sebagai <b>Superadmin</b>. Anda memiliki akses penuh terhadap semua data dan pengguna.</p>

    <div class="card mt-3 shadow-sm">
        <div class="card-body">
            <h5 class="fw-bold">Kontrol Penuh</h5>
            <p>Kelola data website, produk, profil, kontak, dan juga manajemen pengguna di menu sidebar.</p>
        </div>
    </div>
@endsection
