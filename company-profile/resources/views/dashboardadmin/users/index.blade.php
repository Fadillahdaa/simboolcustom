@extends('layout.app') {{-- opsional, kalau pakai layout utama --}}
@section('content')

<div class="container mt-5">
    <h3 class="fw-bold">Kelola User</h3>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <a href="{{ route('superadmin.users.create') }}" class="btn btn-primary my-3">➕ Tambah User</a>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr class="text-center">
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
                    <td class="text-center">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td class="text-center">
                        <span class="badge bg-{{ $user->role === 'superadmin' ? 'danger' : 'secondary' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('superadmin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                        <form action="{{ route('superadmin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus user ini?')">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted">Belum ada data user.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
