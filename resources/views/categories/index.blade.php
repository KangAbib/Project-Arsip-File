<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Surat</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    <div class="container">
        @include('layouts.sidebar')
        <div class="main-content">
            <h1>Kategori Surat</h1>
            <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat. Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>
            <div class="search-bar">
                <form method="GET" action="{{ route('categories.index') }}" style="display: flex; align-items: center;">
                    <input type="text" name="search" placeholder="Cari kategori..." />
                    <button type="submit">Cari!</button>
                </form>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <div class="actions">
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button hapus">Hapus</button>
                                    </form>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="button edit">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('categories.create') }}" class="button">[ + ] Tambah Kategori Baru...</a>
        </div>
    </div>
</body>
</html>
