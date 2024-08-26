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
        @if ( $result2->photo )
          <img src="{{ asset('storage/' . $result2->photo) }}" class="border border-dark rounded" alt="User Image" style="height: 200px; width: 200px; object-fit: cover; object-position: center;">
        @else 
          <img src="{{ asset('lte/dist/img/profil1.png') }}" class="border border-dark rounded" alt="User Image" style="height: 200px; width: 200px; object-fit: cover; object-position: center;">
        @endif
        <h2 class="m-2">
            {{ $result2->nama_lengkap }} 
        </h2>
      </div>
  
      <section class="row justify-content-center" style="column-gap: 10px">
        
          <!-- .card -->
          <div class="col-md-6">
            <div class="card mx-2">
              
              <div class="card-body p-3">
                <p>
                  <b>
                    Detail User
                  </b>
                </p>
    
                <div>
                  {{-- data guru --}}
                  
                  <p>Jabatan : {{ $guru->jabatan }}</p>
                  <p>Jenis Kelamin : 
                    @if ($result2->jenis_kelamin == 'perempuan')
                      Perempuan
                    @else
                      Laki-laki
                    @endif
                  </p>
                  
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
  
    <!-- Main content -->
    <div class="container">
  
      <div class="d-flex flex-column align-items-center text-center mb-3">
        @if ( $result->photo )
          <img src="{{ asset('storage/' . $result->photo) }}" class="border border-dark rounded" alt="User Image" style="height: 200px; width: 200px; object-fit: cover; object-position: center;">
        @else 
          <img src="{{ asset('lte/dist/img/profil1.png') }}" class="border border-dark rounded" alt="User Image" style="height: 200px; width: 200px; object-fit: cover; object-position: center;">
        @endif
        <h2 class="m-2">
            {{ $result->nama_lengkap }} 
        </h2>
      </div>
  
      <section class="row justify-content-center" style="column-gap: 10px">
        
          {{-- .card --}}
          <div class="col-md-6">
            <div class="card mx-2">
              
              <div class="card-body p-3">
                <p>
                  <b>
                    Detail Umum User
                  </b>
                </p>
    
                <div>
                  {{-- data pribadi siswa --}}
                  
                  <p>Kelas : {{ $siswa->kelas }}</p>
                  <p>Jurusan : {{ $jurusan->jurusan }}</p>
                  <p>Jenis Kelamin : {{ $result->jenis_k }}</p>
                  
                  @if ($bio)
                    <p>TTL : {{ $bio->tempat_lahir }}, {{ $bio->tanggal_lahir }}</p>
                  @endif
                  <a href="{{ route('user.cetak-pdf', ['id' => $id])}}?export=pdf" class="btn btn-dark mb-3" >Cetak PDF</a>
                </div>
                
              </div>
              {{-- /.card-body --}}
  
              @if ($bio == null)    
                <div class="text-center card-footer">   
                  <b>
                    Siswa belum memasukkan biodata lainnya
                  </b>
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