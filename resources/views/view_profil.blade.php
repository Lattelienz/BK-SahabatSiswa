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
            {{ $siswa->nama_lengkap }} 
        </h2>
      </div>
  
      <section class="row justify-content-center" style="column-gap: 10px">
        
        
          <!-- .card -->
          <div class="card col-md-6 mx-2">
            
            <div class="card-body p-3">
              <p>
                <b>
                  Detail Umum User
                </b>
              </p>
  
              <div class="col-6">
                {{-- data pribadi siswa --}}
                
                <p>Kelas : {{ $siswa->kelas }}</p>
                <p>Jurusan : {{ $jurusan->jurusan }}</p>
                <p>Jenis Kelamin : {{ $bio->jenis_k }}</p>
                <p>TTL : {{ $bio->tempat_lahir }}, {{ $bio->tanggal_lahir }}</p>
              </div>
              
            </div>
            <!-- /.card-body -->
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
  
      </section>
  
    </div>
</div>
<!-- /.content -->

@endsection