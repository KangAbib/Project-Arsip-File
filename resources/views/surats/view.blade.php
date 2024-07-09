<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat >> Lihat</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @include('layouts.sidebar')
        <div class="main-content">
            <h1>Arsip Surat >> Lihat</h1>
            <p>Nomor: {{ $surat->nomor_surat }}</p>
            <p>Kategori: {{ $surat->category->name }}</p>
            <p>Judul: {{ $surat->judul }}</p>
            <p>Waktu Unggah: {{ $surat->waktu_pengarsipan }}</p>
            <div class="file-viewer">
                <iframe src="{{ asset('storage/' . str_replace('public/', '', $surat->file_path)) }}" width="100%" height="500px"></iframe>
            </div>
            <div class="actions">
                <button onclick="window.location='{{ route('surats.index') }}'" class="button"><< Kembali</button>
                <a href="{{ route('surats.download', $surat->id) }}" class="button unduh">Unduh</a>
                <a href="{{ route('surats.edit', $surat->id) }}" class="button edit">Edit/Ganti File</a>
            </div>
        </div>
    </div>
</body>
</html>
