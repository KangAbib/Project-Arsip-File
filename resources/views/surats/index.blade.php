<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @include('layouts.sidebar')
        <div class="main-content">
            <h1>Arsip Surat</h1>
            <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
            <div class="search-bar">
                <form method="GET" action="{{ route('surats.index') }}" style="display: flex; align-items: center;">
                    <input type="text" name="search" placeholder="Cari surat..." />
                    <button type="submit">Cari!</button>
                </form>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nomor Surat</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Waktu Pengarsipan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surats as $surat)
                        <tr>
                            <td>{{ $surat->nomor_surat }}</td>
                            <td>{{ $surat->category ? $surat->category->name : 'Kategori tidak ditemukan' }}</td>
                            <td>{{ $surat->judul }}</td>
                            <td>{{ $surat->waktu_pengarsipan }}</td>
                            <td>
                                <div class="actions">
                                    <form action="{{ route('surats.destroy', $surat->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus arsip surat ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button hapus">Hapus</button>
                                    </form>
                                    <a href="{{ route('surats.download', $surat->id) }}" class="button unduh">Unduh</a>
                                    <a href="{{ route('surats.view', $surat->id) }}" class="button lihat">Lihat</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('surats.create') }}" class="button arsipkan">Arsipkan Surat..</a>
        </div>
    </div>
</body>
</html>
