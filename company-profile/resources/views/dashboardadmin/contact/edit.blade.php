@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Halaman Kontak</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.contact.updatepage', ['role' => Auth::user()->role]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $contact->alamat ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar (bisa pilih file atau pakai kamera di HP)</label>

            <!-- tampilkan gambar lama jika ada -->
            @if(!empty($contact->gambar))
                <div class="mb-2">
                    <img id="current-image" src="{{ asset('storage/' . $contact->gambar) }}" alt="Gambar Kontak" style="max-width:200px; display:block;">
                </div>
            @endif

            <!-- preview gambar baru -->
            <div class="mb-2">
                <img id="preview-image" src="#" alt="Preview Gambar" style="max-width:200px; display:none;">
            </div>

            <!-- input file -->
            <input
                type="file"
                name="gambar"
                id="gambar"
                accept="image/*"
                capture="environment"
                class="form-control"
            >
            <small class="form-text text-muted">
                Boleh memilih dari galeri atau ambil foto langsung (pada HP pilih "Camera" / "Take Photo").
            </small>
        </div>

        <div class="mb-3">
            <label>Nomor WhatsApp</label>
            <div id="wa-container">
                @php
                    $whats = old('whatsapp', $contact->whatsapp ?? []);
                @endphp

                @if(!empty($whats))
                    @foreach($whats as $wa)
                        <div class="d-flex mb-2">
                            <input type="text" name="whatsapp[]" class="form-control" value="{{ $wa }}">
                            <button type="button" class="btn btn-danger ms-2 btn-remove-wa">Hapus</button>
                        </div>
                    @endforeach
                @else
                    <div class="d-flex mb-2">
                        <input type="text" name="whatsapp[]" class="form-control" placeholder="Masukkan nomor WA">
                        <button type="button" class="btn btn-danger ms-2 btn-remove-wa">Hapus</button>
                    </div>
                @endif
            </div>

            <button type="button" class="btn btn-success btn-sm" id="add-wa">Tambah Nomor WA</button>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // preview gambar saat memilih file
    const gambarInput = document.getElementById('gambar');
    const preview = document.getElementById('preview-image');
    const current = document.getElementById('current-image');

    gambarInput.addEventListener('change', function (e) {
        const file = this.files[0];
        if (!file) {
            preview.style.display = 'none';
            return;
        }
        const reader = new FileReader();
        reader.onload = function (evt) {
            preview.src = evt.target.result;
            preview.style.display = 'block';
            if (current) current.style.display = 'none';
        }
        reader.readAsDataURL(file);
    });

    // tambah/ hapus nomor WA
    document.getElementById('add-wa').addEventListener('click', function () {
        const container = document.getElementById('wa-container');
        const wrapper = document.createElement('div');
        wrapper.className = 'd-flex mb-2';
        wrapper.innerHTML = `
            <input type="text" name="whatsapp[]" class="form-control" placeholder="Masukkan nomor WA">
            <button type="button" class="btn btn-danger ms-2 btn-remove-wa">Hapus</button>
        `;
        container.appendChild(wrapper);
    });

    document.getElementById('wa-container').addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('btn-remove-wa')) {
            e.target.closest('.d-flex').remove();
        }
    });

});
</script>
@endsection
