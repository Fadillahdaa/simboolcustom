<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Superadmin</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons (Bootstrap Icons) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .sidebar {
            width: 250px;
            background: #0d6efd;
            color: white;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.85);
            font-weight: 500;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 10px;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }
        .content {
            flex-grow: 1;
            padding: 2rem;
        }
        .navbar {
            background: white;
            border-bottom: 1px solid #dee2e6;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
        }
        footer {
            text-align: center;
            color: #6c757d;
            margin-top: 3rem;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar p-3">
        <h4 class="fw-bold mb-4 text-center">Simbool Custom</h4>
        <nav class="nav flex-column">
            <a href="#" class="nav-link active"><i class="bi bi-house-door me-2"></i>Dashboard</a>
            <a href="#" class="nav-link"><i class="bi bi-people me-2"></i>Kelola Data</a>
            <a href="#" class="nav-link"><i class="bi bi-bar-chart me-2"></i>Laporan</a>
            <a href="#" class="nav-link"><i class="bi bi-gear me-2"></i>Pengaturan</a>
        </nav>

        <div class="mt-auto text-center">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm mt-3 w-100">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
            <div class="container-fluid">
                <span class="navbar-text fw-semibold text-secondary">
                    Halo, <span class="text-primary">{{ Auth::user()->name }}</span>
                </span>
            </div>
        </nav>

        <div class="container mt-4">
            <div class="card border-0">
                <div class="card-body text-center py-5">
                    <h1 class="fw-bold text-primary mb-3">Selamat Datang, {{ Auth::user()->name }}</h1>
                    <p class="fs-5 text-muted">Role Anda: <span class="badge bg-success">{{ Auth::user()->role }}</span></p>

                    <hr class="my-4">

                    <div class="d-flex justify-content-center gap-3 mt-3">
                        <a href="#" class="btn btn-primary px-4"><i class="bi bi-folder"></i> Kelola Data</a>
                        <a href="#" class="btn btn-outline-secondary px-4"><i class="bi bi-graph-up"></i> Lihat Laporan</a>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            &copy; {{ date('Y') }} <b>Simbool Custom</b>. All rights reserved.
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>