<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
            <div class="main-wrapper">
                <!-- <div class="container-fluid"> -->
                <div class="container-fluid">
                    <div class="card mt-5">
                    <div class="card-header">
                        <h3>PERPUS</h3>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <p>
                        <a class="btn btn-primary" href="{{ route('Perpustakaans.create') }}">NEW Record</a>
                        </p>
                        <form action="{{ route('Perpustakaans.index') }}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari judul..." name="search" value="{{ request('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                </div>
                            </form>
                        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>judul</th>
                            <th>penulis</th>
                            <th>gambar</th>
                            <th>ISBN</th>
                            <th>jumlah</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @forelse ($Perpustakaans as $perpustakaan)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $perpustakaan->id }}</td>
                                <td>{{ $perpustakaan->judul }}</td>
                                <td>{{ $perpustakaan->penulis }}</td>
                                <td><img src="{{ asset('storage/storage/'.$perpustakaan->gambar)}}" alt="{{ $perpustakaan->judul }}" style="max-width: 200px; max-height: 200px;"></td>
                                <td>{{ $perpustakaan->price }}</td>
                                <td>{{ $perpustakaan->jumlah }}</td>
                                <td>
                                    <a href="{{ route('Perpustakaans.edit', ['id' => $perpustakaan->id]) }}" class="btn btn-secondary btn-sm">edit</a>
                                    <a href="#" class="btn btn-sm btn-danger" onclick="
                                        event.preventDefault();
                                        if (confirm('Do you want to remove this?')) {
                                        document.getElementById('delete-row-{{ $perpustakaan->id }}').submit();
                                        }">
                                        delete
                                    </a>
                                    <a href="{{ route('Perpustakaans.show', ['id' => $perpustakaan->id]) }}" class="btn btn-info btn-sm">Show</a>
                                    <form id="delete-row-{{ $perpustakaan->id }}" action="{{ route('perpustakaans.destroy', ['id' => $perpustakaan->id]) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <form action="{{ route('Perpustakaans.index') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8">
                                    No record found!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-rEWEp8XrPx9szczp0r+E1FL3FmI95wvA9K10O/FfnI4CZNgDWt8wSjNha21V8Qn6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8CIhmKAoA60+BL1MBKcmf3xi6q2S8Vd55TC76zUJZ3hjNnRI4Jww2f+DpCA" crossorigin="anonymous"></script>
</body>
</html>