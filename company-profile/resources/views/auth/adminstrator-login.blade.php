<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator</title>
</head>
<body>
    <h2>Login Administrator</h2>

    {{-- Pesan error --}}
    @if ($errors->any())
        <p style="color:red;">{{ $errors->first() }}</p>
    @endif

    {{-- Pesan sukses --}}
    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('administrator.login.submit') }}">
        @csrf
        <label>Username:</label><br>
        <input type="text" name="username" placeholder="Masukkan username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" placeholder="Masukkan password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>