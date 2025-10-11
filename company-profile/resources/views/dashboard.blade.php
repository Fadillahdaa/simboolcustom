<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Superadmin</title>
</head>
<body>
    <h1>Selamat datang, {{ Auth::user()->name }}</h1>
    <p>Role: {{ Auth::user()->role }}</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>