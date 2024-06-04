<!-- halaman.blade.php -->

@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>

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
             @can('view_dashboard') <!-- Cek izin untuk melihat dashboard -->
             <div class="col-12" >
                <a href="{{ route('user.create')}}" class="btn btn-dark mb-3" >Tambah Data</a> <!-- Tombol untuk menambahkan data -->
                <div class="card">
                    
                    <!-- .card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Data Siswa</h3> <!-- Judul card untuk data siswa -->
    
                        <div class="card-tools row">
                            <form action="{{ route('user.search') }}" method="get" class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="nameSearch" class="form-control float-right" placeholder="Search"> <!-- Form pencarian berdasarkan nama -->
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <form action="/halaman/classFilter" method="get" class="input-group input-group-sm" style="width: 150px;">
                                <select type="text" name="classFilter" class="form-control float-right" placeholder="Search"> <!-- Form filter berdasarkan kelas -->
                                    <option value="" selected>Class</option>
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

                    @if (session('result') !== null)
                    <!-- .card-body -->
                    <div class="card-body table-responsive p-0">
                        <!-- Tabel untuk $result -->
                        <table class="table table-hover text-nowrap">
                            <!-- Header tabel -->
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!-- Isi tabel -->
                            <tbody>
                                <!-- Loop melalui $result -->
                                @foreach ($result as $d)
                                <tr>
                                    <!-- Menampilkan nomor urut -->
                                    <td> {{$loop->iteration}} </td>
                                    <!-- Menampilkan email pengguna -->
                                    <td> {{$d->email}} </td>
                                    <!-- Menampilkan level pengguna -->
                                    <td> {{$d->level}} </td>
                                    <!-- Tombol Edit dan Delete -->
                                    <td class="d-flex" style="grid-gap: 10px">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('user.edit', ['id' => $d->id]) }}" class="btn btn-dark"><i class="fas fa-pen"></i> Edit</a>
                                        <!-- Form Delete -->
                                        <form action="{{ route('user.delete', ['id' => $d->id]) }}" method="POST">
                                            <!-- CSRF token untuk melindungi form dari serangan CSRF -->
                                            @csrf
                                            <!-- Mengubah method form menjadi DELETE sesuai dengan konvensi RESTful -->
                                            @method('delete')
                                            <!-- Tombol Delete -->
                                            <button type="submit" class="btn btn-dark"><i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                                   
                                <!-- Akhir dari loop -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Akhir dari .card-body -->
                @else
                    <!-- .card-body -->
                    <div class="card-body table-responsive p-0">
                        <!-- Tabel untuk $data -->
                        <table class="table table-hover text-nowrap">
                            <!-- Header tabel -->
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!-- Isi tabel -->
                            <tbody>
                                <!-- Loop melalui $data -->
                                @foreach ($data as $d)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td> {{$d->email}} </td>
                                    <td> {{$d->level}} </td>
                                    <td class="d-flex" style="grid-gap: 10px">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('user.edit', ['id' => $d->id]) }}" class="btn btn-dark"><i class="fas fa-pen"></i> Edit</a>
                                        <!-- Form Delete -->
                                        <form action="{{ route('user.delete', ['id' => $d->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-dark"><i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>                               
                                <!-- Akhir dari loop -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Akhir dari .card-body -->
                @endif
                
                    
                </div>
                <!-- /.card -->
               
             </div>
             @endcan
               
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->

        @can('view_card')
    <!-- Card Isi Biodata -->
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Isi Biodata</h5>
            <p class="card-text">Lengkapi data dirimu disini!</p>
            <a href="{{route('user.form')}}" class="btn btn-dark">Mulai isi</a>
        </div>
    </div>
    <br>
    <!-- Card Kontak Guru BK -->
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Kontak Guru BK mu</h5>
            <p class="card-text">Ingin Konsultasi? lihat kontak guru bk kamu</p>
            <a href="#" class="btn btn-dark">Lihat Kontak</a>
        </div>
    </div>
    <br>
    <!-- Card Ikuti Tes Gaya Belajar -->
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Ikuti Tes Gaya Belajar</h5>
            <p class="card-text">Tes gaya belajar kamu</p>
            <a href="" class="btn btn-dark">Ikuti Tes</a>
        </div>
    </div>
@endcan

@can('view_table_data_siswa')
    <!-- Tabel Data Siswa -->
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
                            @foreach ($data as $i)
                                <!-- Mengecek apakah data memiliki relasi 'siswa' -->
                                @if ($i->siswa)
                                    <tr>
                                        <td style="width: 100px; object-fit: cover;">
                                            {{-- <img src="{{ asset('storage/'.$i->gambar) }}" alt="{{ $i->nama }}" width="80"> --}}
                                        </td>
                                        <!-- Kolom untuk menampilkan nama siswa dengan link ke halaman detail -->
                                        <td><a href="{{ route('user.siswa', ['id' => $i->id])  }}">{{ $i->siswa->nama_lengkap }}</a></td>
                                    </tr>
                                @endif
                            @endforeach
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
@endcan

</section>
<!-- /.content -->

</div>
@endsection
