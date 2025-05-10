<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tentang Kami - Perpustakaan Qu</title>

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

    <!-- Tambahkan CSS atau script lainnya di sini -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        } */

        /* Tambahkan gaya untuk section jika diperlukan */
        section {
            margin-top: 70px;
            font-size: medium;
            padding: 20px;
            color: #000;
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            /* position: fixed; */
            bottom: 0;
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
            <a href="{{ route('about') }}">Tentang kami</a>
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

    <section id="about" class="about">
            <h2><span>Tentang</span> Kami</h2>
            <div class="row">
                <div class="content">
                    <h3>Kenapa milih kami</h3>
                    <p>
                    Selamat datang di Perpustakaan Qu, sebuah tempat di mana pengetahuan dan imajinasi bersatu untuk membentuk pengalaman belajar yang tak terlupakan. Kami memahami bahwa akses terhadap informasi adalah kunci untuk pertumbuhan pribadi dan perkembangan intelektual. Oleh karena itu, kami dengan bangga menyajikan layanan perpustakaan terbaik untuk mendukung perjalanan pembelajaran dan eksplorasi Anda.
                    </p>
                    <br>
                    <p>
                    Visi kami adalah menjadi pusat unggulan bagi para pencari pengetahuan, tempat di mana setiap individu dapat mengeksplorasi, belajar, dan berkembang secara pribadi dan profesional. Melalui koleksi sumber daya yang kaya dan beragam, kami berkomitmen untuk memberikan layanan perpustakaan yang memenuhi berbagai kebutuhan pembelajaran.
                    </p>
                </div>
            </div>
            <br>
            <br>
            <h2><span>Visi</span> Misi</h2>
            <div class="row">
                <div class="content">
                    <h3>Visi dan Misi kami</h3>
                    <p>1. Menyediakan Akses Terbuka: Kami mempercayai bahwa pengetahuan seharusnya dapat diakses oleh semua orang. Oleh karena itu, kami menyediakan koleksi sumber daya yang dapat diakses secara bebas dan mudah oleh masyarakat umum.</p>
                    <p>2. Mendukung Pembelajaran: Kami menyediakan berbagai sumber daya pembelajaran, mulai dari buku cetak hingga e-book, jurnal ilmiah, dan sumber daya multimedia, untuk membantu Anda dalam perjalanan pembelajaran Anda.</p>
                    <p>3. Mendorong Inovasi: Kami merupakan tempat di mana ide-ide dan imajinasi berkembang. Dengan mengadakan berbagai kegiatan dan acara inovatif, kami ingin mendorong kreativitas dan penemuan baru.</p>
                    <p>4. Memupuk Komunitas Pembelajar: Kami memahami pentingnya kolaborasi dan pertukaran ide. Oleh karena itu, kami menciptakan lingkungan yang ramah dan mendukung untuk memupuk komunitas pembelajar yang saling mendukung.</p>
                    <p>5. Mengikuti perkembangan Teknologi: Kami berkomitmen untuk selalu mengikuti perkembangan teknologi guna menyediakan layanan perpustakaan yang modern dan efisien.</p>
                    <br><br><br><br><br><br>
                    <h3>Join:</h3>
                    <p>Bergabunglah dengan kami di Perpustakaan Qu, tempat di mana pengetahuan tak hanya diakses, tetapi juga dihargai dan diperkaya melalui pengalaman pembelajaran yang memikat. Sama seperti buku-buku di rak perpustakaan kami, mari bersama-sama membuka lembaran baru dalam perjalanan pengetahuan dan imajinasi Anda.</p>
                </div>
            </div>
        </section>

    <!-- Script untuk menggantikan ikon menggunakan feather-icons -->
    <script>
        feather.replace();
    </script>
</body>
</html>
