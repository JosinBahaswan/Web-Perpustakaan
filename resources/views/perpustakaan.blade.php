<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Perpustakaan</title>

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
                <a href="#">home</a>
                <a href="#">tentang kami</a>
                <a href="#">Pinjam</a>
                <a href="{{ route('koleksi') }}">Koleksi</a>
            </div>
            <div class="navbar-extra">
                <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
            </div>
        </nav>
        <!-- navbar end -->

        <!--hero section-->
        <section class="hero" id="home">
            <div class="kotak-hero">
                <main class="content">
                <h1>online<span> Library</span></h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati,
                    nisi.
                </p>
                <a href="#" class="cta">Daftar</a> <a href="#" class="cta2">Login</a>
                <!--cta = call to action -->
                </main>
            </div>
        </section>

        <!--section about-->
        <section id="about" class="about">
            <h2><span>tentang</span>kami</h2>
            <div class="row">
                <div class="about-img">
                    <img src="{{ asset('images/book2.jpg') }}" alt="tentang kami" />
                </div>
                <div class="content">
                    <h3>Kenapa milih kami</h3>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam,
                        libero eum. Temporibus aut est quaerat!
                    </p>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia
                        commodi sunt laudantium distinctio nam quaerat delectus dolorum
                        possimus quae a.
                    </p>
                </div>
            </div>
        </section>
        <!--section about end-->

            <!-- koleksi buku -->
            <!-- Section koleksi buku -->
        <section id="koleksi" class="koleksi">
            <h2><span>Koleksi</span> Buku</h2>
                <div class="row">
                @foreach($Perpustakaans as $perpustakaan)
                    <div class="book">
                        <img src="{{ asset('storage/storage/'.$perpustakaan->gambar)}}" alt="{{ $perpustakaan->judul}}" />
                        <h3>{{ $perpustakaan->judul }}</h3>
                        <p>{{ $perpustakaan->penulis }}</p>
                    </div>
                @endforeach
                </div>
            <!-- Add more books as needed -->
        </section>

        <!-- Peminjaman section -->
        <section id="peminjaman" class="peminjaman">
        <h2><span>Peminjaman</span> Buku</h2>
            <div class="row">
                <div class="form-container">
                <form id="borrow-form">
                    <label for="book-title">Judul Buku:</label>
                    <input type="text" id="book-title" name="book-title" required><br>

                    <label for="borrower-name">Nama Peminjam:</label>
                    <input type="text" id="borrower-name" name="borrower-name" required><br>

                    <button type="submit" class="cta">Pinjam</button>
                </form>
                </div>
            </div>
        </section>

        <!-- Feather icon -->
        <script>
            feather.replace();
        </script>
    </body>
</html>
