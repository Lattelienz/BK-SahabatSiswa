<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login BK</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <style>
    .background {
      background-image: url('/lte/dist/img/smkn-2-bg.jpg');
      background-position: center;
      max-width: 100%;
      
    } 
  </style>
</head>
<body class="background hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-header text-center">
      <a href="{{ route('login') }}" class="h1">
      <img src="lte/dist/img/bk-banner-1.jpg" alt="banner" class="col-12">
      </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Masukkan Email dan Password</p>

      <form action="{{ route('login-proses') }}" method="post">
        @csrf
        @error('email')
        <small>{{ $message }}</small>
        @enderror
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('password')
        <small>{{ $message }}</small>
      @enderror
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        {{-- <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Username
              </label>
            </div>
          </div>
        </div> --}}
        <!-- /.col -->
        <div class="col-12">
          <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </div>
        <!-- /.col -->
      </form>

      <p class="mb-1 mt-2 text-center">
        <a href="{{route('home')}}" class="">Kembali</a>
      </p>
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<!-- Sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- popup jika gagal login -->
@if ($message = Session::get('failed'))
    <script>
        Swal.fire({
          icon: "error",
          title: "Email atau Password Salah",
          text: ('{{ $message }}'),
        });
    </script>
@endif

@if ($message = Session::get('success'))
    <script>
        Swal.fire('{{ $message }}');
    </script>
@endif

</body>
</html>
