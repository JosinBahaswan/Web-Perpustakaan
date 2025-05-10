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
        <style>
            body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #3498db;
            margin-top: -100px;
        }

        h1, p {
            opacity: 0;
            transform: translateY(-50%);
            animation: fadeInUp 1s ease-out forwards, scaleUp 0.5s ease-out forwards;
            font-size: 2em;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleUp {
            to {
                transform: scale(1);
            }
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            width: 100%;
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
        
            <div class="container">
                <h1>Sukses Peminjaman</h1>
                <p>Peminjaman berhasil diajukan. Terima kasih!</p>
            </div>
        
        <!-- Feather icon -->
        <script>
            feather.replace();
        </script>

</body>
</html>
