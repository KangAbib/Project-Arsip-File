<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Surat</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @include('layouts.sidebar')
        <div class="main-content">
            <h1>Edit Surat</h1>
            <form method="POST" action="{{ route('surats.update', $surat->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label>Nomor Surat</label>
                    <input type="text" name="nomor_surat" value="{{ $surat->nomor_surat }}" required>
                </div>
                <div>
                    <label>Kategori</label>
                    <select name="kategori" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $surat->kategori == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Judul</label>
                    <input type="text" name="judul" value="{{ $surat->judul }}" required>
                </div>
                <div>
                    <label>File Surat (PDF)</label>
                    <input type="file" name="file" accept="application/pdf">
                </div>
                <div>
                    <button type="button" onclick="window.location='{{ route('surats.index') }}'"><< Kembali</button>
                    <button type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
