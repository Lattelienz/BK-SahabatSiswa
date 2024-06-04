@extends('layout.main')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

          <h1 class="m-0">Profil</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="container">

    <div class="d-flex flex-column align-items-center text-center mb-3">
      <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" alt="Foto profil" style="width: 175px; border-radius: 1rem; border: 1px solid black">
      <h2 class="m-2">
        @if ($result->level == 'Siswa')
          {{ $siswa->nama_lengkap }} 
        @elseif ($result->level == 'Guru')
          {{ $guru->nama_lengkap }}
        @endif
      </h2>
    </div>

    <section class="row justify-content-center" style="column-gap: 10px">
      
      @if ($result->level == 'Siswa')
      
        <!-- .card -->
        <div class="col-md-6">
          <div class="card mx-2">
            
            <div class="card-body p-3">
              <a href="#" class="float-right">Edit Profile</a>
              <p>
                <b>
                  Detail Umum User
                </b>
              </p>
  
              <div>
                {{-- data pribadi siswa --}}
                
                <p>Kelas : {{ $siswa->kelas }}</p>
                <p>Jurusan : {{ $jurusan->jurusan }}</p>
                <p>Jenis Kelamin : {{ $siswa->jenis_k }}</p>
                @if ($bio)
                <p>TTL : {{ $bio->tempat_lahir }}, {{ $bio->tanggal_lahir }}</p>
                @endif
              </div>
              
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        <!-- .card -->
        {{-- <div class="card col-md mx-2">
          
          <!-- .card-body -->
          <div class="card-body p-3">
            <p class="">
              <b>
                Biodata siswa
              </b>
            </p>
    
            <p>KELAS : XI A</p>
            <p>JURUSAN : PPLG</p>
    
          </div>

        </div> --}}

      @elseif ($result->level == 'Guru')

        <!-- .card -->
        <div class="card col-md-6 mx-2">
          <!-- .card-body -->
          <div class="card-body p-3">
            <a href="#" class="float-right">Edit Profile</a>
            <p><b>Detail User</b></p>
            {{-- data pribadi siswa --}}
            
            <p>Jabatan : {{ $guru->jabatan }}</p>
            <p>Jurusan : {{ $jurusan->jurusan }}</p>

          </div>
          <!-- /.card-body -->
        </div>

      @endif

    </section>

  </div>
</div>
<!-- /.content -->
@endsection