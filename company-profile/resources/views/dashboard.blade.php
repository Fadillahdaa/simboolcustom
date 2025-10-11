<h1>Dashboard Administrator</h1>

@if (session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('administrator.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
