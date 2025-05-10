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

        <!-- Bootstrap 5 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Bootstrap 5 CSS -->
        <!-- Style -->
        <link rel="stylesheet" type="text/css" href="perpustakaan.css" />
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa; /* Set a light background color */
            /* color: #333; Set text color to a dark shade for better visibility */
            /* font-size: 18px; Increase the base font size */
            padding-top: 50px; /* Add top padding to move content down */
            margin: 0; /* Reset margin for body */
        }

        .content-wrapper {
            background-color: #6f42c1; /* Use the primary color as the background */
            padding: 40px; /* Add a bit more padding for content inside the wrapper */
            border-radius: 15px;
            margin-bottom: 30px; /* Add margin to separate from the next section */
        }

        form {
            font-size: 18px;
            max-width: 600px; /* Increase max-width for the form */
            margin: auto;
            background-color: #6f42c1; /* Set the background color of the form to purple */
            color: #fff; /* Set text color to white */
            padding: 30px; /* Increase padding for better spacing */
            border-radius: 15px;
            text-align: center; /* Center-align text within the form */
        }

        form label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2em; /* Keep label font size */
        }

        form input,
        form button {
            width: 100%;
            padding: 12px; /* Keep input and button padding */
            margin-bottom: 15px; /* Keep margin-bottom for better spacing */
            border: none;
            border-radius: 5px;
            font-size: 1em; /* Keep input and button font size */
        }

        form button {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            background-color: #17a2b8;
            color: #fff;
            cursor: pointer;
            display: block; /* Make the button a block-level element */
            margin: auto; /* Center the button horizontally */
        }

        form button:hover {
            background-color: #117a8b; /* Use a darker shade for button hover */
        }
        
    </style>
    </head>
    <body>
        <!-- navbar start -->
        <nav class="navbar">
            <a href="#" class="navbar-logo">Perpustakaan <span>Qu</span></a>
            
            <div class="navbar-nav">
                <a href="http://127.0.0.1:8000/perpustakaan">Home</a>
                <a href="{{ route('about') }}">Tentang Kami</a>
                <a href="http://127.0.0.1:8000/pinjam">Pinjam</a>
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
        
    <section id="about" class="about"><h2><span>Pinjam </span>Buku</h2>
        <div class="content-wrapper">
            
                <!-- Formulir Peminjaman -->
                <form action="{{ route('pinjam.submit') }}" method="post" class="needs-validation" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama :</label>
                        <input type="text" class="form-control" name="nama" required>
                        <div class="invalid-feedback">
                            Please enter your name.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nomor-anggota" class="form-label">Nomor Anggota :</label>
                        <input type="text" class="form-control" name="nomor_anggota">
                    </div>

                    <div class="mb-3">
                        <label for="judul-buku" class="form-label">Judul Buku :</label>
                        <input type="text" class="form-control" name="judul_buku" required>
                        <div class="invalid-feedback">
                            Please enter the book title.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal-peminjaman" class="form-label">Tanggal Peminjaman :</label>
                        <input type="date" class="form-control" name="tanggal_peminjaman" required>
                        <div class="invalid-feedback">
                            Please select the borrowing date.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal-pengembalian" class="form-label">Tanggal Pengembalian :</label>
                        <input type="date" class="form-control" name="tanggal_pengembalian" required>
                        <div class="invalid-feedback">
                            Please select the return date.
                        </div>
                    </div>
                    
                <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
                    
                </form>

                @if(session('success'))
                    <div style="color: green;">{{ session('success') }}</div>
                @endif
        </div>
    </section>
        
    <!-- Bootstrap 5 JS  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8Y+ua/2LlqDk8eR5ETHddv8GT+T3WAaU/3n7EJ2mI1ceF7d58ncRX2MZ+7da" crossorigin="anonymous"></script>
    <!-- Feather icon -->
    <script>
        feather.replace();
    </script>

</body>
</html>
