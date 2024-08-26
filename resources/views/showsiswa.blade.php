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

        table {
            border-collapse: collapse;
        }

        th, td {
            padding: 5x 7px;
            border: 1px solid;
        }

        h5, h1 {
          margin: .3rem;
        }

        h5 {
          font-weight: normal;
        }

        h1 {
          margin-bottom: 1rem;
        }

        /* span {
          border-bottom: 2px dotted black;
        } */
    </style>
</head>
<body>

  {{-- kop surat --}}
  <header style="height: max-content; border-bottom: 1px solid black; text-align: center; display: flex; justify-content: center; align-content: center;">
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
    <div style="display: flex; justify-content: space-between;">
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
  <main style="text-transform: uppercase; margin-top: 1rem;">
    <h4 style="text-align: center; font-weight: bold;">data identitas siswa</h4>
    <h4 style="margin-bottom: 0; font-weight: bold;">kelas / bidang keahlian: <span style="font-weight: normal;">{{ $siswa->kelas }} {{ $jurusan->jurusan }}</span></h4>
    <ol style="margin-top: .5rem;">
      <div style="margin-bottom: 2rem;">
        <li>nama & nama panggilan: <span>{{ $result->nama_lengkap }} / {{ $bio->nama_panggilan}}</span></li>
        <li>agama: <span>{{ $bio->agama }}</span></li>
        <li>nis: <span>{{ $siswa->nis }}</span></li>
        <li>nilai ujian akhir: <span>....</span></li>
      </div>
      <li>jenis kelamin: <span>{{$result->jenis_kelamin == 'perempuan' ? 'Perempuan' : 'Laki-Laki'}}</span></li>
      <li>tempat & tanggal lahir: <span>.......................................................................</span></li>
      <li>asal smp/mts /sederajat: <span>.......................................................................</span></li>
      <li>alamat siswa sekarang <br> dan no.hp.telp: <span>.......................................................................</span></li>
      <li>nama: ayah <span>.......................................................................</span> ibu <span>.......................................................................</span></li>
      <li>pendidikan: ayah <span>.......................................................................</span> ibu <span>.......................................................................</span></li>
      <li>pekerjaan: ayah <span>.......................................................................</span> ibu <span>.......................................................................</span></li>
      <li>penghasilan orang tua: rp <span>...</span> per <span>hari</span>/<span>minggu</span>/<span>bulan</span></li>
      <li>alamat lengkap orang tua <br> dan no.hp/telp: <span>.......................................................................</span></li>
      <span>bagi yang tidak tinggal dengan orang tua *}</span>
      <li>nama wali: <span>.......................................................................</span></li>
      <li>pekerjaan wali: <span>.......................................................................</span></li>
      <li>alamat lengkap wali <br>dan no.hp/telp: <span>.......................................................................</span></li>
      <li>diterima di smkn2 tgl: <span>.......................................................................</span></li>
      <li>siswa anak ke- : <span>...</span> dari jumlah saudara <span>.......................................................................</span> orang</li>
      <li>jumlah anggota keluarga yang tinggal se rumah: <span>.......................................................................</span> orang</li>
      <li>jumlah anggota keluarga yang menjadi tanggungan orang tua: <span>.......................................................................</span> orang</li>
      <li>pergi ke sekolah dengan: <span>.......................................................................</span></li>
      <li>tempat tinggal: <span>milik sendiri</span>/ <span>sewa</span>/ <span>milik keluarga</span>/ <span>rumas dinas</span>/ <span>lainnya</span> *)</li>
      <li>tempat tinggal menggunakan penerang: <span>listrik</span>/ <span>lampu tembok</span>/ <span>lilin</span>/ <span>lainnya</span></li>
      <li>apakah memiliki: hp( <span>ada</span>/ <span>tidak</span> ) dan laptop ( <span>ada</span>/ <span>tidak</span> )</li>
      <li>saat belajar daring menggunakan: <span>wifi sendiri</span>/ <span>wifi tetangga</span>/ <span>kouta</span>/ <span>lainnya</span></li>
      <li>pelajaran yang kurang disenangi: <span>.......................................................................</span></li>
      <li>pelajaran yang disenangi: <span>.......................................................................</span></li>
      <li>cita-cita setelah tamat SMKN 2: <span>.......................................................................</span></li>
      <li>hobby / kegemaran: <span>.......................................................................</span></li>
      <li>tempat mencurahkan isi hati: <span>.......................................................................</span></li>
      <li>penyakit yang diderita(yang mengganggu pembelajaran): <span>.......................................................................</span></li>
      <li>bahasa yang digunakan: <span>.......................................................................</span></li>
      <li>suku: <span>.......................................................................</span></li>
    </ol>
  </main>

  <br>
    {{-- <table>

        <tr>
            <th>
                NIS
            </th>
            <th>
                Nama Lengkap
            </th>
            <th>
                Jurusan
            </th>
            <th>
                Kelas
            </th>
            <th>
                Jenis Kelamin
            </th>
        </tr>

        <tr>
            <td>
                {{ $siswa->nis }}
            </td>
            <td>
                {{ $siswa->nama_lengkap }}
            </td>
            <td>
                {{ $jurusan->jurusan }}
            </td>
            <td>
                {{ $siswa->kelas }}
            </td>
            <td>
                {{ $siswa->jenis_k }}
            </td>
        </tr>

    </table> --}}

</body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Siswa</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body class="w-100 min-vh-100 h-screen d-flex justify-content-center py-3">
    <div class="w-75 d-flex flex-column">
      <header
        class="w-100 text-center pt-4 border-bottom border-dark"
        style="height: max-content"
      >
        <div class="text-uppercase">
          <h6>pemerintah provinsi kalimantan selatan</h6>
          <h6>dinas pendidikan dan kebudayaan</h6>
        </div>
        <div class="d-flex justify-content-between px-5">
          <div>
            <!-- foto -->
            <img src="{{ public_path("img/kalsel.png") }}" alt="kalsel.png" width="110" />
          </div>
          <div class="d-flex flex-column">
            <!-- teks -->
            <h1 class="text-uppercase fw-bold">smk negeri 2 banjarmasin</h1>
            <p>
              Jl. Brigjen HasanBasri No.6.Telp./Fax.0551-3304677 Banjarmasin
              70123
            </p>
            <p>
              NPSN: 30304268 Website: http://www.smkn2-bjm.sch.id Email:
              surel@smkn2-bjm.sch.id
            </p>
          </div>
          <div>
            <!-- foto -->
            <img src="{{ public_path("img/skenda.png") }}" alt="skenda.png" width="110" />
          </div>
        </div>
      </header>
      <div class="mt-3">
        <h6 class="fw-bold">PETUNJUK:</h6>
        <ol>
          <li>Isilah form dibawah ini dengan jelas, benar dan lengkap.</li>
          <li>Tempelkan pas foto ukuran 3x4cm pada kolom di bawah.</li>
          <li>
            Kerjakan dengan tulis tangan dengan huruf kapital ( besar ) dan
            bubuhkan tanda tangan.
          </li>
        </ol>
      </div>
      <div class="mt-3 text-uppercase">
        <h5 class="fw-bold underline text-center">data identitas siswa</h5>
        <h6 class="fw-bold mt-3">kelas / bidang keahlian: <span>....</span></h6>
        <ol>
          <div class="d-flex justify-content-between">
            <div>
                <li>nama & nama panggilan: <span>....</span></li>
                <li>agama: <span>....</span></li>
                <li>nis: <span>....</span></li>
                <li>nilai ujian akhir: <span>....</span></li>
            </div>
            <div>
              
            </div>
          </div>
          <li>jenis kelamin: <span>.......................................................................</span></li>
          <li>tempat & tanggal lahir: <span>.......................................................................</span></li>
          <li>asal smp/mts /sederajat: <span>.......................................................................</span></li>
          <li>alamat siswa sekarang <br> dan no.hp.telp: <span>.......................................................................</span></li>
          <li>nama: ayah <span>.......................................................................</span> ibu <span>.......................................................................</span></li>
          <li>pendidikan: ayah <span>.......................................................................</span> ibu <span>.......................................................................</span></li>
          <li>pekerjaan: ayah <span>.......................................................................</span> ibu <span>.......................................................................</span></li>
          <li>penghasilan orang tua: rp <span>...</span> per <span>hari</span>/<span>minggu</span>/<span>bulan</span></li>
          <li>alamat lengkap orang tua <br> dan no.hp/telp: <span>.......................................................................</span></li>
          <span>bagi yang tidak tinggal dengan orang tua *}</span>
          <li>nama wali: <span>.......................................................................</span></li>
          <li>pekerjaan wali: <span>.......................................................................</span></li>
          <li>alamat lengkap wali <br>dan no.hp/telp: <span>.......................................................................</span></li>
          <li>diterima di smkn2 tgl: <span>.......................................................................</span></li>
          <li>siswa anak ke- : <span>...</span> dari jumlah saudara <span>.......................................................................</span> orang</li>
          <li>jumlah anggota keluarga yang tinggal se rumah: <span>.......................................................................</span> orang</li>
          <li>jumlah anggota keluarga yang menjadi tanggungan orang tua: <span>.......................................................................</span> orang</li>
          <li>pergi ke sekolah dengan: <span>.......................................................................</span></li>
          <li>tempat tinggal: <span>milik sendiri</span>/ <span>sewa</span>/ <span>milik keluarga</span>/ <span>rumas dinas</span>/ <span>lainnya</span> *)</li>
          <li>tempat tinggal menggunakan penerang: <span>listrik</span>/ <span>lampu tembok</span>/ <span>lilin</span>/ <span>lainnya</span></li>
          <li>apakah memiliki: hp( <span>ada</span>/ <span>tidak</span> ) dan laptop ( <span>ada</span>/ <span>tidak</span> )</li>
          <li>saat belajar daring menggunakan: <span>wifi sendiri</span>/ <span>wifi tetangga</span>/ <span>kouta</span>/ <span>lainnya</span></li>
          <li>pelajaran yang kurang disenangi: <span>.......................................................................</span></li>
          <li>pelajaran yang disenangi: <span>.......................................................................</span></li>
          <li>cita-cita setelah tamat SMKN 2: <span>.......................................................................</span></li>
          <li>hobby / kegemaran: <span>.......................................................................</span></li>
          <li>tempat mencurahkan isi hati: <span>.......................................................................</span></li>
          <li>penyakit yang diderita(yang mengganggu pembelajaran): <span>.......................................................................</span></li>
          <li>bahasa yang digunakan: <span>.......................................................................</span></li>
          <li>suku: <span>.......................................................................</span></li>
        </ol>
      </div>
      <div class="d-flex justify-content-end">
        <div class="text-uppercase">banjarmasin, <span>....</span> <br>peserta didik</div>
      </div>
      <div class="d-flex justify-content-between align-items-end">
        <div>catatan: <br>*} yang tidak perlu ; tidak diisi / coret (-)</div>
        <div>(...........................................................)</div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html> --}}
