<!-- resources/views/anggota/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Anggota</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anggota as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->nim }}</td>
                    <td>{{ $a->kelas }}</td>
                    <td>{{ $a->jurusan }}</td>
                    <td>{{ $a->tanggal_lahir }}</td>
                    <td>{{ $a->alamat }}</td>
                    <td>{{ $a->email }}</td>
                    <td>
                        <a href="{{ route('anggota.edit', $a->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('anggota.destroy', $a->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
