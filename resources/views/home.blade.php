<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-BK | BK Sahabat Siswa</title>
    
    <!-- google-font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- local bootstrap style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>
<body>
    <header>

        <!-- navigation -->
        {{-- <nav class="md">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                Nama Website
            </a>
            <a href="#about">Tentang</a>
            <a href="#activity">Kegiatan</a>
            <a href="#contact">Kontak</a>
        </nav> --}}
        
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <!-- Logo di kiri -->
                <a class="navbar-brand" href="#">
                    <img src="lte/dist/img/logobkyes.png" alt="Logo" width="120" height="30" class="d-inline-block align-text-top">
                </a>
            </div>
            <a href="#about">Tentang</a>
                <a href="#activity">Kegiatan</a>
                {{-- <a href="#contact">Kontak</a> --}}
        </nav>

        <!-- main header with button -->
        <div class="m-header">
            <p class="sm">
                E-BK
                <span class="sm">
                    BK-SAHABAT SISWA
                </span>
            </p>
            <br>
            <button class="sm" onclick="window.location.href='{{ route('login')}}'">
                Masuk
            </button>
        </div>

    </header>

    <!-- gradient -->
    <div class="gradient"></div> <br>

    <!-- main content about the website -->
    <main class="sm container d-flex flex-column align-items-center">
        
        <section class="col-md-8">
            <h6 class="header" id="about">
                Apa itu e-BK?
            </h6>

            <p class="content" id="sm">
                BK (Bimbingan dan Konseling) adalah layanan yang membantu individu mengatasi masalah akademik, sosial maupun pribadi melalui bimbingan dan konseling untuk mencapai perkembangan optimal. 
            </p>
            <p class="content" id="sm">
                BK di sekolah bertujuan menampung masalah yang dihadapi siswa, sekaligus mendukung siswa dalam pengambilan keputusan dan pengembangan diri
            </p>
            <p class="content" id="sm">
                Karena itulah BK juga bisa disebut sebagai Sahabat Siswa
            </p>
    
            {{-- <p class="content" id="sm">
                E-BK adalah sebuah website rancangan kelompok 5 XI PPLG A. Kami memiliki tujuan yang berkaitan dengan latar belakang mengapa kami membuat website ini. 
            </p>
            
            <p class="content" id="sm">
                Jadi, selama kami bersekolah, kami merasa bahwa BK apalagi BK SMK Negeri 2 Banjarmasin masih belum memiliki sebuah software khusus untuk menangani pelayanan BK, seperti misalnya pengumpulan biodata yang masih secara manual. Oleh karenanya, kami ingin membuat software khusus untuk menangani semua hal yang berkaitan dengan BK. guru-guru BK SMK Negeri 2 Banjarmasin. 
            </p>
            
            <p class="content" id="sm">
                Selain mengatasi masalah tersebut, website kami juga menyediakan berbagai layanan yang dapat dinikmati oleh guru serta siswa juga, contohnya seperti guru dapat melihat perkembangan seorang siswa melalui website kami. Harapannya, website ini terus berkembang dan dapat memiliki fitur-fitur lainnya lagi.
            </p> --}}

        </section>

        <section class="row align-items-center justify-content-center">
            
            <div id="carouselExampleIndicators" class="carousel slide col-md-12 col-lg-6 h-100" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{ asset('img/photo_kegiatan1.jpg') }}" class="d-block w-100" alt="Technopark SMK Negeri 2">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('img/photo_kegiatan2.jpg') }}" class="d-block w-100" alt="Technopark SMK Negeri 2">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('img/photo_kegiatan3.jpg') }}" class="d-block w-100" alt="Technopark SMK Negeri 2">
                    </div>
                </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-md-8 col-lg-6">
                <h6 class="header" id="activity">
                    Kegiatan
                </h6>
        
                <p class="content" id="sm">
                    Bimbingan Konseling bertujuan untuk menyediakan ruang yang aman dan nyaman bagi konseli atau siswa, di mana mereka dapat mengekspresikan keluh kesah, kekhawatiran, dan masalah yang dihadapi. Melalui bimbingan yang empatik dan tanpa menghakimi, konselor membantu konseli menemukan solusi serta mendukung mereka dalam mencapai pengambilan keputusan dan pengembangan diri.
                </p>
            </div>

        </section>

        <section class="row align-items-center justify-content-center">
            <div class="">
            <center><h6 class="header mt-5" id="about">
                mengapa BK?
            </h6></center>
            <img src="{{ asset('img/ear.png') }}" alt="tes" height="250px" width="250px">
            <img src="{{ asset('img/lock.png') }}" alt="tes" height="250px" width="250px">
            <img src="{{ asset('img/sunflower.png') }}" alt="tes" height="250px" width="250px">
        </div>
        </section>

        {{-- <section class="row">
            <div class="">
                <h6 class="header" id="contact">
                    Kontak
                </h6>
            </div>
        <div class="row">
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('img/icon1.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Pak Aji</h5>
              <p class="card-text">Nama Lengkap</p>
              <a href="{{ route('login')}}" class="btn btn-dark">Lihat profil dan Konsultasi</a>
            </div>
          </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('img/icon2.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Bu Putri</h5>
              <p class="card-text">Nama Lengkap</p>
              <a href="{{ route('login')}}" class="btn btn-dark">Lihat profil dan Konsultasi</a>
            </div>
          </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('img/icon1.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Pak</h5>
              <p class="card-text">Nama Lengkap</p>
              <a href="{{ route('login')}}" class="btn btn-dark">Lihat profil dan Konsultasi</a>
            </div>
          </div>
    </div>

        </div>
        </section> --}}

                
        
               

            </div>

        </section>

    </main>

    <footer class="sm fs-6">
        Copyright &copy; BK-Sahabat Siswa, 2023-2024
        <a class="content" id="sm" href="https://smkn2-bjm.sch.id/">
            SMKN 2 Banjarmasin
        </a>
    </footer>

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>