    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My App</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <div id="app">
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
        <div class="main-wrapper">
            <div class="main-content">
            <div class="container">
                <form method="post" action="{{ route('Perpustakaans.store') }}" method="POST" enctype="multipart/form-data">
                <!-- <form action="{{ route('Perpustakaans.store') }}" method="POST" enctype="multipart/form-data"> -->
                @csrf
                <div class="card mt-5">
                    <div class="card-header">
                    <h3>New Record</h3>
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
                        <input type="text" class="form-control" name="judul" value="{{ old('judul') }}" placeholder="#judul">
                        </div>
                        <div class="mb-3">
                        <label class="form-label">penulis</label>
                        <input type="text" class="form-control" name="penulis" value="{{ old('penulis') }}"  placeholder="penulis">
                        </div>
                        <div class="mb-3">
                        <label class="form-label">gambar</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                            
                            <!-- error message untuk title -->
                            @error('gambar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" value="{{ old('price') }}"  placeholder="Price">
                        </div>
                        <div class="mb-3">
                        <label class="form-label">jumlah</label>
                        <input type="text" class="form-control" name="jumlah" value="{{ old('jumlah') }}"  placeholder="jumlah">
                        </div>
                    </div>
                    <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </body>
    </html>