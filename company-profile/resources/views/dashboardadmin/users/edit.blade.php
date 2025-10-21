<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: "Poppins", sans-serif;
        }

        .form-container {
            width: 700px;
            margin: 50px auto;
            background-color: #e9e9e9;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .form-header {
            background-color: #1c1c1c;
            color: white;
            padding: 10px 15px;
            font-weight: bold;
            font-size: 15px;
        }

        .form-body {
            padding: 25px 35px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            background-color: #f8f8f8;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            outline: none;
            border-color: #222;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .btn {
            border: none;
            padding: 8px 25px;
            border-radius: 4px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-primary {
            background-color: #000;
        }

        .btn-primary:hover {
            background-color: #333;
        }

        .btn-secondary {
            background-color: #000;
        }

        .btn-secondary:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">Edit User</div>
        <div class="form-body">
            <form action="{{ route('superadmin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div>
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
                </div>

                <div>
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required value="{{ old('username', $user->username) }}">
                </div>

                <div>
                    <label>Password (kosongkan jika tidak diubah)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div>
                    <label>Role</label>
                    <select name="role" class="form-select" required>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="superadmin" {{ $user->role === 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                    </select>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">💾 Update</button>
                    <a href="{{ route('superadmin.users.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
