<!-- halaman.blade.php -->

@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Admin Site</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
             
             <!-- Small boxes (Stat box) -->
             <div class="row">
             @can('view_dashboard')
             <div class="col-12" >
                <a href="{{ route('user.user.create')}}" class="btn btn-dark" >Tambah Data</a>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Siswa</h3>

                        <div class="card-tools row">
                            <form action="/halaman/nameSearch" method="get" class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="nameSearch" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <form action="/halaman/classFilter" method="get" class="input-group input-group-sm" style="width: 150px;">
                                <select type="text" name="classFilter" class="form-control float-right" placeholder="Search">
                                    <option value="" selected>Class</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Class</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td> {{$d->name}} </td>
                                    <td> {{$d->email}} </td>
                                    <td> {{$d->class}} </td>
                                    <td>
                                        <a href="{{ route('user.user.edit', ['id' => $d->id]) }}" class="btn btn-dark"><i class="fas fa-pen"></i> Edit</a>
                                    </td>
                                </tr>                               
                                <!-- /.modal -->
                                @endforeach

                            </tbody>
                        </table>
                        
                    </div>
                    <!-- /.card-body -->
                    
                </div>
                <!-- /.card -->
               
             </div>
             @endcan
               
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        @can('view_card')
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Isi Biodata</h5>
              <p class="card-text">Lengkapi data dirimu disini!</p>
              <a href="{{route('user.form')}}" class="btn btn-dark">Mulai isi</a>
            </div>
          </div>
          <br>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Kontak Guru BK mu</h5>
              <p class="card-text">Ingin Konsultasi? lihat kontak guru bk kamu</p>
              <a href="#" class="btn btn-dark">Lihat Kontak</a>
            </div>
          </div>
          <br>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Ikuti Tes Gaya Belajar</h5>
              <p class="card-text">Tes gaya belajar kamu</p>
              <a href="" class="btn btn-dark">Ikuti Tes</a>
            </div>
          </div>
        @endcan

        @can('view_table_data_siswa')

        <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Data Siswa</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($siswa as $i)
      
                      @endforeach
                      <tr>
                          <td style="width: 100px; object-fit: cover;">
                              <img src="{{ asset('storage/'.$i->gambar) }}" alt="{{ $i->nama }}" width="80">
                          </td>
                          <td><a href="siswa/{{ $i->id }}">{{ $i->nama }}</a></td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
            
        @endcan
    </section>
    <!-- /.content -->
</div>
@endsection
