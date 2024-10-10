<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>Form Profil Karir</title>

  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
  <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>
<body>

  <form action="{{ route('user.profilkarirstore') }}" method="POST">
    @csrf 
    <div class="formbold-main-wrapper">
      <!-- Author: FormBold Team -->
      <!-- Learn More: https://formbold.com -->
      <div class="formbold-form-wrapper">
        <div class="formbold-form-title">
          <h2 class="">Profil Karir</h2>
          <p>
           Biodata akan dimasukkan ke dalam profil anda
          </p>
        </div>
        <hr>

<div class="formbold-form-step-1 active">
  
  
    <div class="mb-2 col">
      <label for="nohp" class="formbold-form-label"> Nomor Handphone </label>
      <input type="tel" name="nis" placeholder="" id="nis" class="formbold-form-input"/>
    </div>
    <div class="mb-2 col">
        <label for="email" class="formbold-form-label"> Email </label>
        <input type="email" name="nis" placeholder="" id="nis" class="formbold-form-input"/>
      </div>
  
    <div class="mt-2 row">
      <div>
          <label for="sd" class="formbold-form-label mt-2"> Sekolah Dasar (SD): (Nama Sekolah, Tahun Masuk-Kelulusan CONTOH SDN 1 Banjarmasin Tahun 2014-2020) </label>
          <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Sekolah Menengah Pertama (SMP): (Nama Sekolah, Tahun Masuk-Kelulusan)
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Sekolah Menengah Kejuruan (SMK): (Nama SMK, Jurusan, Tahun Masuk)
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Minat Karir: (Misalnya, teknologi, desain grafis, otomotif, perhotelan)
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Hobi dan Aktivitas Ekstrakurikuler: (Misalnya, olahraga, musik, seni, kegiatan organisasi)
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Keterampilan yang Sudah Dimiliki: (Misalnya, keterampilan komputer dasar, bahasa asing, keterampilan manual) 
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Keterampilan yang Ingin Dikembangkan: (Misalnya, keterampilan teknis dalam bidang tertentu sesuai jurusan, kemampuan komunikasi) 
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Pengalaman Relawan atau Kegiatan Ekstrakurikuler: (Nama Kegiatan, Deskripsi, Durasi) 
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Pengalaman Kerja (Jika Ada): (Misalnya, magang, kerja paruh waktu, tugas-tugas proyek kecil)
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Tujuan Pendidikan dan Karir Jangka Pendek: (Misalnya, berhasil dalam mata pelajaran jurusan, aktif dalam kegiatan ekstrakurikuler)
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Tujuan Pendidikan dan Karir Jangka Panjang: (Misalnya, mengejar gelar lanjutan, mendapatkan sertifikasi profesional, memulai karir di bidang tertentu) 
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Rencana Pengembangan Kursus atau Pelatihan yang Akan Diikuti: (Misalnya, kursus tambahan, pelatihan kejuruan)
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Rencana Pengembangan Sertifikasi yang Diharapkan: (Misalnya, sertifikasi keahlian tertentu sesuai dengan jurusan)
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Jaringan Profesional yang Ingin Diperluas: (Misalnya, bergabung dengan komunitas atau organisasi terkait bidang minat)
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Nama Referensi: (Misalnya, guru atau pembimbing dari sekolah sebelumnya, mentor) siapa yang memberikan arahan untuk jurusan yang ditempuh.
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
      <div>
        <label for="sd" class="formbold-form-label mt-2"> Prestasi Akademik dan Non Akademik yang pernah diraih dari sd sampai smk (Misalnya, ranking, lomba)
        </label>
        <textarea name="sd" id="sd" placeholder="" class="formbold-form-input" rows="3"/></textarea>
      </div>
    </div>

    <a href="{{ route('user.dashboard') }}" class="text-dark">
      Ingin kembali ke dashboard?
    </a>

    <button class="formbold-btn mt-3">Submit</button>
    
  </div>
</form>
</body>
</html>