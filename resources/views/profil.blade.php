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
      <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('lte/dist/img/profil1.png') }}" class="border border-dark rounded" alt="User Image" style="height: 200px; width: 200px; object-fit: cover; object-position: center;">
      <h1 class="m-2 font-weight-bold">
        {{ Auth::user()->nama_lengkap }}
      </h1>
      @if (Auth::user()->level == 'Siswa' && $bio)
        <h5>
          ({{ $bio->nama_panggilan }})
        </h5>
      @endif
    </div>

    <section class="row justify-content-center" style="column-gap: 10px">
      
      @if ($result->level == 'Siswa')
      
        {{-- .card--}}
        <div class="card mx-2 col-sm-6">
          
          <div class="card-body p-3">
            @if ($bio)
              <a href="{{ route('user.form') }}" class="float-right">Edit Profile</a>
            @endif
            <h3 class="font-weight-bold">Detail Umum User</h3>

            <div>
              {{-- data pribadi siswa --}}
              
              <p>Kelas dan Jurusan : {{ $siswa->kelas }} {{ $jurusan->jurusan }}</p>
              <p class="text-capitalize">Jenis Kelamin : {{ $result->jenis_kelamin }}</p>
              @if ($siswa->gaya_belajar) 
                <p class="text-capitalize">Gaya Belajar: {{ $siswa->gaya_belajar }}</p>
              @endif

            </div>

            @if ($bio == null)
            <div>
            </div>
            <div>
              <h4><b>
                UPS! Kamu belum ngisi biodata nih!
              </b></h4>
              <p>
                Segera isi dengan menekan tombol dibawah! 
              </p>
              <a href="{{ route('user.form') }}" class="btn btn-dark">Mulai isi</a>
            </div>
            @endif
            
          </div>
          {{-- /.card-body --}}
        </div>

        @if ($bio)
        {{-- .card --}}
        <div class="card mx-2 col-6">

          {{-- .card-body --}}
          <div class="card-body p-3">
            <h3 class="font-weight-bold">Biodata siswa</h3>

            <p>TTL : {{ $bio->tempat_lahir }}, {{ \Carbon\Carbon::parse($bio->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}</p>
            <p>Alamat : {{ $bio->alamat_sekarang }}</p>
            <p>Agama : {{ $bio->agama }}</p>
            <p>Asal SMP : {{ $bio->asal_smp }}</p>
            <p>Tanggal diterima : {{ $bio_lain->tanggal_diterima }}</p>
            <p>Anak ke : {{ $bio_lain->anak_ke }} dari {{ $bio_lain->dari_jumlah_saudara }} jumlah saudara</p>
            <p>Jumlah keluarga yang serumah : {{ $bio_lain->jumlah_orang_yg_serumah }}</p>
            <p>Jumlah orang yang ditanggung orang tua : {{ $bio_lain->jumlah_tanggungan_ortu }}</p>
            <p>Kesekolah dengan : {{ $bio_lain->kesekolah_memakai }}</p>
            <p>Tempat tinggal : {{ $bio_lain->tempat_tinggal }}</p>
          </div>
        </div>
          
        <div class="card">
          <div class="card-body">
            <h3 class="font-weight-bold">Biodata siswa lainnya</h3>

            <p>Penerangan : {{ $bio_lain->penerangan }}</p>
            <p>Hp : {{ $bio_lain->hp }}</p>
            <p>Laptop : {{ $bio_lain->laptop }}</p>
            <p>PJJ memakai : {{ $bio_lain->pjj_memakai }}</p>
            <p>Pelajaran yang tidak disuka : {{ $bio_lain->pelajaran_yg_tdk_disuka }}</p>
            <p>Pelajaran yang disuka : {{ $bio_lain->pelajaran_yg_disuka }}</p>
            <p>Cita-cita : {{ $bio_lain->cita_cita }}</p>
            <p>Hobby : {{ $bio_lain->hobby }}</p>
            <p>Tempat curhat : {{ $bio_lain->tmpt_curhat }}</p>
            <p>Penyakit yang menggganggu : {{ $bio_lain->penyakit_mengganggu }}</p>
            <p>Bahasa sehari-hari : {{ $bio_lain->bhs_sehari_hari }}</p>
            <p>Suku : {{ $bio_lain->suku }}</p>
          </div>
        </div>

          @endif

        </div>


      @elseif ($result->level == 'Guru')

        <!-- .card -->
        <div class="card col-md-6 mx-2">
          <!-- .card-body -->
          <div class="card-body p-3">
            <a onclick="editProfileUser({{ Auth::id() }})" class="float-right">Edit Profile</a>
            <p><b>Detail User</b></p>
            {{-- data pribadi siswa --}}
            
            <p>Jabatan : {{ $guru->jabatan }}</p>
            <p>Jurusan : {{ $jurusan->jurusan }}</p>
            <p>Jenis Kelamin : 
              @if ($result->jenis_kelamin == 'perempuan')
                Perempuan
              @else
                Laki-laki
              @endif
            </p>
            @if ($guru->no_telp !== null)
              <p>No. Telpon : {{ 0 . ltrim($guru->no_telp, '+62') }} </p>
            @endif

          </div>
          <!-- /.card-body -->
        </div>

      @endif

    </section>

    {{-- Edit Modal --}}
    <div class="modal fade" id="editProfileModal{{ Auth::id() }}" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">

              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
              </div>

                  <div class="modal-body">

                  <form action="{{ route('user.update', ['id' => Auth::id() ]) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('put')

                      <div class="form-group">
                        <label for="FileInput">Upload Gambar</label>
                        <div class="custom-file">
                          <input type="file" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" id="FileInput" aria-describedby="FileInput">
                          <label class="custom-file-label" for="FileInput">Choose file</label>
                        </div>
                        @error ('photo')
                          <small>{{ $message }}</small>
                        @enderror
                      </div>

                      <div class="form-group">
                          <label for="nama">Nama Lengkap</label>
                          <input type="text" name="nama_lengkap" class="form-control editProfileNama" id="nama" placeholder="Masukkan nama">
                      </div>
                      
                      <!-- select -->
                      <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control editProfileJK" id="jenis_kelamin">
                          <option value="laki-laki">Laki-Laki</option>
                          <option value="perempuan">Perempuan</option>
                        </select>
                      </div>
                      
                      @if (Auth::user()->guru->jabatan == 'Guru BK')
                      <div class="form-group">
                          <label for="nama">Nomor Telp</label>
                          <input type="text" name="no_telp" class="form-control" id="nama" placeholder="08....">
                      </div>
                      @endif

                  </div>
                          
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-dark">Simpan perubahan</button>
                  </div>

                  </form>

          </div>
      </div>
    </div>

  </div>
</div>
<!-- /.content -->
@endsection