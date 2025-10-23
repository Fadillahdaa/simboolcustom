<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fff;
            padding: 40px;
        }

        h3 {
            font-weight: 700;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
        }

        .btn-warning, .btn-danger {
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        table th {
            background-color: #212529 !important;
            color: #fff !important;;
            text-align: center;
            vertical-align: middle;
        }

        table td {
            vertical-align: middle;
        }

        .badge {
            font-size: 0.9rem;
            padding: 6px 10px;
        }

        .alert {
            font-size: 0.95rem;
        }
    </style>
</head>
<body>

<div class="container">
    <h3 class="fw-bold mb-4">Kelola User</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('superadmin.users.create') }}" class="btn btn-primary mb-3">
        <span>➕</span> Tambah User
    </a>

    <table class="table table-bordered table-hover align-middle text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td class="text-start">{{ $user->name }}</td>
                    <td class="text-start">{{ $user->username }}</td>
                    <td>
                        <span class="badge bg-{{ $user->role === 'superadmin' ? 'danger' : 'secondary' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('superadmin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                            ✏ Edit
                        </a>
                        <form action="{{ route('superadmin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus user ini?')">
                                🗑 Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-muted">Belum ada data user.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>