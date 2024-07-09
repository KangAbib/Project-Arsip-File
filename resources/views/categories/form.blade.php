<!-- resources/views/categories/form.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($category) ? 'Edit' : 'Tambah' }} Kategori Surat</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .container {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 200px;
            background-color: #f0f0f0;
            padding: 20px;
            box-sizing: border-box;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
            box-sizing: border-box;
        }
        form div {
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .button {
            padding: 10px;
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        @include('layouts.sidebar')
        <div class="main-content">
            <h1>{{ isset($category) ? 'Edit' : 'Tambah' }} Kategori Surat</h1>
            <form method="POST" action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}">
                @csrf
                @if(isset($category))
                    @method('PUT')
                    <div>
                        <label>ID (Auto Increment)</label>
                        <input type="text" value="{{ $category->id }}" disabled>
                    </div>
                @endif
                <div class="unik2">
                    <label>Nama Kategori</label>
                    <input type="text" name="name" value="{{ isset($category) ? $category->name : '' }}" required>
                </div>
                <div>
                    <label>Keterangan</label>
                    <textarea name="description" required>{{ isset($category) ? $category->description : '' }}</textarea>
                </div>
                <div class="actions">
                    <button type="button" class="button" onclick="window.location='{{ route('categories.index') }}'"><< Kembali</button>
                    <button type="submit" class="button">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
