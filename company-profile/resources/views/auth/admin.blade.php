<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Tambahkan Bootstrap agar tampilannya rapi -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Admin Panel</a>
            <div class="d-flex">
                <span class="text-white me-3">
                    👤 {{ Auth::user()->name }} ({{ Auth::user()->role }})
                </span>
                <a class="btn btn-outline-light btn-sm"
                   href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Logout
                </a>
            </div>
        </div>
    </nav>

    <!-- Logout form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <!-- Konten Dashboard -->
    <div class="container mt-4">
        <div class="row">
            <!-- Sidebar Menu -->
            <div class="col-md-3 mb-3">
                <div class="list-group shadow-sm">
                    <a href="#" class="list-group-item list-group-item-action active">🏠 Dashboard</a>
                    <a href="#" class="list-group-item list-group-item-action">📰 Kelola Artikel</a>
                    <a href="#" class="list-group-item list-group-item-action">📦 Kelola Produk</a>
                    <a href="#" class="list-group-item list-group-item-action">👥 Kelola Pengguna</a>
                    <a href="#" class="list-group-item list-group-item-action">⚙️ Pengaturan</a>
                </div>
            </div>

            <!-- Konten Utama -->
            <div class="col-md-9">
                <div class="card shadow-sm">
                    <div class="card-header bg-white fw-bold">
                        Selamat Datang, {{ Auth::user()->name }}
                    </div>
                    <div class="card-body">
                        <p>Anda login sebagai <strong>{{ Auth::user()->role }}</strong>.</p>
                        <p>Gunakan menu di samping untuk mengelola konten website seperti artikel, produk, dan data pengguna.</p>
                    </div>
                </div>

                <!-- Contoh Statistik -->
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card text-center shadow-sm">
                            <div class="card-body">
                                <h4 class="fw-bold">25</h4>
                                <p>Artikel Dipublikasikan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center shadow-sm">
                            <div class="card-body">
                                <h4 class="fw-bold">12</h4>
                                <p>Produk Aktif</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center shadow-sm">
                            <div class="card-body">
                                <h4 class="fw-bold">8</h4>
                                <p>Pengguna Terdaftar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
