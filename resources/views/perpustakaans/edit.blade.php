<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta penulis="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div id="app">
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
                            <a class="nav-link" href="{{ asset('http://127.0.0.1:8000/Perpustakaans#') }}">Data Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:8000/admin/users">List Anggota</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:8000/admin">Daftar Peminjam</a>
                        </li>
                    </ul>

                    @guest
                        <!-- Show login button if the user is not logged in -->
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        </ul>
                    @else
                        <!-- Show user information and logout button if the user is logged in -->
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <span class="nav-link">{{ Auth::user()->name }}</span>
                            </li>
                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-light">Logout</button>
                                </form>
                            </li>
                        </ul>
                    @endguest
                </div>
            </div>
        </nav>
        <!-- navbar end -->
    <div class="main-wrapper">
        <div class="main-content">
        <div class="container">
        <form method="post" action="{{ route('Perpustakaans.update', $perpustakaan->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card mt-5">
                <div class="card-header">
                    <h3>Edit Record</h3>
                </div>
                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <div class="alert-title"><h4>Whoops!</h4></div>
                        There are some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div> 
                @endif

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="mb-3">
                    <label class="form-label">judul</label>
                    <input type="text" class="form-control" name="judul" value="{{ old('judul', $perpustakaan->judul) }}" placeholder="#judul">
                </div>
                <div class="mb-3">
                    <label class="form-label">penulis</label>
                    <input type="text" class="form-control" name="penulis" value="{{ old('penulis', $perpustakaan->penulis) }}"  placeholder="penulis">
                </div>
                    <div class="mb-3">
                    <label class="form-label">gambar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" placeholder="gambar" >
                        
                        <!-- error message untuk title -->
                        @error('gambar')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                <div class="mb-3">
                    <label class="form-label">ISBN</label>
                    <input type="text" class="form-control" name="ISBN" value="{{ old('ISBN', $perpustakaan->ISBN) }}"  placeholder="ISBN">
                </div>
                <div class="mb-3">
                    <label class="form-label">jumlah</label>
                    <input type="text" class="form-control" name="jumlah" value="{{ old('jumlah', $perpustakaan->jumlah) }}"  placeholder="jumlah">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
</body>
</html>