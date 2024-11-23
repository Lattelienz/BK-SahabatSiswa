<div class="formbold-form-step-3">

  <div class="mb-2">
      <label for="tgl_diterima" class="formbold-form-label"> Diterima di SMKN 2 Banjarmasin Tanggal : </label>
      <input type="date" name="tgl_diterima" id="tgl_diterima" class="formbold-form-input" value="{{ $bio_lain->tanggal_diterima ?? '' }}"/>
  </div>

  <div class="row mb-2">
    <div class="col-sm-6">
      <label for="anak_ke" class="formbold-form-label"> Siswa Anak Ke - </label>
      <input type="number" name="anak_ke" id="anak_ke" class="formbold-form-input" value="{{ $bio_lain->anak_ke ?? '' }}"/>
    </div>
    <div class="col-sm-6">
      <label for="jumlah_saudara" class="formbold-form-label"> Dari Jumlah Saudara </label>
      <input type="number" name="jumlah_saudara" id="jumlah_saudara" class="formbold-form-input" value="{{ $bio_lain->dari_jumlah_saudara ?? '' }}"/>
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-sm-6">
      <label for="keluarga_serumah" class="formbold-form-label"> Jumlah Anggota Keluarga yang Tinggal Serumah : </label>
      <input type="number" name="keluarga_serumah" id="keluarga_serumah" class="formbold-form-input" value="{{ $bio_lain->jumlah_orang_yg_serumah ?? '' }}"/>
    </div>
    <div class="col-sm-6">
      <label for="jumlah_tanggungan" class="formbold-form-label"> Jumlah Anggota Keluarga yang Menjadi Tanggungan Orang Tua : </label>
      <input type="number" name="jumlah_tanggungan" id="jumlah_tanggungan" class="formbold-form-input" value="{{ $bio_lain->jumlah_tanggungan_ortu ?? '' }}"/>
    </div>
  </div>

  <div class="formbold-input-flex mb-2">
    <div>
      <label for="kendaraan" class="formbold-form-label"> Pergi Ke Sekolah Dengan : </label>
      <input type="text" name="kendaraan" id="kendaraan" placeholder="Kendaraan/Diantar" class="formbold-form-input" value="{{ $bio_lain->kesekolah_memakai ?? '' }}"/>
    </div>
  </div>

  <div>
    <label for="tempat_tinggal" class="formbold-form-label"> Tempat Tinggal : </label>
    <div class="formbold-radio-flex flex-column flex-sm-row">
      <div class="formbold-radio-group">
        <label class="formbold-radio-label">
          <input class="formbold-input-radio" type="radio" name="tempat_tinggal" id="tempat_tinggal" value="Milik sendiri" @checked(($bio_lain->tempat_tinggal ?? '') == 'Milik sendiri')>
          Milik Sendiri
          <span class="formbold-radio-checkmark"></span>
        </label>
      </div>
      <div class="formbold-radio-group">
        <label class="formbold-radio-label">
          <input class="formbold-input-radio" type="radio" name="tempat_tinggal" id="tempat_tinggal" value="Sewa" @checked(($bio_lain->tempat_tinggal ?? '') == 'Sewa')>
          Sewa
          <span class="formbold-radio-checkmark"></span>
        </label>
      </div>
      <div class="formbold-radio-group">
        <label class="formbold-radio-label">
          <input class="formbold-input-radio" type="radio" name="tempat_tinggal" id="tempat_tinggal" value="Milik keluarga" @checked(($bio_lain->tempat_tinggal ?? '') == 'Milik keluarga')>
          Milik Keluarga
          <span class="formbold-radio-checkmark"></span>
        </label>
      </div>
      <div class="formbold-radio-group">
        <label class="formbold-radio-label">
          <input class="formbold-input-radio" type="radio" name="tempat_tinggal" id="tempat_tinggal" value="Rumah dinas" @checked(($bio_lain->tempat_tinggal ?? '') == 'Rumah dinas')>
          Rumah Dinas
          <span class="formbold-radio-checkmark"></span>
        </label>
      </div>
      <div class="formbold-radio-group">
        <label class="formbold-radio-label">
          <input class="formbold-input-radio" type="radio" name="tempat_tinggal" id="tempat_tinggal" value="Lainnya" @checked( !empty($bio_lain->tempat_tinggal) && !in_array($bio_lain->tempat_tinggal, ['Sewa', 'Rumah dinas', 'Milik sendiri', 'Milik keluarga']))>
          Lainnya
          <span class="formbold-radio-checkmark"></span>
        </label>
      </div>
    </div>

    <input type="text" class="formbold-form-input mt-3 d-none" name="tempat_tinggal_lain" id="tempat_tinggal_lainnya" disabled value="{{ $bio_lain->tempat_tinggal ?? '' }}">
  </div>

  <div class="mt-3">
    <label for="penerangan" class="formbold-form-label"> Tempat Tinggal Menggunakan Penerang : </label>
    <div class="formbold-radio-flex flex-column flex-sm-row">
      <div class="formbold-radio-group">
        <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="penerangan" id="penerangan" value="Listrik" @checked(($bio_lain->penerangan ?? '') == 'Listrik')>
        Listrik
        <span class="formbold-radio-checkmark"></span>
        </label>
      </div>
      <div class="formbold-radio-group">
        <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="penerangan" id="penerangan" value="Lampu tembok" @checked(($bio_lain->penerangan ?? '') == 'Lampu tembok')>
        Lampu Tembok
        <span class="formbold-radio-checkmark"></span>
        </label>
      </div>
      <div class="formbold-radio-group">
        <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="penerangan" id="penerangan" value="Lilin" @checked(($bio_lain->penerangan ?? '') == 'Lilin')>
        Lilin
        <span class="formbold-radio-checkmark"></span>
        </label>
      </div>
      <div class="formbold-radio-group">
        <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="penerangan" id="penerangan" value="Lainnya" @checked( !empty($bio_lain->penerangan) && !in_array($bio_lain->penerangan, ['Listrik', 'Lampu tembok', 'Lilin']))>
        Lainnya
        <span class="formbold-radio-checkmark"></span>
      </label>
      </div>
    </div>

    <input type="text" class="formbold-form-input mt-3 d-none" name="penerangan_lain" id="penerangan_lainnya" disabled value="{{ $bio_lain->penerangan ?? '' }}">
  </div>

  <div class="mt-3">
    <label for="tempat_tinggal" class="formbold-form-label"> Apakah Memiliki : </label>
  </div>

  <div class="formbold-input-flex">
    
    <div class="d-flex flex-column flex-sm-row">
      <label for="hp" class="formbold-form-label mb-0 mb-sm-2">HP</label>
      <div class="mb-2 mx-0 mx-sm-2 formbold-radio-flex flex-column flex-sm-row">
        <div class="formbold-radio-group">
          <label class="formbold-radio-label">
          <input class="formbold-input-radio" type="radio" name="hp" id="hp" value="punya" @checked(($bio_lain->hp ?? '') == 'punya')>
          Ada
          <span class="formbold-radio-checkmark"></span>
          </label>
        </div>
        <div class="formbold-radio-group">
          <label class="formbold-radio-label">
          <input class="formbold-input-radio" type="radio" name="hp" id="hp" value="tidak" @checked(($bio_lain->hp ?? '') == 'tidak')>
          Tidak
          <span class="formbold-radio-checkmark"></span>
          </label>
        </div>
      </div>
    </div>

    <div class="d-flex flex-column flex-sm-row">
      <label for="laptop" class="formbold-form-label">Laptop</label>
      <div class="mb-2 mx-0 mx-sm-2 formbold-radio-flex flex-column flex-sm-row">
        <div class="formbold-radio-group">
          <label class="formbold-radio-label">
          <input class="formbold-input-radio" type="radio" name="laptop" id="laptop" value="punya" @checked(($bio_lain->laptop ?? '') == 'punya')>
          Ada
          <span class="formbold-radio-checkmark"></span>
          </label>
        </div>
        <div class="formbold-radio-group">
          <label class="formbold-radio-label">
          <input class="formbold-input-radio" type="radio" name="laptop" id="laptop" value="tidak" @checked(($bio_lain->laptop ?? '') == 'tidak')>
          Tidak
          <span class="formbold-radio-checkmark"></span>
          </label>
        </div>
      </div>
    </div>

  </div>

  <div class="mt-3">
    <label for="pjj" class="formbold-form-label"> Saat Belajar Daring Menggunakan : </label>
    
    <div class="formbold-radio-flex flex-column flex-sm-row">
      <div class="formbold-radio-group">
        <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="pjj" id="pjj" value="Wifi sendiri" @checked(($bio_lain->pjj_memakai ?? '') == 'Wifi sendiri')>
        WIFI Sendiri
        <span class="formbold-radio-checkmark"></span>
        </label>
      </div>
      <div class="formbold-radio-group">
        <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="pjj" id="pjj" value="Wifi tetangga" @checked(($bio_lain->pjj_memakai ?? '') == 'Wifi tetangga')>
        WIFI Tetangga
        <span class="formbold-radio-checkmark"></span>
        </label>
      </div>
      <div class="formbold-radio-group">
        <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="pjj" id="pjj" value="Kuota" @checked(($bio_lain->pjj_memakai ?? '') == 'Kuota')>
        Kuota
        <span class="formbold-radio-checkmark"></span>
      </label>
      </div>
      <div class="formbold-radio-group">
        <label class="formbold-radio-label">
          <input class="formbold-input-radio" type="radio" name="pjj" id="pjj" value="Lainnya" @checked( !empty($bio_lain->pjj_memakai) && !in_array($bio_lain->pjj_memakai, ['Wifi sendiri', 'Wifi tetangga', 'Kuota']))>
          Lainnya
          <span class="formbold-radio-checkmark"></span>
        </label>
      </div>
    </div>

    <input type="text" class="formbold-form-input mt-3 d-none" name="pjj_lain" id="pjj_lainnya" disabled value="{{ $bio_lain->pjj_memakai ?? '' }}">
  </div>

  <div class="mt-3">
    <label for="not_fav_mapel" class="formbold-form-label"> Pelajaran Yang Kurang Disenangi : </label>
    <input type="text" name="not_fav_mapel" placeholder="" id="not_fav_mapel" class="formbold-form-input" value="{{ $bio_lain->pelajaran_yg_tdk_disuka ?? '' }}"/>
  </div>

  <div class="mt-3">
    <label for="fav_mapel" class="formbold-form-label"> Pelajaran Yang Disenangi : </label>
    <input type="text" name="fav_mapel" placeholder="" id="fav_mapel" class="formbold-form-input" value="{{ $bio_lain->pelajaran_yg_disuka ?? '' }}"/>
  </div>

  <div class="mt-3">
    <label for="cita_cita" class="formbold-form-label"> Cita-cita Setelah Tamat SMKN 2 : </label>
    <input type="text" name="cita_cita" placeholder="" id="cita_cita" class="formbold-form-input" value="{{ $bio_lain->cita_cita ?? '' }}"/>
  </div>

  <div class="mt-3">
    <label for="hobi" class="formbold-form-label"> Hobby / Kegemaran : </label>
    <input type="text" name="hobi" placeholder="" id="hobi" class="formbold-form-input" value="{{ $bio_lain->hobby ?? '' }}"/>
  </div>

  <div class="mt-3">
    <label for="curhat" class="formbold-form-label"> Tempat Mencurahkan Isi Hati : </label>
    <input type="text" name="curhat" placeholder="" id="curhat" class="formbold-form-input" value="{{ $bio_lain->tmpt_curhat ?? '' }}"/>
  </div>

  <div class="mt-3">
    <label for="penyakit" class="formbold-form-label"> Penyakit Yang Diderita (Yang Mengganggu Belajar) : </label>
    <input type="text" name="penyakit" placeholder="" id="penyakit" class="formbold-form-input" value="{{ $bio_lain->penyakit_mengganggu ?? '' }}"/>
  </div>

  <div class="mt-3">
    <label for="bahasa" class="formbold-form-label"> Bahasa Yang Digunakan : </label>
    <input type="text" name="bahasa" placeholder="" id="bahasa" class="formbold-form-input" value="{{ $bio_lain->bhs_sehari_hari ?? '' }}"/>
  </div>

  <div class="mt-3">
    <label for="suku" class="formbold-form-label"> Suku : </label>
    <input type="text" name="suku" placeholder="" id="suku" class="formbold-form-input" value="{{ $bio_lain->suku ?? '' }}"/>
  </div>
</div>