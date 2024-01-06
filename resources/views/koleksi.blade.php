
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
        <a href="#about">tentang kami</a>
        <a href="#collection">Koleksi</a>
    </div>

    <div class="navbar-extra">
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>
    </nav>
    <!-- navbar end -->

                <!-- koleksi buku -->
        <!-- Section koleksi buku -->
    <section id="koleksi" class="koleksi">
        <h2><span>Koleksi</span> Buku</h2>

        <div class="row">
        @foreach($perpustakaans as $perpustakaan)
            <div class="book">
                <img src="{{ asset('storage/storage/'.$perpustakaan->gambar)}}" alt="{{ $perpustakaan->judul}}" />
                <h3>{{ $perpustakaan->judul }}</h3>
                <p>{{ $perpustakaan->penulis }}<div>
                        <a href="#" class="cta" onclick="showPopup()">Pinjam</a>
                    </div>
            </div>
        @endforeach
        </div>
    </section>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="hidePopup()">&times;</span>
            <h2>Peminjaman Buku</h2>
            <br>
            <form>
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required>
                </div>
    
                <div class="form-group">
                    <label for="nim">NIM:</label>
                    <input type="text" id="nim" name="nim" required>
                </div>
    
                <div class="form-group">
                    <label for="tanggal">Tanggal Peminjaman:</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </div>
    
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    
    <script src="script.js"></script>
</body>
</html>