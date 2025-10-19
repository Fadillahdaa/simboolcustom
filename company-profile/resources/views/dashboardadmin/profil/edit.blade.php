<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Halaman Profil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f4f4f4; }
    .card-header { background: linear-gradient(90deg, #212529, #3d3d3d); color: white; }
    .btn-primary { background-color: #212529; border: none; }
    .btn-primary:hover { background-color: #000; }
  </style>
</head>
<body>
<div class="container py-5">
  <div class="card shadow-lg">
    <div class="card-header">
      🧾 Edit Halaman Profil
    </div>
    <div class="card-body">
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <form action="{{ route('profil.update', ['role' => Auth::user()->role]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label class="form-label">Judul Profil</label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $profil->title ?? '') }}">
        </div>

        <div class="mb-3">
          <label class="form-label">Tentang Kami</label>
          <textarea name="tentang" rows="3" class="form-control">{{ old('tentang', $profil->tentang ?? '') }}</textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Visi</label>
          <textarea name="visi" rows="2" class="form-control">{{ old('visi', $profil->visi ?? '') }}</textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Misi</label>
          <textarea name="misi" rows="3" class="form-control">{{ old('misi', $profil->misi ?? '') }}</textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Layanan</label>
          <textarea name="layanan" rows="3" class="form-control">{{ old('layanan', $profil->layanan ?? '') }}</textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Gambar Profil</label><br>
          @if (!empty($profil->image))
              <img src="{{ asset('storage/'.$profil->image) }}" alt="Gambar Profil" class="img-thumbnail mb-2" width="250">
          @endif
          <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">💾 Simpan</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
