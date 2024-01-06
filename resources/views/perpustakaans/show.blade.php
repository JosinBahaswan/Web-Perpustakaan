<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Perpustakaan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <!-- navbar start -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">ADMIN PERPUS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset ('http://127.0.0.1:8000/Perpustakaans#')}}">Data Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">List Anggota</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Daftar Peminjam</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- navbar end -->
    
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Detail Perpustakaan</h1>
                </div>
                <div class="card-body">
                    <img src="{{ asset('storage/storage/' . $perpustakaan->gambar) }}" alt="Perpustakaan Image" class="img-fluid mb-3">

                    <p><strong>Nama Perpustakaan:</strong> {{ $perpustakaan->nama }}</p>
                    <!-- Tambahkan informasi lainnya sesuai kebutuhan -->

                    <a href="{{ route('Perpustakaans.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>