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
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    
    <style>
        @media (max-width: 768px) {
            nav.med {
                padding: 20px;
            }

            nav.med a{
                font-size: 17px;
            }
            
        }

        html {
            scroll-behavior: smooth;
        }
        
        body {
            font-family: "Inter", sans-serif;
            font-style: normal;
            background: black; 
        }

        main {
            color: white;
            margin: 0 2rem;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }
        
        nav div {
            display: flex; 
            gap: inherit; 
            flex-wrap: inherit; 
            justify-content: end;
        }

        nav {
            display: flex; 
            justify-content:space-between; 
            padding: 20px 5rem; 
            flex-wrap: wrap; 
            gap: 3vw;
            transition: padding 0.25s ease-in;
        }

        nav a {
            font-weight: 500;
            font-size: 20px;
            color: #313231;
            text-decoration: none;
            transition: font-size 0.25s ease-in;
            /* text-shadow: 2px 2px 4px rgba(0, 0, 0, 1); */
        }

        nav a:hover {
            color: rgba(49, 50, 49, 0.7);
        }

        header {
            display: flex;
            flex-direction: column;
            color: white;
            height: 100vh;
            background: url('{{ asset('img/WhatsApp Image 2023-11-06 at 09.35.13.jpeg') }}') no-repeat;
            background-size: cover;
            position: relative;
            /* text-shadow: 2px 2px 4px rgba(0, 0, 0, 1); */
        }
        
        .m-header {
            display: flex;
            flex-direction: column;
            text-align: center;
            justify-content: center;
            height: calc(100vh - 10vh);
            align-items: center;
        }

        .m-header p {
            display: flex; 
            flex-direction: column; 
            font-weight: 500; 
            font-size: 70px;
        }

        .m-header button {
            border-radius: 5px; 
            padding: 0.3rem 1.3rem; 
            font-size: 30px; 
            background: #99C1B7; 
            border: none;
        }
        
        .gradient {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 17%; /* Set the height of the gradient overlay */
            background: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.97));
        }

    </style>
</head>
<body style="margin: 0">
    <header>

        <!-- navigation -->
        <nav class="med">
            <a href="#">e-BK</a>
            <div>
                <a href="#about">Tentang</a>
                <a href="#">Kegiatan</a>
                <a href="#">Kontak</a>
            </div>
        </nav>
        
        <!-- main header with button -->
        <div class="m-header">
            <p>
                E-BK
                <span style="font-size: 40px;">
                    BK-SAHABAT SISWA
                </span>
            </p>
            <br>
            <button onclick="window.location.href='{{route('login')}}'" style="">
                Masuk
            </button>
        </div>

    </header>

    <!-- gradient -->
    <div class="gradient"></div> <br>

    <!-- main content about the website -->
    <main>
        <section id="about" class="col-7" style="text-align: center;">
            <p style="font-size: 40px;">
                Apa itu e-BK?
            </p>
    
            <p style="font-size: 20px; text-align: justify;">
                E-BK adalah sebuah website rancangan kelompok 5 XI PPLG A. Kami memiliki tujuan yang berkaitan dengan latar belakang mengapa kami membuat website ini. Jadi, selama kami bersekolah, kami merasa bahwa BK apalagi BK SMK Negeri 2 Banjarmasin masih belum memiliki sebuah software khusus untuk menangani pelayanan BK, seperti misalnya pengumpulan biodata yang masih secara manual. Oleh karenanya, kami ingin membuat software khusus untuk menangani semua hal yang berkaitan dengan BK. guru-guru BK SMK Negeri 2 Banjarmasin. Selain mengatasi masalah tersebut, website kami juga menyediakan berbagai layanan yang dapat dinikmati oleh guru serta siswa juga, contohnya seperti guru dapat melihat perkembangan seorang siswa melalui website kami. Harapannya, website ini terus berkembang dan dapat memiliki fitur-fitur lainnya lagi.
            </p>
        </section>
        <section class="col-5 offset-7" style="text-align: center;">
            <p style="font-size: 40px;">
                Kegiatan
            </p>
    
            <p style="font-size: 20px; text-align: justify;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non dolor porttitor, dignissim eros vel, consectetur justo. Curabitur neque ligula, accumsan vel enim non, convallis placerat metus. Integer laoreet urna odio, sed imperdiet magna euismod quis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus sollicitudin, nulla sit amet molestie semper, dui ex mollis odio, eu vestibulum orci magna eget risus. Duis sit amet viverra lectus. Suspendisse porttitor risus lacinia semper vestibulum. Sed aliquam blandit diam, maximus ultrices ipsum ultrices sed. Duis tempor a neque in consequat. Etiam eget consectetur lectus. Nulla accumsan lectus nec orci consectetur dapibus.
                <br><br>
                In varius massa pharetra, imperdiet risus ut, varius tortor. Nunc vitae interdum metus. Suspendisse ut massa vitae nisl sodales cursus ac sed lacus. In faucibus lectus eu convallis vehicula. In quis dolor mattis, varius nisl nec, pharetra neque. Nam id augue mauris. Suspendisse laoreet ligula ante, sed euismod justo feugiat a. Phasellus vehicula felis odio, in maximus nisl aliquam et. Pellentesque risus ex, tempus eget aliquam eu, ornare sed felis. Vestibulum sit amet sapien nec elit pellentesque placerat. Morbi quam urna, aliquet sed nulla sit amet, imperdiet interdum tellus. Sed vitae tellus vulputate, cursus tortor ac, aliquam dui. Curabitur at augue nec velit accumsan placerat. Mauris suscipit rutrum purus commodo imperdiet.
            </p>
        </section>
    </main>
</body>
</html>