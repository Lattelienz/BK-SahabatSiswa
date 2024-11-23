<div class="formbold-form-step-2">

  <div class="row mb-2">
    <div class="col-sm-6">
        <label for="nama_ayah" class="formbold-form-label"> Nama Ayah </label>
        <input type="text" name="nama_ayah" placeholder="Nama Ayah" id="nama_ayah" class="formbold-form-input" value="{{ $bio_ortu->nama_ayah ?? '' }}"/>
    </div>
    <div class="col-sm-6 mt-2 mt-sm-0">
        <label for="nama_ibu" class="formbold-form-label"> Nama Ibu </label>
        <input type="text" name="nama_ibu" placeholder="Nama Ibu" id="nama_ibu" class="formbold-form-input" value="{{ $bio_ortu->nama_ibu ?? '' }}"/>
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-sm-6">
        <label for="pendidikan_ayah" class="formbold-form-label"> Pendidikan Ayah </label>
        <input type="text" name="pendidikan_ayah" placeholder="Pendidikan Ayah" id="pendidikan_ayah" class="formbold-form-input" value="{{ $bio_ortu->pendidikan_ayah ?? '' }}"/>
    </div>
    <div class="col-sm-6 mt-2 mt-sm-0">
        <label for="pendidikan_ibu" class="formbold-form-label"> Pendidikan Ibu </label>
        <input type="text" name="pendidikan_ibu" placeholder="Pendidikan Ibu" id="pendidikan_ibu" class="formbold-form-input" value="{{ $bio_ortu->pendidikan_ibu ?? '' }}"/>
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-sm-6">
        <label for="pekerjaan_ayah" class="formbold-form-label"> Pekerjaan Ayah </label>
        <input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" id="pekerjaan_ayah" class="formbold-form-input" value="{{ $bio_ortu->pekerjaan_ayah ?? '' }}"/>
    </div>
    <div class="col-sm-6">
        <label for="pekerjaan_ibu" class="formbold-form-label"> Pekerjaan Ibu </label>
        <input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" id="pekerjaan_ibu" class="formbold-form-input" value="{{ $bio_ortu->pekerjaan_ibu ?? '' }}"/>
    </div>
  </div>

  <div class="mb-2">
    <label for="penghasilan" class="formbold-form-label"> Penghasilan Orang tua </label>
    <input type="text" name="penghasilan" placeholder="Rp." id="penghasilan" class="formbold-form-input" value="{{ $bio_ortu->penghasilan_ortu ?? '' }}"/>
  </div>

  <div class="formbold-radio-flex m-2 flex-column flex-sm-row">
    <div class="formbold-radio-group">
      <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="penghasilan_per" id="penghasilan_per" value="hari" @checked(($bio_ortu->penghasilan_ortu_per ?? '') == 'hari')>
        perhari
        <span class="formbold-radio-checkmark"></span>
      </label>
    </div>

    <div class="formbold-radio-group">
      <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="penghasilan_per" id="penghasilan_per" value="minggu" @checked(($bio_ortu->penghasilan_ortu_per ?? '') == 'minggu')>
        perminggu
        <span class="formbold-radio-checkmark"></span>
      </label>
    </div>

    <div class="formbold-radio-group">
      <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="penghasilan_per" id="penghasilan_per" value="bulan" @checked(($bio_ortu->penghasilan_ortu_per ?? '') == 'bulan')>
        perbulan
        <span class="formbold-radio-checkmark"></span>
      </label>
    </div>
  </div>

  <div>
    <label for="alamat_ortu" class="formbold-form-label"> Alamat lengkap serta no. telp orangtua</label>
    <div class="input-group">
      <input type="text" name="alamat_ortu" id="alamat_ortu" placeholder="Alamat Lengkap Ortu" class="formbold-form-input col-sm-8" value="{{ $bio_ortu->alamat_ortu ?? '' }}"/>
      <input type="text" name="no_telp_ortu" placeholder="No. Hp Ortu" id="nomor_wali" class="formbold-form-input col-sm-4" value="{{ $bio_ortu->no_telp ?? '' }}"/>
    </div>
  </div>

{{-- form wali => not required, tdk wajib diisi --}}
          
<h3 class="mt-3 mb-3">*Bagi yang tidak tinggal dengan orang tua</h3>
    
  <div class="mb-2">
    <label for="wali" class="formbold-form-label"> Nama Wali </label>
    <input type="text" name="wali" placeholder="Nama Wali" id="wali" class="formbold-form-input" value="{{ $bio_wali->nama_wali ?? '' }}"/>
  </div>

  <div class="mb-2">
    <label for="pekerjaan_wali" class="formbold-form-label"> Pekerjaan Wali </label>
    <input type="text" name="pekerjaan_wali" placeholder="Pekerjaan Wali" id="pekerjaan_wali" class="formbold-form-input" value="{{ $bio_wali->pekerjaan_wali ?? '' }}"/>
  </div>

  <div class="mb-2">
    <label for="alamat_wali" class="formbold-form-label"> Alamat Lengkap serta no. telp wali</label>
    <div class="input-group">
      <input type="text" name="alamat_wali" id="alamat_wali" placeholder="Alamat Lengkap Wali" class="formbold-form-input col-sm-8" value="{{ $bio_wali->alamat_wali ?? '' }}"/>
      <input type="text" name="nomor_wali" placeholder="No. Hp Wali" id="nomor_wali" class="formbold-form-input col-sm-4" value="{{ $bio_wali->no_telp_wali ?? '' }}"/>
    </div>
  </div>

</div>