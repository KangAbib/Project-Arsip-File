<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @include('layouts.sidebar')
        <div class="main-content">
            <div class="about-content">
                <h1>About</h1>
                <img src="{{ asset('img/foto 1.png') }}" alt="Your Photo">
                <p>Aplikasi ini dibuat oleh:</p>
                <p>Nama: Ahmad Khabib Balloh</p>
                <p>Prodi: D3-MI PSDKU Kediri</p>
                <p>NIM: 2231730136</p>
                <p>Tanggal: 10 Juli 2024</p>
            </div>
        </div>
    </div>
</body>
</html>
