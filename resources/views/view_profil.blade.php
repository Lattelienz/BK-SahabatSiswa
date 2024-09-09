@extends('layout.main')

@section('content')

@if(Auth::user()->level == 'Siswa')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
  
            <h1 class="m-0">Profil guru</h1>
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
        <img src="{{ $result->photo ? asset('storage/' . $result->photo) : asset('lte/dist/img/profil1.png') }}" class="border border-dark rounded" alt="User Image" style="height: 200px; width: 200px; object-fit: cover; object-position: center;">
        <h2 class="m-2 font-weight-bold">
            {{ $result->nama_lengkap }} 
        </h2>
      </div>
  
      <section class="row justify-content-center" style="column-gap: 10px">
        
          <!-- .card -->
          <div class="col-md-6">
            <div class="card mx-2">
              
              <div class="card-body p-3">
                <h4 class="font-weight-bold">Detail User</h4>
    
                <div>
                  {{-- data guru --}}
                  
                  <p>Jabatan : {{ $guru->jabatan }}</p>
                  <p class="text-capitalize">Jenis Kelamin : {{ $result->jenis_kelamin }}</p>

                  {{-- <a href="https://wa.me/62{{ }}">Kontak guru BK</a> --}}
                  
                </div>
                
              </div>
              <!-- /.card-body -->
                
  
            </div>
          </div>
  
      </section>
  
    </div>
</div>
<!-- /.content -->

@elseif(Auth::user()->level == 'Guru')
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
  
    {{-- Main content --}}
    <div class="container">
  
      {{-- name and picture --}}
      <div class="d-flex flex-column align-items-center text-center mb-3">
        <img src="{{ $result->photo ? asset('storage/' . $result->photo) : asset('lte/dist/img/profil1.png') }}" class="border border-dark rounded" alt="User Image" style="height: 200px; width: 200px; object-fit: cover; object-position: center;">
        <h1 class="m-2 font-weight-bold">
          {{ $result->nama_lengkap }}
        </h1>
        @if ($bio)
          <h5>
            ({{ $bio->nama_panggilan }})
          </h5>
        @endif
      </div>
  
      <section class="row justify-content-center" style="column-gap: 10px">
        
        {{-- .card --}}
        <div class="col-md-6">
          <div class="card mx-2">
            
            <div class="card-body p-3">
              <p class="font-weight-bold">Detail Umum User</p>

              {{-- data pribadi siswa --}}
              <p>Kelas dan Jurusan : {{ $siswa->kelas }} {{ $jurusan->jurusan }}</p>
              <p class="text-capitalize">Jenis Kelamin : {{ $result->jenis_kelamin }}</p>

              @if ($siswa->gaya_belajar) 
                <p class="text-capitalize">Gaya Belajar : {{ $siswa->gaya_belajar }}</p>
              @endif
              
              @if ($bio)
                <p>TTL : {{ $bio->tempat_lahir }}, {{ \Carbon\Carbon::parse($bio->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}</p>
              @endif

              <button @disabled($bio == null) onclick="window.location.href='{{ route('user.cetak-pdf', ['id' => $id]) }}?export=pdf'" class="btn btn-dark mb-3" >Cetak PDF</button>
              
            </div>
            {{-- /.card-body --}}

            @if ($bio == null)
              <div class="text-center card-footer font-weight-bold">   
                Siswa belum memasukkan biodata lainnya
              </div>
            @endif

          </div>
        </div>
  
      </section>
  
    </div>
</div>
<!-- /.content -->
@endif

@endsection