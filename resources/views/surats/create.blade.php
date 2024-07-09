<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat >> Unggah</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @include('layouts.sidebar')
        <div class="main-content">
            <h1>Arsip Surat >> Unggah</h1>
            <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan. <br> Catatan: Gunakan file berformat PDF</p>
            <form method="POST" action="{{ route('surats.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="unik1">
                    <label>Nomor Surat</label>
                    <input type="text" name="nomor_surat" required>
                </div>
                <div class="unik2">
                    <label>Kategori</label>
                    <select name="kategori" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Judul</label>
                    <input type="text" name="judul" required>
                </div>
                <div>
                    <label>File Surat (PDF)</label>
                    <input type="file" name="file" accept="application/pdf" required>
                </div>
                <div class="actions">
                    <button type="button" class="button" onclick="window.location='{{ route('surats.index') }}'"><< Kembali</button>
                    <button type="submit" class="button">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
