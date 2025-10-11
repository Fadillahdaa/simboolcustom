<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Superadmin</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Simbool Custom</a>

            <div class="d-flex">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-body text-center py-5">
                <h1 class="fw-bold text-primary">Selamat Datang, {{ Auth::user()->name }}</h1>
                <p class="fs-5 text-muted">Role Anda: <span class="badge bg-success">{{ Auth::user()->role }}</span></p>

                <hr class="my-4">

                <div class="d-flex justify-content-center gap-3 mt-4">
                    <a href="#" class="btn btn-primary">Kelola Data</a>
                    <a href="#" class="btn btn-outline-secondary">Lihat Laporan</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 py-3 bg-dark text-white">
        &copy; {{ date('Y') }} Simbool Custom. All rights reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
