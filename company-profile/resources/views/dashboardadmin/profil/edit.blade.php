<h2>Kelola Profil</h2>
<form action="{{ route('dashboard.profil.update') }}" method="POST">
    @csrf
    <textarea name="tentang" rows="5">{{ $profil->tentang }}</textarea><br>
    <textarea name="visi" rows="3">{{ $profil->visi }}</textarea><br>
    <textarea name="misi" rows="3">{{ $profil->misi }}</textarea><br>
    <button type="submit">Simpan</button>
</form>
