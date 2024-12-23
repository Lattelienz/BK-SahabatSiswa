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
            <div class="row">
             
                <!-- Dashboard admin -->
                @can('view_dashboard') <!-- Cek izin untuk melihat dashboard -->
                <div class="col-12">

                    <button data-toggle="modal" data-target="#createModal" class="btn btn-dark mb-3" >Tambah Data</button> <!-- Tombol untuk menambahkan data -->
                        
                    <div class="card">
                        <!-- .card-header -->
                        <div class="card-header">
                            <h3 class="card-title">Data Siswa</h3> {{-- Judul card untuk data siswa --}}
                            
                            <div class="card-tools row">
                                <form action="{{ route('user.search') }}" class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="search" class="form-control float-right" placeholder="Search.."> <!-- Form pencarian berdasarkan nama -->
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                        {{-- /.card-header --}}
                        
                        {{-- .card-body --}}
                        <div class="card-body table-responsive">

                            @if ($data->items() == null)
                            <div class="d-flex justify-content-center">
                                <div class="d-flex align-items-center flex-column col-4">
                                    <h1 class="text-danger">Maaf!</h1>
                                    <h5 class="self-align-bottom text-danger">Data tidak tersedia....</h5>
                                </div>
                            </div>

                            @else
                            {{-- Tabel --}}
                            <table class="table table-hover text-nowrap">
                                {{-- Header tabel --}}
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Isi tabel -->
                                <tbody>

                                    {{-- Loop melalui $data --}}
                                    @foreach ($data as $d)
                                    <tr>
                                        <td> {{$loop->iteration}} </td>
                                        <td> {{$d->nama_lengkap}} </td>
                                        <td> 
                                            @if ($d->jenis_kelamin == 'laki-laki')
                                                Laki-Laki
                                            @else
                                                Perempuan
                                            @endif
                                        </td>
                                        <td> {{$d->email}} </td>
                                        <td> {{$d->level}} </td>
                                        <td class="d-flex" style="grid-gap: 10px">
                                            
                                                                                            
                                            {{-- Tombol Edit --}}
                                            <button class="btn btn-dark edit-btn" @disabled(Auth::id() == $d->id || $d->level == 'Admin') onclick="editUser({{ $d->id }})" data-id="{{ $d->id }}" ><i class="fas fa-pen"></i> Edit</button>

                                            {{-- Form Delete --}}
                                            <button class="btn btn-dark" @disabled(Auth::id() == $d->id || $d->level == 'Admin') data-toggle="modal" data-target="#deleteModal{{ $d->id }}"><i class="fas fa-trash"></i> Delete</button>

                                            {{-- Edit Modal --}}
                                            <div class="modal fade" id="editModal{{ $d->id }}" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
                                                        </div>

                                                            <div class="modal-body">

                                                            <form id="editForm" action="{{ route('user.update', ['id' => $d->id ]) }}" method="post">
                                                                @csrf
                                                                @method('put')
                                                                
                                                                <!-- select -->
                                                                <div class="form-group">
                                                                    <label for="level">Level</label>
                                                                    <select name="level" class="form-control" id="editLevel{{ $d->id }}" onchange="changeEditElement({{ $d->id }})">
                                                                        <option>Siswa</option>
                                                                        <option>Guru</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="editNama{{ $d->id }}">Nama Lengkap</label>
                                                                    <input type="text" name="nama_lengkap" class="form-control" id="editNama{{ $d->id }}" placeholder="Masukkan nama">
                                                                    @error('nama_lengkap')
                                                                        <small>{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                            
                                                                <div class="form-group editNis{{ $d->id }}">
                                                                    <label for="editNis{{ $d->id }}">NIS</label>
                                                                    <input type="text" name="NIS" class="form-control" id="editNis{{ $d->id }}" placeholder="Masukkan NIS">
                                                                    @error('NIS')
                                                                        <small>{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                            
                                                                <div class="form-group">
                                                                    <label for="editEmail{{ $d->id }}">Email</label>
                                                                    <input type="email" class="form-control" id="editEmail{{ $d->id }}" name="email" placeholder="Masukkan email">
                                                                    @error('email')
                                                                        <small>{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                            
                                                                <div class="form-group">
                                                                    <label for="editPassword1">Password</label>
                                                                    <input type="password" name="password" class="form-control" id="editPassword1" placeholder="Kosongkan jika tidak ingin mengganti">
                                                                    @error('password')
                                                                        <small>{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                            
                                                                <!-- select -->
                                                                <div class="form-group">
                                                                    <label for="editJK{{ $d->id }}">Jenis Kelamin</label>
                                                                    <select name="jenis_kelamin" class="form-control" id="editJK{{ $d->id }}">
                                                                        <option value="laki-laki">Laki-Laki</option>
                                                                        <option value="perempuan">Perempuan</option>
                                                                    </select>
                                                                </div>

                                            
                                                                <!-- select -->
                                                                <div class="form-group editJabatan{{ $d->id }}">
                                                                    <label for="editJabatan{{ $d->id }}">Jabatan</label>
                                                                    <select name="jabatan" class="form-control" id="editJabatan{{ $d->id }}">
                                                                        <option>Guru BK</option>
                                                                        <option>Guru umum</option>
                                                                        <option>Guru kejuruan</option>
                                                                    </select>
                                                                </div>
                                                                
                                                                <!-- select -->
                                                                <div class="form-group editJurusan{{ $d->id }}">
                                                                    <label for="editJurusan{{ $d->id }}">Jurusan</label>
                                                                    <select name="jurusan" class="form-control" id="editJurusan{{ $d->id }}">
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
                                                                <div class="form-group editKelas{{ $d->id }}">
                                                                    <label for="editKelas{{ $d->id }}">Kelas</label>
                                                                    <select name="kelas" class="form-control" id="editKelas{{ $d->id }}">
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
                                                                    
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-dark">Simpan perubahan</button>
                                                            </div>

                                                            </form>

                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Delete modal --}}
                                            <div class="modal fade" id="deleteModal{{ $d->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Menghapus user</h5>
                                                        </div>

                                                        <div class="modal-body">
                                                            <p>Apakah anda yakin ingin menghapus user?</p>
                                                        </div>

                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                            <form action="{{ route('user.delete', ['id' => $d->id]) }}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-dark">Ya</button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </td>
                                    </tr>                
                                    
                                    <script>
                                        @if (session('openEditModal'))
                                            $('#editModal' . {{$d->id}}).modal('show');
                                        @endif
                                    </script>
                                    @endforeach
                                    {{-- Akhir dari loop --}}

                                </tbody>
                            </table>
                                
                            </div>
                            {{-- Akhir dari .card-body --}}
                            
                        </div>
                        {{-- /.card --}}
                        @endif

                        {{-- pagination --}}
                        <div class="d-flex justify-content-center">
                            {{ $data->links() }}
                        </div>
                </div>
                @endcan
               

                {{-- Card untuk siswa --}}
                @can('view_card')
                <div class="row col-12 justify-content-center align-content-center siswa">

                    {{-- Card Isi Biodata --}}
                    @if ($data->siswa->biodata == null)    
                    <div class="card" style="width: 18rem; height: 12rem;">
                        <div class="card-body">
                            <h5 class="card-title">Isi Biodata</h5>
                            <p class="card-text">Lengkapi data dirimu disini!</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('user.form') }}" class="btn btn-dark mt-4">Mulai isi</a>
                        </div>
                    </div>
                    @endif

                    {{-- Card Kontak Guru BK --}}
                    <div class="card mx-sm-4" style="width: 18rem; height: 12rem;">
                        <div class="card-body">
                            <h5 class="card-title">Kontak Guru BK mu</h5>
                            <p class="card-text">Ingin Konsultasi? lihat kontak guru bk kamu</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('user.guru') }}" class="btn btn-dark">Lihat Kontak</a>
                        </div>
                    </div>

                    {{-- Card Ikuti Tes Gaya Belajar --}}
                    @if ($data->siswa->gaya_belajar == null)    
                    <div class="card" style="width: 18rem; height: 12rem;">
                        <div class="card-body">
                            <h5 class="card-title">Ikuti Tes Gaya Belajar</h5>
                            <p class="card-text">Tes gaya belajar kamu</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('user.tesGayaBelajar') }}" class="btn btn-dark">Ikuti Tes</a>
                        </div>
                    </div>
                
                @endif

                <div class="card mx-sm-4" style="width: 18rem; height: 12rem;">
                    <div class="card-body">
                        <h5 class="card-title">Profil Karir</h5>
                        <p class="card-text">Isi profil karir kamu</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('user.profilkarir') }}" class="btn btn-dark">Isi profil</a>
                    </div>
                </div>
                </div>
                @endcan



                {{-- Tabel Data Siswa --}}
                @can('view_table_data_siswa')
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Siswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Kelas dan Jurusan</th>
                                        <th>Jenis Kelamin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- perulangan utk setiap data --}}
                                    @foreach ($data as $i)
                                        {{-- Mengecek apakah data memiliki relasi 'siswa' --}}
                                        @if ($i->siswa)
                                            <tr onclick="window.location='{{ route('user.siswa', ['id' => $i->id]) }}'">
                                                <td class="col-1 text-center">
                                                    <img src="{{ $i->photo ? asset('storage/' . $i->photo) : asset('lte/dist/img/profil1.png') }}" alt="gambar_siswa" style="width: 75px; height: 75px; object-fit: cover; object-position: center;">
                                                </td>
                                                <!-- Kolom untuk menampilkan nama siswa dengan link ke halaman detail -->
                                                <td>{{ $i->nama_lengkap }}</td>
                                                <td>{{ $i->siswa->kelas }} {{ $i->siswa->jurusan->jurusan }}</td>
                                                <td>{{ $i->jenis_kelamin == 'perempuan' ? 'Perempuan' : 'Laki-laki' }}</td>
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
                {{-- /.col --}}
                @endcan


                
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
        
        {{-- Create Modal --}}
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">

                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah user</h5>
                    </div>

                        <div class="modal-body">

                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <!-- select -->
                            <div class="form-group">
                                <label for="level">Level</label>
                                <select name="level" class="form-control" id="level" onchange="changeElement()">
                                    <option>Admin</option>
                                    <option>Siswa</option>
                                    <option>Guru</option>
                                </select>
                            </div>

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
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
        
                            <div class="form-group">
                                <label for="password1">Password</label>
                                <input type="lpassword" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password">
                                @error('password')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
        
                            <!-- select -->
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
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
                                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-dark">Simpan perubahan</button>
                        </div>

                        </form>

                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        @if (session('alert'))
            Swal.fire({
                icon: "error",
                text: "{{ session('text') }}"
            })
        @endif

        @if (session('openModal'))
            $('#createModal').modal('show');
        @endif
    });

</script>
@endsection
