<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Biodata_Ortu_Siswa;
use App\Models\Biodata_siswa;
use App\Models\Biodata_wali;
use App\Models\Data_siswa_lainnya;
use App\Models\guru;
use App\Models\siswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function store(Request $request){

        // pertama, data yang masuk diperiksa terlebih dahulu melalui validator
        $validation = Validator::make($request->all(),[
            'nama_lengkap'  => 'required',
            'email'         => 'required|email',
            'password'      => 'required',
        ]);

        // lalu jika data yang dimasukkan tidak sesuai ketentuan, maka kode dibawah akan berjalan
        if( $validation->fails() ) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation)
                ->with('openModal', true);
        } 
        // jika data sesuai, maka kode diatas tidak akan berjalan

        // data diurutkan dalam array
        $data = ([
            'nama_lengkap'  => $request->nama_lengkap,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'level'         => $request->level,
        ]);

        if($data) {

            User::create($data);

            if ($request->NIS && $request->jurusan && $request->kelas) {
                $siswa = ([
                    'nis'           => $request->NIS,
                    'id_user'       => User::where('email', $request->email)->first()->id,
                    'id_jurusan'    => $request->jurusan,
                    'kelas'         => $request->kelas
                ]);
    
                siswa::create($siswa);
                User::where('email', $request->email)->first()->assignRole('Siswa');
            }
    
            elseif ($request->jurusan && $request->jabatan) {
                $guru = ([
                    'id_user'       => User::where('email', $request->email)->first()->id,
                    'id_jurusan'    => $request->jurusan,
                    'jabatan'       => $request->jabatan,
                ]);
    
                guru::create($guru);
                User::where('email', $request->email)->first()->assignRole('Guru');
            }
            // data yang diinput kemudian diolah menjadi sebuah data baru

            // mengembalikan pengguna ke halaman dashboard
            return back()->with('success', 'Data User berhasil ditambahkan');
        }

        return back()->with(['alert' => true, 'text' => 'Error dalam memasukkan data, coba lagi!']);
        
    }
    // end

    // function to edit users
    public function edit($id) {
        $data = User::with([
            'siswa.jurusan', 'guru.jurusan'
        ])->find($id);

        return response()->json(['user' => $data]);
    }

    public function update(Request $request, $id)
    {

        if ($request->email && $request->level) {
            // pertama, data yang masuk diperiksa terlebih dahulu melalui validator
            $validation = Validator::make($request->all(),[
                'email'         => 'required|email',
                'nis'           => 'unique',
            ]);
    
            // lalu jika data yang dimasukkan tidak sesuai ketentuan, maka kode dibawah akan berjalan
            if( $validation->fails() ) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation)
                    ->with('openEditModal', true);
            }
            // jika data sesuai, maka kode diatas tidak akan berjalan
            
            if ($request->file()) {
                $filepath = $request->file('foto')->store('profile-images');
            }
    
            // data diurutkan dalam array
            $data = ([
                'nama_lengkap'  => $request->nama_lengkap,
                'email'         => $request->email,
                'level'         => $request->level,
                'jenis_kelamin' => $request->jenis_kelamin
            ]);
            
            // kode dibawah berjalan jika data yang masuk memiliki password
            if($request->newPassword) {
                $data['password'] = Hash::make($request->newPassword);
            }
    
            // Memperbarui data user
            User::whereId($id)->update($data);
    
            if ($request->nis && $request->jurusan && $request->kelas) {
                $siswa = ([
                    'nis'           => $request->NIS,
                    'id_jurusan'    => $request->jurusan,
                    'kelas'         => $request->kelas
                ]);
    
                siswa::where('id_user', $id)->update($siswa);
            }
    
            if ($request->jurusan && $request->jabatan) {
                $guru = ([
                    'id_jurusan'    => $request->jurusan,
                    'jabatan'       => $request->jabatan,
                ]);
    
                guru::where('id_user', $id)->update($guru);            
            }
        
            // Mengarahkan pengguna ke halaman dashboard
            return back()->with('success', 'Data berhasil di edit');
    
            // dd dipakai untuk debugging data :
            // dd ($data);
        }


        // profile edit upload
        else {
            $result = User::whereId($id)->first();

            $validation = validator::make($request->all(),[
                'photo'         => 'image|max:5000',
            ]);

            if($validation->fails()){
                return redirect()->back()
                ->withInput()
                ->withErrors($validation);
            }

            $filepath = $request->file('photo') ? $request->file('photo')->store('profile-images') : $result->photo;

            // data diurutkan dalam array
            $data = ([
                'nama_lengkap'  => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'photo'         => $filepath,
                'no_telp'       => $request->no_telp
            ]);

            if($result->nama_lengkap != $request->nama_lengkap || 
               $result->jenis_kelamin != $request->jenis_kelamin ||
               isset($data['photo']) ||
               $result->no_telp != $request->no_telp
            ) {
                User::whereId($id)->update($data);
            }

            return redirect()->back();
        }

        return redirect()->back();
    }
    // end

    // function to delete users
    public function delete($id) {
        $data = User::find($id);
    
        if ($data) {
            $data->delete();
        }
    
        return redirect()->route('user.dashboard');
    }
    // end
    
    public function form() {

        $siswa = Siswa::with([
            'biodata',
            'bio_ortu',
            'bio_wali',
            'bio_lainnya',
        ])->where('id_user', Auth::id())->first();

        if ($siswa->biodata !== null) {
            $biodata        = $siswa->biodata;
            $bio_ortu       = $siswa->bio_ortu;
            $bio_wali       = $siswa->bio_wali;
            $bio_lain       = $siswa->bio_lainnya;

            return view('form.head', compact('siswa', 'biodata', 'bio_ortu', 'bio_wali', 'bio_lain'));
        }

        return view('form.head');
    }

    public function formProcess(Request $request) {
        
        // dd($request);

        $validation = Validator::make($request->all(), [
            'nis'           => 'required',
            'nama_lengkap'  => 'required',
            'nama_panggilan'=> 'required',
            'agama'         => 'required',    
            'nomor'         => 'required',    
            'jenis_k'       => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'asal'          => 'required',    
            'nilai'         => 'required',
            'alamat'        => 'required', 
        ]); 

        if ($validation->fails()) {
            return redirect()->back()
            ->withInput()
            ->with('danger', 'Kamu masih belum selesai mengisi ke dalam form, silahkan masukkan sisanya...');
        }

        if ($request->file('foto')) {
            $request->validate([
                'foto' => 'image|max:15360'
            ]);
            
            $filepath = $request->file('foto')->store('profile-images');
        }

        $nis = $request->nis;
        $find = User::find(Auth::id());

        $user = ([
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_k'       => $request->jenis_k,
            'photo'         => !empty($filepath) ? $filepath : $find->photo
        ]);

        $find->update($user);

        $tbl_siswa = ([
            'id_user'       => $find->id,
            'nis'           => $request->nis,
            'id_jurusan'    => $find->siswa->id_jurusan
        ]);
        
        siswa::where('id_user', $find->id)->update($tbl_siswa);
        
        $bio = [
            'nis'               => $request->nis,
            'nama_panggilan'    => $request->nama_panggilan,
            'agama'             => $request->agama,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'no_telp'           => $request->nomor,
            'asal_smp'          => $request->asal,
            'nilai_ujian_akhir' => $request->nilai,
            'alamat_sekarang'   => $request->alamat,
        ];

        $bio_wali = [
            'nis'            => $request->nis,
            'nama_wali'      => $request->wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'alamat_wali'    => $request->alamat_wali,
            'no_telp_wali'   => $request->nomor_wali,
        ];

        $bio_ortu = [
            'nis'                   => $request->nis,
            'nama_ayah'             => $request->nama_ayah,
            'nama_ibu'              => $request->nama_ibu,
            'pendidikan_ayah'       => $request->pendidikan_ayah,
            'pendidikan_ibu'        => $request->pendidikan_ibu,
            'pekerjaan_ayah'        => $request->pekerjaan_ayah,
            'pekerjaan_ibu'         => $request->pekerjaan_ibu,
            'penghasilan_ortu'      => $request->penghasilan,
            'penghasilan_ortu_per'  => $request->penghasilan_per,
            'alamat_ortu'           => $request->alamat_ortu,
            'no_telp'               => $request->no_telp_ortu,
        ];

        $bio_lainnya = [
            'nis'                       => $request->nis,
            'tanggal_diterima'          => $request->tgl_diterima,
            'anak_ke'                   => $request->anak_ke,
            'dari_jumlah_saudara'       => $request->jumlah_saudara,
            'jumlah_orang_yg_serumah'   => $request->keluarga_serumah,
            'jumlah_tanggungan_ortu'    => $request->jumlah_tanggungan,
            'kesekolah_memakai'         => $request->kendaraan,
            'tempat_tinggal'            => $request->tempat_tinggal == 'Lainnya' ? $request->tempat_tinggal_lain : $request->tempat_tinggal,
            'penerangan'                => $request->penerangan == 'Lainnya' ? $request->penerangan_lain : $request->penerangan,
            'hp'                        => $request->hp,
            'laptop'                    => $request->laptop,
            'pjj_memakai'               => $request->pjj == 'Lainnya' ? $request->pjj_lain : $request->pjj,
            'pelajaran_yg_tdk_disuka'   => $request->not_fav_mapel,
            'pelajaran_yg_disuka'       => $request->fav_mapel,
            'cita_cita'                 => $request->cita_cita,
            'hobby'                     => $request->hobi,
            'tmpt_curhat'               => $request->curhat,
            'penyakit_mengganggu'       => $request->penyakit,
            'bhs_sehari_hari'           => $request->bahasa,
            'suku'                      => $request->suku,
        ];

        dd($bio_wali);
        
        if (Biodata_siswa::where('nis', $nis)) {            
            Biodata_siswa::where('nis', $nis)->update($bio);
            // storing the wali data inputted from siswa, if only the siswa input it
            if ($request->wali && $request->wali && $request->pekerjaan_wali && $request->alamat_wali && $request->nomor_wali) {
                Biodata_wali::where('nis', $nis)->update($bio_wali);
            }
            // if not, then it will input the ortu code
            Biodata_Ortu_Siswa::where('nis', $nis)->update($bio_ortu);
            Data_siswa_lainnya::where('nis', $nis)->update($bio_lainnya);

            return redirect()->route('user.dashboard');
        }

        Biodata_siswa::UpdateOrCreate($bio); 
        // storing the wali data inputted from siswa, if only the siswa input it
        if ($request->wali && $request->wali && $request->pekerjaan_wali && $request->alamat_wali && $request->nomor_wali) {
            Biodata_wali::UpdateOrCreate($bio_wali);
        }
        // if not, then it will input the ortu code
        Biodata_Ortu_Siswa::UpdateOrCreate($bio_ortu);
        Data_siswa_lainnya::UpdateOrCreate($bio_lainnya);

        return redirect()->route('user.dashboard');

    }
    
}
