<div class="container mt-5">
    <h3 class="fw-bold">Edit User</h3>

    <form action="{{ route('superadmin.users.update', $user->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required value="{{ old('username', $user->username) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Password (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-select" required>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="superadmin" {{ $user->role === 'superadmin' ? 'selected' : '' }}>Superadmin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">💾 Update</button>
        <a href="{{ route('superadmin.users.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
    </form>
</div>
