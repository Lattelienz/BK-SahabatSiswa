@extends('layout.main')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="container">

    <div class="d-flex flex-column align-items-center text-center mb-3">
      <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" alt="llll" style="width: 175px; border-radius: 1rem; border: 1px solid black">
      <h2 class="m-2">{{ $siswa->nama }} {{-- Udin --}}</h2>
    </div>

    <section class="row justify-content-center" style="column-gap: 10px">
      
      <!-- .card -->
      <div class="card col-md-4 mx-2">
        
        <div class="card-body p-3">
          {{-- data sensitif --}}
          
          <p>KELAS : {{ $siswa->kelas }} {{-- XI A --}}</p>
          <p>JURUSAN : {{-- {{ $data->name }} --}} PPLG</p>
          <p>TTL : {{ $siswa->tempat_lahir }}, {{ $birthdate }} </p>
          
        </div>
        <!-- /.card-body -->
      </div>

      <!-- .card -->
      <div class="card col-md-6 mx-2">
        
        <div class="card-body p-3">
            
          <a href="{{ route('profile_edit', ['id' => $data->id]) }}" class="float-right">Edit Profile</a>
  
          <p>KELAS :{{-- {{ $data->class }} --}} XI A</p>
          <p>JURUSAN :{{-- {{ $data->name }} --}} PPLG</p>
  
        </div>
        <!-- /.card-body -->
      </div>

    </section>

  </div>
</div>
<!-- /.content -->
@endsection