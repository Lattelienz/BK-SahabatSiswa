<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        body {
          font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        }

        h5, h1 {
          margin: .3rem;
        }

        ol, h4 {
          text-transform: uppercase;
        }

        li {
          margin-bottom: 8px;
        }

        h5 {
          font-weight: normal;
        }

        h1 {
          margin-bottom: 1rem;
        }

        h4 {
          font-weight: bold;
        }

        .page-break {
          page-break-after: always;
        }

        .text-center {
          text-align: center;
        }
        
        .d-flex {
          display: flex;
        }

        div.ttd {
          float: right
        }
    </style>
</head>
<body>

  {{-- kop surat --}}
  <header style="height: max-content; border-bottom: 1px solid black; justify-content: center; align-content: center;" class="text-center d-flex">
    <div>
      <!-- foto -->
      <img src="{{ public_path("img/kalsel.png") }}" alt="kalsel.png" width="100" style="position: absolute; left: 0; top: 1rem" />
    </div>
    <div>
      <!-- foto -->
      <img src="{{ public_path("img/skenda.png") }}" alt="skenda.png" width="100"  style="position: absolute; right: 0; top: 1rem"/>
    </div>
    <div style="margin-top: 0.5rem;">
      <h5>PEMERINTAH PROVINSI KALIMANTAN SELATAN</h5>
      <h5>DINAS PENDIDIKAN DAN KEBUDAYAAN</h5>
    </div>
    <div style="justify-content: space-between;" class="d-flex">
      <div>
        <!-- teks -->
        <h1>SMK NEGERI 2 BANJARMASIN</h1>
        <p>
          Jl. Brigjen HasanBasri No.6.Telp./Fax.0551-3304677 Banjarmasin
          70123
        </p>
        <p>
          NPSN: 30304268 Website: http://www.smkn2-bjm.sch.id Email:
          surel@smkn2-bjm.sch.id
        </p>
      </div>
    </div>
  </header>

  {{-- isi surat --}}
  <main style="margin-top: 1rem;">
    <h4 class="text-center">data identitas siswa</h4>
    <h4 style="margin-bottom: 0;">kelas / bidang keahlian: <span style="font-weight: normal;">{{ $siswa->kelas }} {{ $jurusan->jurusan }}</span></h4>
    <ol style="margin-top: .5rem;">
      <img style="float: right; width: 3cm;" src="{{ public_path("storage/" . $result->photo) }}" alt="Pas foto">
      
      <li>nama & nama panggilan: <span>{{ $result->nama_lengkap }} / {{ $bio->nama_panggilan}}</span></li>
      <li>agama: <span>{{ $bio->agama }}</span></li>
      <li>nis: <span>{{ $siswa->nis }}</span></li>
      <li style="margin-bottom: 2rem;">nilai ujian akhir: <span>{{ $bio->nilai_ujian_akhir }}</span></li>
      
      <li>jenis kelamin: <span>{{$result->jenis_kelamin == 'perempuan' ? 'Perempuan' : 'Laki-Laki'}}</span></li>
      <li>tempat & tanggal lahir: <span>{{ $bio->tempat_lahir }}, {{ \Carbon\Carbon::parse($bio->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}</span></li>
      <li>asal smp/mts /sederajat: <span>{{ $bio->asal_smp }}</span></li>
      <li>alamat siswa sekarang <br> dan no.hp / telp: <span>{{ $bio->alamat_sekarang }}</span> / <span>{{ $bio->no_hp }}</span></li>
      <li>nama ayah: <span>{{ $bio_ortu ? $bio_ortu->nama_ayah : '-'}}</span> / ibu: <span>{{ $bio_ortu ? $bio_ortu->nama_ibu : '-'}}</span></li>
      <li>pendidikan ayah: <span>{{ $bio_ortu ? $bio_ortu->pendidikan_ayah : '-'}}</span> / ibu: <span>{{ $bio_ortu ? $bio_ortu->pendidikan_ibu : '-'}}</span></li>
      <li>pekerjaan ayah: <span>{{ $bio_ortu ? $bio_ortu->pekerjaan_ayah : '-'}}</span> / ibu: <span>{{ $bio_ortu ? $bio_ortu->pekerjaan_ibu : '-'}}</span></li>
      <li>penghasilan orang tua: <span>rp. {{ number_format($bio_ortu->penghasilan_ortu, 0, ',', '.') }} per {!! $bio_ortu->penghasilan_ortu_per == 'hari' ? 'hari' : '<s>hari</s>' !!}/{!! $bio_ortu->penghasilan_ortu_per == 'minggu' ? 'minggu' : '<s>minggu</s>' !!}/{!! $bio_ortu->penghasilan_ortu_per == 'bulan' ? 'bulan' : '<s>bulan</s>' !!}</span></li>
      <li style="margin-bottom: 2rem;">alamat lengkap orang tua <br> dan no.hp/telp: <span>{{ $bio_ortu ? $bio_ortu->alamat_ortu : '-'}} / {{ $bio_ortu ? $bio_ortu->no_telp : '-'}}</span></li>
      
      <h4 style="margin-bottom: 0">bagi yang tidak tinggal dengan orang tua</h4>
      <li>nama wali: <span>{{ $bio_wali ? $bio_wali->nama_wali : '-' }}</span></li>
      <li>pekerjaan wali: <span>{{ $bio_wali ? $bio_wali->pekerjaan_wali : '-' }}</span></li>
      <li>alamat lengkap wali <br>dan no.hp/telp: <span>{{ $bio_wali ? $bio_wali->alamat_wali : '-'}}</span></li>
      <li>diterima di smkn2 tanggal: <span>{{ \Carbon\Carbon::parse($bio_lain->tanggal_diterima)->locale('id')->translatedFormat('d F Y') }}</span></li>
      <li>siswa anak ke- : <span>{{ $bio_lain->anak_ke }}</span> dari jumlah saudara <span>{{ $bio_lain->dari_jumlah_saudara }}</span> orang</li>
      <li>jumlah anggota keluarga yang tinggal se rumah: <span>{{ $bio_lain->jumlah_orang_yg_serumah }}</span> orang</li>
      <li>jumlah anggota keluarga yang menjadi tanggungan orang tua: <span>{{ $bio_lain->jumlah_tanggungan_ortu }}</span> orang</li>
      <li>pergi ke sekolah dengan: <span>{{ $bio_lain->kesekolah_memakai }}</span></li>
      <li>tempat tinggal: <span>
        {!! $bio_lain->tempat_tinggal == 'Milik sendiri' ? 'milik sendiri' : '<s>milik sendiri</s>' !!} /
        {!! $bio_lain->tempat_tinggal == 'Sewa' ? 'sewa' : '<s>sewa</s>' !!} /
        {!! $bio_lain->tempat_tinggal == 'Milik keluarga' ? 'milik keluarga' : '<s>milik keluarga</s>' !!} /
        {!! $bio_lain->tempat_tinggal == 'Rumas dinas' ? 'rumas dinas' : '<s>rumas dinas</s>' !!} /
        {!! !in_array($bio_lain->tempat_tinggal, ['Milik sendiri', 'Sewa','Milik keluarga','Rumah dinas']) ? 'lainnya : ' . $bio_lain->tempat_tinggal : '<s>lainnya</s>  : -' !!}
      </span></li>
      <li>tempat tinggal menggunakan penerang: <span>
        {!! $bio_lain->penerangan == 'Listrik' ? 'Listrik' : '<s>Listrik</s>' !!} /
        {!! $bio_lain->penerangan == 'Lampu tembok' ? 'lampu tembok' : '<s>lampu tembok</s>' !!} /
        {!! $bio_lain->penerangan == 'Lilin' ? 'Lilin' : '<s>Lilin</s>' !!} /
        {!! !in_array($bio_lain->penerangan, ['Listrik', 'Lampu tembok','Lilin']) ? 'lainnya : ' . $bio_lain->penerangan : '<s>lainnya</s>  : -' !!}
      </span></li>
      <li>apakah memiliki: hp( <span>{!! $bio_lain->hp == 'punya' ? 'ada' : '<s>ada</s>' !!}/{!! $bio_lain->hp == 'tidak' ? 'tidak' : '<s>tidak</s>' !!}</span> ) dan laptop ( <span>{!! $bio_lain->laptop == 'punya' ? 'ada' : '<s>ada</s>' !!}/{!! $bio_lain->laptop == 'tidak' ? 'tidak' : '<s>tidak</s>' !!}</span> )</li>
      <li>saat belajar daring menggunakan: <span>
        {!! $bio_lain->pjj_memakai == 'Wifi sendiri' ? 'Wifi sendiri' : '<s>Wifi sendiri</s>' !!} /
        {!! $bio_lain->pjj_memakai == 'Wifi tetangga' ? 'Wifi tetangga' : '<s>Wifi tetangga</s>' !!} /
        {!! $bio_lain->pjj_memakai == 'Kouta' ? 'Kouta' : '<s>Kouta</s>' !!} /
        {!! !in_array($bio_lain->pjj_memakai, ['Wifi sendiri', 'Wifi tetangga','Kouta']) ? 'lainnya : ' . $bio_lain->pjj_memakai : '<s>lainnya</s>  : -' !!}
      </span></li>
      <li>pelajaran yang kurang disenangi: <span>{{ $bio_lain->pelajaran_yg_tdk_disuka }}</span></li>
      <li>pelajaran yang disenangi: <span>{{ $bio_lain->pelajaran_yg_disuka }}</span></li>
      <li>cita-cita setelah tamat SMKN 2: <span>{{ $bio_lain->cita_cita }}</span></li>
      <li>hobby / kegemaran: <span>{{ $bio_lain->hobby }}</span></li>
      <li>tempat mencurahkan isi hati: <span>{{ $bio_lain->tmpt_curhat }}</span></li>
      <li>penyakit yang diderita (yang mengganggu pembelajaran): <span>{{ $bio_lain->penyakit_mengganggu }}</span></li>
      <li>bahasa yang digunakan: <span>{{ $bio_lain->bhs_sehari_hari }}</span></li>
      <li>suku: <span>{{ $bio_lain->suku }}</span></li>

      <div class="ttd" style="width: 40%; margin-left: 100%;">
        <div class="text-center">
          <p>Banjarmasin, ............. {{ date('Y') }}</p>
          <p style="margin-bottom: 3cm">Peserta didik</p>
  
          <p>{{$result->nama_lengkap}}</p>
        </div>
      </div>
    </ol>

    {{-- <div class="page-break"></div> --}}

    <div>
      <h1 class="text-center">Selengkapnya tentang anak</h1>
      <p style="text-align: justify">Anak ini belajar dengan gaya belajar {{$GayaBelajar}}. {{ $deskripsiGayaBelajar }}</p>
    </div>
  </main>

</body>
</html>