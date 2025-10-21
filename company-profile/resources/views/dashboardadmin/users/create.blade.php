<div class="container mt-5">
    <h3 class="fw-bold">Tambah User Baru</h3>

    <form action="{{ route('superadmin.users.store') }}" method="POST" class="mt-3">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required value="{{ old('username') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-select" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="superadmin">Superadmin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">💾 Simpan</button>
        <a href="{{ route('superadmin.users.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
    </form>
</div>
