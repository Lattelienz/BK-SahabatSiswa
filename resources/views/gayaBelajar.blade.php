<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gaya Belajar</title>
      <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body>

    <div class="m-5 text-center">
        <h2 class="mb-4">Tes Gaya Belajar</h2>
        <p>Jawab pertanyaan dibawah dengan sungguh-sungguh sesuai dengan dengan perasaan kamu sekarang</p>
    </div>

    <form action="" method="post" class="w-100 d-flex justify-content-center">
        @csrf
        @method('post')
        <div class="container m-2">
            <ol class="list-unstyled d-flex flex-column">
                @foreach ($questions as $index => $question)
                    <div class="border rounded-lg w-100 mt-3 mb-3 shadow p-3">
                        <li class="mb-3">{{ $index + 1 }}. {{ $question->question }}...</li>
                        <li>
                            <input name="option[{{ $index }}]" value="a" type="radio" id="option1q{{ $index }}" required>
                            <label class="form-check-label" for="option1q{{ $index }}">&nbsp;{{ $question->option1 }}</label>
                        </li>
                        <li>
                            <input name="option[{{ $index }}]" value="b" type="radio" id="option2q{{ $index }}" required>
                            <label class="form-check-label" for="option2q{{ $index }}">&nbsp;{{ $question->option2 }}</label>
                        </li>
                        <li>
                            <input name="option[{{ $index }}]" value="c" type="radio" id="option3q{{ $index }}" required>
                            <label class="form-check-label" for="option3q{{ $index }}">&nbsp;{{ $question->option3 }}</label>
                        </li>
                    </div>
                @endforeach
            </ol>
            <div class="d-flex justify-content-between pb-5">
                <a class="text-dark" href="{{ route('user.dashboard') }}">Kembali ke dashboard?</a>
                <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
        </div>
    </form>

    <!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('lte/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
<!-- ebk -->
<script src="{{ asset('js/ebk.js') }}"></script>
{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>