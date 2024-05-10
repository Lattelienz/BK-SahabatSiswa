<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>Form Biodata</title>

  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>
<body>
  
  <div class="formbold-main-wrapper">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="formbold-form-wrapper">
      <div class="formbold-form-title">
        <h2 class="">Silahkan Isi Biodata</h2>
        <p>
         Biodata akan dimasukkan ke dalam profil anda
        </p>
      </div>
      <form action="{{route('user.dashboard')}}" method="GET">
        @csrf
          <div class="formbold-steps">
              <ul>
                  <li class="formbold-step-menu1 active">
                      <span>1</span>
                      
                  </li> 
                  <li class="formbold-step-menu2">
                      <span>2</span>
                      
                  </li>
                  <li class="formbold-step-menu3">
                      <span>3</span>
                      
                  </li>
              </ul>
          </div>

          {{-- Form step-1 biodata siswa --}}
  
        <div class="formbold-form-step-1 active">
          <div class="formbold-input-flex">
            <div>
              <label for="nis" class="formbold-form-label"> NIS </label>
              <input
              type="text"
              name="nis"
              placeholder="Nis"
              id="nis"
              class="formbold-form-input"
              />
            </div>
          </div>
            <div class="formbold-input-flex">
              <div>
                  <label for="firstname" class="formbold-form-label"> Nama Lengkap </label>
                  <input
                  type="text"
                  name="firstname"
                  placeholder="Nama"
                  id="firstname"
                  class="formbold-form-input"
                  />
              </div>
              <div>
                  <label for="lastname" class="formbold-form-label"> Nama Panggilan </label>
                  <input
                  type="text"
                  name="lastname"
                  placeholder="Panggilan"
                  id="lastname"
                  class="formbold-form-input"
                  />
              </div>
            </div>

            <div class="formbold-input-flex">
              <div>
                  <label for="agama" class="formbold-form-label"> Agama </label>
                  <input
                  type="text"
                  name="agama"
                  placeholder="Agama"
                  id="agama"
                  class="formbold-form-input"
                  />
              </div>
              <div class="formbold-mb-3">
                <label class="formbold-form-label">Jenis Kelamin</label>
        
                <select class="formbold-form-input" name="occupation" id="occupation">
                  <option value="male">Laki-Laki</option>
                  <option value="female">Perempuan</option>
                </select>
              </div>
            </div>
    
            <div class="formbold-input-flex">
                <div>
                    <label for="dob" class="formbold-form-label"> Tempat Tanggal Lahir </label>
                    <input 
                    type="date" 
                    name="dob" 
                    id="dob" 
                    class="formbold-form-input"
                    />
                </div>
                <div>
                    <label for="nomor" class="formbold-form-label"> No HP/Telp </label>
                    <input
                    type="text"
                    name="nomor"
                    placeholder="no hp"
                    id="nomor"
                    class="formbold-form-input"
                    />
                </div>
            </div>
            <div class="formbold-input-flex">
              <div>
                <label for="asal" class="formbold-form-label"> Asal Smp/Mts/Sederajat </label>
                <input
                type="text"
                name="asal"
                id="asal"
                placeholder="Sekolah asal"
                class="formbold-form-input"
                />
              </div>
              <div>
              <label for="nilai" class="formbold-form-label"> Nilai Ujian Akhir </label>
              <input
              type="text"
              name="nilai"
              id="nilai"
              placeholder="Nilai Ujian Akhir"
              class="formbold-form-input"
              />
              </div>
            </div>
    
            <div>
                <label for="Alamat" class="formbold-form-label"> Alamat Siswa Sekarang </label>
                <input
                type="text"
                name="Alamat"
                id="Alamat"
                placeholder="Alamat Lengkap"
                class="formbold-form-input"
                />
            </div>
        </div>

          {{-- form step-2 biodata orangtua/wali --}}
  
      <div class="formbold-form-step-2">
          <div class="formbold-input-flex">
            <div>
                <label for="nama_ayah" class="formbold-form-label"> Nama Ayah </label>
                <input
                type="text"
                name="nama_ayah"
                placeholder="Nama Ayah"
                id="nama_ayah"
                class="formbold-form-input"
                />
            </div>
            <div>
                <label for="nama_ibu" class="formbold-form-label"> Nama Ibu </label>
                <input
                type="text"
                name="nama_ibu"
                placeholder="Nama Ibu"
                id="nama_ibu"
                class="formbold-form-input"
                />
            </div>
          </div>
          <div class="formbold-input-flex">
            <div>
                <label for="pendidikan_ayah" class="formbold-form-label"> Pendidikan Ayah </label>
                <input
                type="text"
                name="pendidikan_ayah"
                placeholder="Pendidikan Ayah"
                id="pendidikan_ayah"
                class="formbold-form-input"
                />
            </div>
            <div>
                <label for="pendidikan_ibu" class="formbold-form-label"> Pendidikan Ibu </label>
                <input
                type="text"
                name="pendidikan_ibu"
                placeholder="Pendidikan Ibu"
                id="pendidikan_ibu"
                class="formbold-form-input"
                />
            </div>
          </div>
          <div class="formbold-input-flex">
            <div>
                <label for="pekerjaan_ayah" class="formbold-form-label"> Pekerjaan Ayah </label>
                <input
                type="text"
                name="pekerjaan_ayah"
                placeholder="Pekerjaan Ayah"
                id="pekerjaan_ayah"
                class="formbold-form-input"
                />
            </div>
            <div>
                <label for="pekerjaan_ibu" class="formbold-form-label"> Pekerjaan Ibu </label>
                <input
                type="text"
                name="pekerjaan_ibu"
                placeholder="Pekerjaan Ibu"
                id="pekerjaan_ibu"
                class="formbold-form-input"
                />
            </div>
          </div>
          <div>
            <label for="penghasilan" class="formbold-form-label"> Penghasilan Orang tua </label>
            <input
            type="text"
            name="penghasilan"
            placeholder="Rp."
            id="penghasilan"
            class="formbold-form-input"
            />
          </div>
        <div class="formbold-radio-flex mt-2">
            <div class="formbold-radio-group">
              <label class="formbold-radio-label">
                <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
                perhari
                <span class="formbold-radio-checkmark"></span>
              </label>
            </div>

            <div class="formbold-radio-group">
              <label class="formbold-radio-label">
                <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
                perminggu
                <span class="formbold-radio-checkmark"></span>
              </label>
            </div>

            <div class="formbold-radio-group">
              <label class="formbold-radio-label">
                <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
                perbulan
                <span class="formbold-radio-checkmark"></span>
              </label>
            </div>
      </div>

      {{-- form wali---> not required, tdk wajib diisi --}}
          
          <h3 class="mt-3 mb-3">*Bagi yang tidak tinggal dengan orang tua</h3>
    
          <div>
            <label for="wali" class="formbold-form-label"> Nama Wali </label>
            <input
            type="text"
            name="wali"
            placeholder="Nama Wali"
            id="wali"
            class="formbold-form-input"
            />
          </div>
          <br>
          <div>
            <label for="pekerjaan_wali" class="formbold-form-label"> Pekerjaan Wali </label>
            <input
            type="text"
            name="pekerjaan_wali"
            placeholder="Pekerjaan Wali"
            id="pekerjaan_wali"
            class="formbold-form-input"
            />
          </div>
          <br>
          <div>
            <label for="alamat_wali" class="formbold-form-label"> Alamat Lengkap Wali</label>
            <input
            type="text"
            name="alamat_wali"
            id="alamat_wali"
            placeholder="Alamat Lengkap Wali"
            class="formbold-form-input"
            />
        </div>
        <br>
        <div>
          <label for="nomor_wali" class="formbold-form-label"> No Hp Wali </label>
          <input
          type="text"
          name="nomor_wali"
          placeholder="No Hp Wali"
          id="nomor_wali"
          class="formbold-form-input"
          />
        </div>
    </div>
        
        {{-- form step-3 pertanyaan lainnya --}}
      
          <div class="formbold-form-step-3">
            <div>
              <label for="tgl_diterima" class="formbold-form-label"> Diterima di SMKN 2 Banjarmasin Tanggal : </label>
              <input 
              type="date" 
              name="tgl_diterima" 
              id="tgl_diterima" 
              class="formbold-form-input"
              />
          </div>
          <br>

          <div class="formbold-input-flex">
            <div>
              <label for="anak_ke" class="formbold-form-label"> Siswa Anak Ke - </label>
              <input
              type="number"
              name="anak_ke"
              id="anak_ke"
              placeholder=""
              class="formbold-form-input"
              />
            </div>
            <div>
            <label for="jumlah_saudara" class="formbold-form-label"> Dari Jumlah Saudara </label>
            <input
            type="number"
            name="jumlah_saudara"
            id="jumlah_saudara"
            placeholder=""
            class="formbold-form-input"
            />
            </div>
          </div>
    
        <div>
            <label for="keluarga_serumah" class="formbold-form-label"> Jumlah Anggota Keluarga yang Tinggal Serumah : </label>
            <input 
            type="number" 
            name="keluarga_serumah" 
            id="keluarga_serumah" 
            class="formbold-form-input"
            />
        </div>
        <br>
        <div>
          <label for="jumlah_tanggungan" class="formbold-form-label"> Jumlah Anggota Keluarga yang Menjadi Tanggungan Orang Tua : </label>
          <input 
          type="number" 
          name="jumlah_tanggungan" 
          id="jumlah_tanggungan" 
          class="formbold-form-input"
          />
      </div>
      <br>

      <div class="formbold-input-flex">
        <div>
          <label for="kendaraan" class="formbold-form-label"> Pergi Ke Sekolah Dengan : </label>
          <input
          type="text"
          name="kendaraan"
          id="kendaraan"
          placeholder="Kendaraan"
          class="formbold-form-input"
          />
        </div>
      </div>
  
      <div>
        <label for="tempat_tinggal" class="formbold-form-label"> Tempat Tinggal : </label>
      </div>
      <div class="formbold-radio-flex">
        <div class="formbold-radio-group">
          <label class="formbold-radio-label">
            <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
            Milik Sendiri
            <span class="formbold-radio-checkmark"></span>
          </label>
        </div>
        <div class="formbold-radio-group">
          <label class="formbold-radio-label">
            <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
            Sewa
            <span class="formbold-radio-checkmark"></span>
          </label>
        </div>
        <div class="formbold-radio-group">
          <label class="formbold-radio-label">
            <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
            Milik Keluarga
            <span class="formbold-radio-checkmark"></span>
          </label>
        </div>
        <div class="formbold-radio-group">
          <label class="formbold-radio-label">
            <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
            Rumah Dinas
            <span class="formbold-radio-checkmark"></span>
          </label>
        </div>
        <div class="formbold-radio-group">
          <label class="formbold-radio-label">
            <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
            Lainnya
            <span class="formbold-radio-checkmark"></span>
          </label>
        </div>
  </div>

  <div class="mt-3">
    <label for="penerangan" class="formbold-form-label"> Tempat Tinggal Menggunakan Penerang : </label>
  </div>
  <div class="formbold-radio-flex">
    <div class="formbold-radio-group">
      <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
        Listrik
        <span class="formbold-radio-checkmark"></span>
      </label>
    </div>
    <div class="formbold-radio-group">
      <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
        Lampu Tembok
        <span class="formbold-radio-checkmark"></span>
      </label>
    </div>
    <div class="formbold-radio-group">
      <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
        Lilin
        <span class="formbold-radio-checkmark"></span>
      </label>
    </div>
    <div class="formbold-radio-group">
      <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
        Lainnya
        <span class="formbold-radio-checkmark"></span>
      </label>
    </div>
</div>

<div class="mt-3">
  <label for="tempat_tinggal" class="formbold-form-label"> Apakah Memiliki : </label>
</div>
<div class="formbold-input-flex">
  <div class="formbold-radio-flex">
    <label for="hp" class="formbold-form-label"> HP </label>
    <div class="formbold-radio-group">
      <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
        Ada
        <span class="formbold-radio-checkmark"></span>
      </label>
    </div>
    <div class="formbold-radio-group">
      <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
        Tidak
        <span class="formbold-radio-checkmark"></span>
      </label>
    </div>
  </div>
  <div class="formbold-radio-flex">
    <label for="hp" class="formbold-form-label"> Laptop </label>
    <div class="formbold-radio-group">
      <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
        Ada
        <span class="formbold-radio-checkmark"></span>
      </label>
    </div>
    <div class="formbold-radio-group">
      <label class="formbold-radio-label">
        <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
        Tidak
        <span class="formbold-radio-checkmark"></span>
      </label>
    </div>
  </div>
</div>

<div class="mt-3">
  <label for="penerangan" class="formbold-form-label"> Saat Belajar Daring Menggunakan : </label>
</div>
<div class="formbold-radio-flex">
  <div class="formbold-radio-group">
    <label class="formbold-radio-label">
      <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
      WIFI Sendiri
      <span class="formbold-radio-checkmark"></span>
    </label>
  </div>
  <div class="formbold-radio-group">
    <label class="formbold-radio-label">
      <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
      WIFI Tetangga
      <span class="formbold-radio-checkmark"></span>
    </label>
  </div>
  <div class="formbold-radio-group">
    <label class="formbold-radio-label">
      <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
      Kuota
      <span class="formbold-radio-checkmark"></span>
    </label>
  </div>
  <div class="formbold-radio-group">
    <label class="formbold-radio-label">
      <input class="formbold-input-radio" type="radio" name="jobtitle" id="jobtitle">
      Lainnya
      <span class="formbold-radio-checkmark"></span>
    </label>
  </div>
</div>

<div class="mt-3">
  <label for="not_fav_mapel" class="formbold-form-label"> Pelajaran Yang Kurang Disenangi : </label>
  <input
  type="text"
  name="not_fav_mapel"
  placeholder=""
  id="not_fav_mapel"
  class="formbold-form-input"
  />
</div>
<div class="mt-3">
  <label for="fav_mapel" class="formbold-form-label"> Pelajaran Yang Disenangi : </label>
  <input
  type="text"
  name="fav_mapel"
  placeholder=""
  id="fav_mapel"
  class="formbold-form-input"
  />
</div>
<div class="mt-3">
  <label for="cita_cita" class="formbold-form-label"> Cita-cita Setelah Tamat SMKN 2 : </label>
  <input
  type="text"
  name="cita_cita"
  placeholder=""
  id="cita_cita"
  class="formbold-form-input"
  />
</div>
<div class="mt-3">
  <label for="hobi" class="formbold-form-label"> Hobby / Kegemaran : </label>
  <input
  type="text"
  name="hobi"
  placeholder=""
  id="hobi"
  class="formbold-form-input"
  />
</div>
<div class="mt-3">
  <label for="curhat" class="formbold-form-label"> Tempat Mencurahkan Isi Hati : </label>
  <input
  type="text"
  name="curhat"
  placeholder=""
  id="curhat"
  class="formbold-form-input"
  />
</div>
<div class="mt-3">
  <label for="penyakit" class="formbold-form-label"> Penyakit Yang Diderita (Yang Mengganggu Belajar) : </label>
  <input
  type="text"
  name="penyakit"
  placeholder=""
  id="penyakit"
  class="formbold-form-input"
  />
</div>
<div class="mt-3">
  <label for="bahasa" class="formbold-form-label"> Bahasa Yang Digunakan : </label>
  <input
  type="text"
  name="bahasa"
  placeholder=""
  id="bahasa"
  class="formbold-form-input"
  />
</div>
<div class="mt-3">
  <label for="suku" class="formbold-form-label"> Suku : </label>
  <input
  type="text"
  name="suku"
  placeholder=""
  id="suku"
  class="formbold-form-input"
  />
</div>

            {{-- confirm text, bagian akhir form --}}


            <div class="formbold-form-confirm mt-5">
              <p>
                Silahkan cek kembali, lalu klik submit
              </p>
  
              {{-- ini isi div nya yes or no begitu, keknya bisa buat ngecek lagi atau validasi tpi zhd kd bisa menggunakannya:> --}}
              {{-- <div>
                <button class="formbold-confirm-btn active">
                  <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="11" cy="11" r="10.5" fill="white" stroke="#DDE3EC"/>
                  <g clip-path="url(#clip0_1667_1314)">
                  <path d="M9.83343 12.8509L15.1954 7.48828L16.0208 8.31311L9.83343 14.5005L6.12109 10.7882L6.94593 9.96336L9.83343 12.8509Z" fill="#536387"/>
                  </g>
                  <defs>
                  <clipPath id="clip0_1667_1314">
                  <rect width="14" height="14" fill="white" transform="translate(4 4)"/>
                  </clipPath>
                  </defs>
                  </svg>
                  Yes! I want it.
                </button>
  
                <button class="formbold-confirm-btn">
                  <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="11" cy="11" r="10.5" fill="white" stroke="#DDE3EC"/>
                  <g clip-path="url(#clip0_1667_1314)">
                  <path d="M9.83343 12.8509L15.1954 7.48828L16.0208 8.31311L9.83343 14.5005L6.12109 10.7882L6.94593 9.96336L9.83343 12.8509Z" fill="#536387"/>
                  </g>
                  <defs>
                  <clipPath id="clip0_1667_1314">
                  <rect width="14" height="14" fill="white" transform="translate(4 4)"/>
                  </clipPath>
                  </defs>
                  </svg>
                  No! I don’t want it.
                </button>
              </div> --}}
            </div>
          </div> 

          {{-- button area keknya --}}
  
          <div class="formbold-form-btn-wrapper">
            <button class="formbold-back-btn">
              Kembali
            </button>
  
            <button class="formbold-btn">
              Selanjutnya
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_1675_1807)">
              <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white"/>
              </g>
              <defs>
              <clipPath id="clip0_1675_1807">
              <rect width="16" height="16" fill="white"/>
              </clipPath>
              </defs>
              </svg>
          </button>

          </div>
      </form>
    </div>
  </div>
  <script>
    const stepMenuOne = document.querySelector('.formbold-step-menu1')
    const stepMenuTwo = document.querySelector('.formbold-step-menu2')
    const stepMenuThree = document.querySelector('.formbold-step-menu3')
  
    const stepOne = document.querySelector('.formbold-form-step-1')
    const stepTwo = document.querySelector('.formbold-form-step-2')
    const stepThree = document.querySelector('.formbold-form-step-3')
  
    const formSubmitBtn = document.querySelector('.formbold-btn')
    const formBackBtn = document.querySelector('.formbold-back-btn')
  
    formSubmitBtn.addEventListener("click", function(event){
      event.preventDefault()
      if(stepMenuOne.className == 'formbold-step-menu1 active') {
          event.preventDefault()
  
          stepMenuOne.classList.remove('active')
          stepMenuTwo.classList.add('active')
  
          stepOne.classList.remove('active')
          stepTwo.classList.add('active')
  
          formBackBtn.classList.add('active')
          formBackBtn.addEventListener("click", function (event) {
            event.preventDefault()
  
            stepMenuOne.classList.add('active')
            stepMenuTwo.classList.remove('active')
  
            stepOne.classList.add('active')
            stepTwo.classList.remove('active')
  
            formBackBtn.classList.remove('active')
  
          })
  
        } else if(stepMenuTwo.className == 'formbold-step-menu2 active') {
          event.preventDefault()
  
          stepMenuTwo.classList.remove('active')
          stepMenuThree.classList.add('active')
  
          stepTwo.classList.remove('active')
          stepThree.classList.add('active')
  
          formBackBtn.classList.remove('active')
          formSubmitBtn.textContent = 'Submit'
        } else if(stepMenuThree.className == 'formbold-step-menu3 active') {
          document.querySelector('form').submit()
        }

    })
    
    
      
  
    
  </script>

</body>
</html>