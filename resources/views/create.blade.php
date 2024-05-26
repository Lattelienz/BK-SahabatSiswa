@extends('layout.main')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Tambah User</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.Content Header -->

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">

        <div class="col-md-5">

          <!-- general form elements -->
          <div class="card card-primary">
            
            <div class="card-header d-flex">
              <h3 class="card-title">Form Tambah User</h3>
            </div>
            <!-- /.card-header -->
            
            <!-- form start -->
            <div class="card-body">
                  <form action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" class="form-control" id="nama" placeholder="Masukkan nama">
                      @error('nama_lengkap')
                        <small>{{ $message }}</small>
                      @enderror
                    </div>

                    <div class="form-group nis">
                      <label for="nis">NIS</label>
                      <input type="text" name="NIS" class="form-control" id="nis" placeholder="Masukkan NIS">
                      @error('NIS')
                        <small>{{ $message }}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email">
                      @error('email')
                        <small>{{ $message }}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      @error('password')
                        <small>{{ $message }}</small>
                      @enderror
                    </div>

                    <!-- select -->
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" class="form-control" id="level" onchange="changeElement()">
                            <option>Admin</option>
                            <option>Siswa</option>
                            <option>Guru</option>
                        </select>
                    </div>
                    
                    <!-- select -->
                    <div class="form-group jurusan">
                        <label for="jurusan">Jurusan</label>
                        <select name="jurusan" class="form-control" id="jurusan">
                            <option value="1">Pengembangan Perangkat Lunak dan Gim</option>
                            <option value="2">Pekerjaan Sosial</option>
                            <option value="3">Teknik Kimia Industri</option>
                            <option value="4">Teknik Furnitur</option>
                            <option value="5">Broadcasting dan Film</option>
                            <option value="6">Desain Komunikasi Visual</option>
                            <option value="7">Teknik Kimia Industri</option>
                        </select>
                    </div>

                    <!-- select -->
                    <div class="form-group kelas">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" class="form-control" id="kelas">
                            <option>10</option>
                            <option>10 A</option>
                            <option>10 B</option>
                            <option>11</option>
                            <option>11 A</option>
                            <option>11 B</option>
                            <option>12</option>
                            <option>12 A</option>
                            <option>12 B</option>
                            <option>13</option>
                        </select>
                    </div>

                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Submit</button>
                  </div>
                  
            </div>
            <!-- /.card -->
  
              
            <!--/.col (left) -->
          </div>
          </form>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>

</div>
  <!-- /.content -->
  
<script>

document.addEventListener('DOMContentLoaded', function() {
    changeElement();
});

function changeElement() {
  var select = document.getElementById('level');
  var hide_nis_kelas = document.querySelectorAll('.nis, .kelas');
  var hide_siswa = document.querySelectorAll('.nis, .kelas, .jurusan');
  var nis = document.getElementById('nis');
  var kelas = document.getElementById('kelas');
  var jurusan = document.getElementById('jurusan');
    
  if (select.value === 'Admin') {
    nis.disabled = true;
    kelas.disabled = true;
    jurusan.disabled = true;
    hide_siswa.forEach(function(hide){
      hide.style.display = 'none';
    });
  }
  
  if (select.value === 'Siswa') {
    nis.disabled = false;
    kelas.disabled = false;
    jurusan.disabled = false;
    hide_siswa.forEach(function(hide){
      hide.style.display = 'block';
    });
  }

  if (select.value === 'Guru') {
    nis.disabled = true;
    kelas.disabled = true;
    jurusan.disabled = false;
    hide_nis_kelas.forEach(function(hide){
      hide.style.display = 'none';
    });
    document.querySelector('.jurusan').style.display = 'block';
  }
}

</script>

@endsection
