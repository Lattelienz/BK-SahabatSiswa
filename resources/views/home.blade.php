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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- local bootstrap style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>
<body>
    <header>

        <!-- navigation -->
        <nav class="md">
            <a href="#about">Tentang</a>
            <a href="#activity">Kegiatan</a>
            <a href="#contact">Kontak</a>
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
        
        <section class="col-md-7">
            <h6 class="header" id="about">
                Apa itu e-BK?
            </h6>
    
            <p class="content" id="sm">
                E-BK adalah sebuah website rancangan kelompok 5 XI PPLG A. Kami memiliki tujuan yang berkaitan dengan latar belakang mengapa kami membuat website ini. 
            </p>
            
            <p class="content" id="sm">
                Jadi, selama kami bersekolah, kami merasa bahwa BK apalagi BK SMK Negeri 2 Banjarmasin masih belum memiliki sebuah software khusus untuk menangani pelayanan BK, seperti misalnya pengumpulan biodata yang masih secara manual. Oleh karenanya, kami ingin membuat software khusus untuk menangani semua hal yang berkaitan dengan BK. guru-guru BK SMK Negeri 2 Banjarmasin. 
            </p>
            
            <p class="content" id="sm">
                Selain mengatasi masalah tersebut, website kami juga menyediakan berbagai layanan yang dapat dinikmati oleh guru serta siswa juga, contohnya seperti guru dapat melihat perkembangan seorang siswa melalui website kami. Harapannya, website ini terus berkembang dan dapat memiliki fitur-fitur lainnya lagi.
            </p>

        </section>

        <section class="row justify-content-center">

            <div id="carouselExampleIndicators" class="carousel slide col-12" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{ asset('img/technopark_smkn2.jpeg') }}" class="d-block w-100" alt="Technopark SMK Negeri 2">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('img/technopark_smkn2.jpeg') }}" class="d-block w-100" alt="Technopark SMK Negeri 2">
                    </div>
                    <div class="carousel-item">
                    <img src="{{ asset('img/technopark_smkn2.jpeg') }}" class="d-block w-100" alt="Technopark SMK Negeri 2">
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

            <div class="col-md-5">

                <h6 class="header" id="activity">
                    Kegiatan
                </h6>
        
                <p class="content" id="sm">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non dolor porttitor, dignissim eros vel, consectetur justo. Curabitur neque ligula, accumsan vel enim non, convallis placerat metus. Integer laoreet urna odio, sed imperdiet magna euismod quis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus sollicitudin, nulla sit amet molestie semper, dui ex mollis odio, eu vestibulum orci magna eget risus. Duis sit amet viverra lectus. Suspendisse porttitor risus lacinia semper vestibulum. Sed aliquam blandit diam, maximus ultrices ipsum ultrices sed. Duis tempor a neque in consequat. Etiam eget consectetur lectus. Nulla accumsan lectus nec orci consectetur dapibus.
                </p>
                
            </div>

        </section>

        <section class="row">
            
            <div class="col-md-5">

                <h6 class="header" id="contact">
                    Kontak
                </h6>
        
                <p class="content" id="sm">
                    testing
                </p>

            </div>

        </section>

    </main>

    <footer>
        Copyright &copy; BK-Sahabat Siswa, 2023-2024
    </footer>

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>