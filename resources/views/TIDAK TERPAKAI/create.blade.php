<!-- perpustakaans/users/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Anggota</h2>
        <form action="{{ url('/admin/users/store') }}" method="POST">
            @csrf
            <!-- Form tambah anggota -->
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <!-- Tambahkan input lain sesuai kebutuhan -->

            <button type="submit" class="btn btn-primary">Tambah Anggota</button>
            <a href="{{ url('/admin/users') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-bEYsTzGBf08kAgDDnA8ZQac7fCH2GR6ZOlHfY5Y8KA8KvBy+8eT9Y8CjpQg2BMq" crossorigin="anonymous"></script>
</body>
</html>
