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
          <div class="card card-dark">
            
            <div class="card-header d-flex">
              <h3 class="card-title">Form Tambah User</h3>
            </div>
            <!-- /.card-header -->
            
            <!-- form start -->
            <form action="{{ route('user.store') }}" method="POST">
              <div div class="card-body">
                @csrf

                <div class="form-group nama">
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
                <div class="form-group jabatan">
                    <label for="jabatan">Jabatan</label>
                    <select name="jabatan" class="form-control" id="jabatan">
                        <option>Guru BK</option>
                        <option>Guru umum</option>
                        <option>Guru kejuruan</option>
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
                        <option value="X">10</option>
                        <option value="X A">10 A</option>
                        <option value="X B">10 B</option>
                        <option value="XI">11</option>
                        <option value="XI A">11 A</option>
                        <option value="XI B">11 B</option>
                        <option value="XII">12</option>
                        <option value="XII A">12 A</option>
                        <option value="XII B">12 B</option>
                        <option value="XIII">13</option>
                    </select>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-dark">Submit</button>
              </div>
              
              </div>
            </form>
            <!-- /.card -->
  
              
            <!--/.col (left) -->
          </div>
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
    var admin = document.querySelectorAll('.nis, .kelas, .jurusan, .jabatan, .nama');
    var siswa = document.querySelectorAll('.nis, .kelas, .jurusan, .nama');
    var guru = document.querySelectorAll('.jurusan, .jabatan, .nama');
    var nis = document.getElementById('nis');
    var kelas = document.getElementById('kelas');
    var jurusan = document.getElementById('jurusan');
    var jabatan = document.getElementById('jabatan');
      
    if (select.value === 'Admin') {
      nis.disabled = true;
      kelas.disabled = true;
      jurusan.disabled = true;
      jabatan.disabled = true;
      nama.disabled = true;
      admin.forEach(function(hide){
        hide.style.display = 'none';
      });
    }
    
    if (select.value === 'Siswa') {
      nis.disabled = false;
      kelas.disabled = false;
      jurusan.disabled = false;
      nama.disabled = false;
      jabatan.disabled = true;
      siswa.forEach(function(hide){
        hide.style.display = 'block';
      });
      document.querySelector('.jabatan').style.display = 'none';
    }

    if (select.value === 'Guru') {
      nis.disabled = true;
      kelas.disabled = true;
      jurusan.disabled = false;
      jabatan.disabled = false;
      guru.forEach(function(hide){
        hide.style.display = 'block';
      });
      document.querySelector('.kelas').style.display = 'none';
      document.querySelector('.nis').style.display = 'none';
    }
  }

</script>

@endsection
