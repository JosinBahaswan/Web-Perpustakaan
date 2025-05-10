<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Koleksi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet"
    />

    <!-- Feather Icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="perpustakaan.css" />
</head>
<body>
    <!-- navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">Perpustakaan <span>Qu</span></a>
        
        <div class="navbar-nav">
            <a href="http://127.0.0.1:8000/perpustakaan">home</a>
            <a href="{{ route('about') }}">tentang kami</a>
            <a href="#">Pinjam</a>
            <a href="{{ route('koleksi') }}">Koleksi</a>
        </div>
        
        <div class="navbar-extra">
            @if(Auth::check())
                <div class="navbar-login-info">
                    <span>Welcome, {{ Auth::user()->name }}</span>
                    <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endif
            
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- navbar end -->
<!-- resources/views/peminjaman/user_index.blade.php -->

<h1>Form Peminjaman Buku</h1>

<form action="{{ route('peminjaman.store') }}" method="post">
    @csrf
    <label for="id_buku">Pilih Buku:</label>
    <select name="id_buku" id="id_buku">
        @foreach ($buku as $buku)
            <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
        @endforeach
    </select>

    <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
    <input type="date" name="tanggal_pengembalian">

    <button type="submit">Pinjam Buku</button>
</form>

<script src="script.js"></script>
</body>
</html>