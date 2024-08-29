<div class="formbold-form-step-1 active">
  
  <div class="mb-2 col">
    <label class="formbold-form-label" for="foto">Upload Gambar</label>
    <input type="file" class="form-control custom-file-input" id="foto" name="foto">
  </div>

  <div class="mb-2 col">
    <label for="nis" class="formbold-form-label"> NIS </label>
    <input type="text" name="nis" placeholder="NIS" id="nis" class="formbold-form-input"/>
  </div>

  <div class="row mb-2">
    <div class="col-sm-6">
      <label for="firstname" class="formbold-form-label"> Nama Lengkap </label>
      <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" id="firstname" class="formbold-form-input" />
    </div>
    <div class="col-sm-6 mt-2 mt-sm-0">
        <label for="lastname" class="formbold-form-label"> Nama Panggilan </label>
        <input type="text" name="nama_panggilan" placeholder="Nama Panggilan" id="lastname" class="formbold-form-input" />
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-sm-4">
      <label for="agama" class="formbold-form-label"> Agama </label>
      <input type="text" name="agama" placeholder="Agama" id="agama" class="formbold-form-input" />
    </div>
    <div class="col-sm-4">
      <label for="nomor" class="formbold-form-label"> No HP/Telp </label>
      <input type="text" name="nomor" placeholder="No.hp" id="nomor" class="formbold-form-input" />
    </div>
    <div class="col-sm-4">
      <label class="formbold-form-label" for="jenis_k">Jenis Kelamin</label>
      <select class="formbold-form-input" name="jenis_k" id="jenis_k">
        <option value="Laki-laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
    </div>
  </div>

  <div class="row mb-2">
    <label for="dob" class="formbold-form-label"> Tempat, Tanggal Lahir </label>
    <div class="input-group">
      <input type="text" name="tempat_lahir" class="formbold-form-input col-sm-8 " placeholder="Tempat Lahir"/>
      <input type="date" name="tanggal_lahir" id="dob" class="formbold-form-input col-sm-4 "/>
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-sm-6">
      <label for="asal" class="formbold-form-label"> Asal Smp/Mts/Sederajat </label>
      <input type="text" name="asal" id="asal" placeholder="Sekolah asal" class="formbold-form-input"/>
    </div>

    <div class="col-sm-6 mt-2 mt-sm-0">
      <label for="nilai" class="formbold-form-label"> Nilai Ujian Akhir </label>
      <input type="text" name="nilai" id="nilai" placeholder="Nilai Ujian Akhir" class="formbold-form-input"/>
    </div>
  </div>

  <div class="row">
    <div>
        <label for="Alamat" class="formbold-form-label"> Alamat Siswa Sekarang </label>
        <textarea name="alamat" id="Alamat" placeholder="Alamat Lengkap" class="formbold-form-input" rows="3"/></textarea>
    </div>
  </div>
  
</div>