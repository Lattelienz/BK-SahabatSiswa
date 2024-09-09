<?php

namespace App\Http\Controllers;

use App\Models\Biodata_Ortu_Siswa;
use App\Models\Biodata_siswa;
use App\Models\Biodata_wali;
use App\Models\Data_siswa_lainnya;
use App\Models\guru;
use App\Models\siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }
    
    public function dashboard(){
        
        if (session('data') == null && auth::user()->level == 'Admin') {
            $data = User::with('siswa.jurusan', 'guru.jurusan')->paginate(20);
        }
        else if (auth::user()->level == 'Siswa') {
            $data = User::with('siswa.jurusan')->find(auth::id());
        }
        else if (auth::user()->level == 'Guru') {
            $data = User::with('siswa.jurusan')->get();
        }
        else {
            $data = session('data');    
        }
        
        return view('dashboard', compact('data'));
    }

    public function search (Request $request) {

        if (request('search') !== null) {
        
            $query = $request->search;

            $data = User::Where('email', 'like', '%' . $query . '%')
                        ->orWhere('nama_lengkap', 'like', '%' . $query . '%')
                        ->paginate(20)
                        ->withQueryString();

            return back()->with('data', $data);
        }
        
        else {

            $query = $request->filter;

            $data = User::where('level', 'like', '%' . $query . '%')
                        ->paginate(20)
                        ->withQueryString();

            return back()->with('data', $data);
        }
    }

    public function showsiswa(request $request, $id){
        $result = User::with([
            'siswa' => [
                'jurusan',
                'biodata',
            ]
        ])->find($id);

        $siswa = $result->siswa;
        $jurusan = $siswa->jurusan;
        $bio = $siswa->biodata;

        if ($bio) {
            $bio_lain = $siswa->bio_lainnya;
            $bio_ortu = $siswa->bio_ortu;
            $bio_wali = $siswa->bio_wali;

            if ($request->get('export') == 'pdf'){
                $pdf = Pdf::loadView('showsiswa', [
                    'result' => $result,
                    'siswa' => $siswa,
                    'bio' => $bio,
                    'jurusan' => $jurusan,
                    'bio_lain' => $bio_lain,
                    'bio_ortu' => $bio_ortu,
                    'bio_wali' => $bio_wali,
                ]);
    
                // dd($siswa, $jurusan, $bio);
                return $pdf->stream('Data siswa.pdf');
            }
        }

        return view('view_profil', compact('result', 'bio', 'siswa', 'jurusan', 'id'));
    }

    public function showguru(request $request){
        $siswa = User::with([
            'siswa.jurusan'
        ])->find(auth::id());

        $jurusan = $siswa->siswa->jurusan->jurusan;

        $result = User::with('guru.jurusan')
        ->whereHas('guru.jurusan', function ($query) use ($jurusan) {
            $query->where('jurusan', $jurusan);
        })
        ->whereHas('guru', function ($query) {
            $query->where('jabatan', 'Guru BK');
        })
        ->first();

        if ($result) {
            $guru = $result->guru;

            return view('view_profil', compact('result', 'guru'));
        }

        else {
            return back();
        }

    }
    
    public function profil() {
        
        //mencari user dengan id yang sudah diambil
        $result = User::with([
            'siswa' => [
                'jurusan',
                'biodata',
                'bio_ortu',
                'bio_wali',
                'bio_lainnya',
            ], 'guru.jurusan'
        ])->find(Auth::id());

        if ($result->level == 'Siswa') {

            //mengambil data lainnya dari tabel siswa
            $siswa = $result->siswa;
            $bio = $siswa->biodata;
            $bio_lain = $siswa->bio_lainnya;
            $jurusan = $siswa->jurusan;

            // dd($siswa, $jurusan, $bio);
            
            return view('profil', compact('result', 'siswa', 'jurusan', 'bio', 'bio_lain'));
        }

        elseif ($result->level == 'Guru') {
            //mengambil data lainnya dari tabel guru
            $guru = $result->guru;
            $jurusan = $guru->jurusan;

            // dd($guru, $jurusan);
            
            return view('profil', compact('result', 'guru', 'jurusan'));
        }

        else {
            return redirect()->route('user.dashboard');
        }
        
    }

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
    
            if ($request->jurusan && $request->jabatan) {
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
            return redirect()->route('user.dashboard')->with('success', 'Data User berhasil ditambahkan');
        }

        else {
            return back()->with('alert', true);
        }
        
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
            ]);
    
            // lalu jika data yang dimasukkan tidak sesuai ketentuan, maka kode dibawah akan berjalan
            if( $validation->fails() ) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            }
            // jika data sesuai, maka kode diatas tidak akan berjalan
            
            if ($request->file()) {
                $filepath = $request->file('foto')->store('profile-images');
            }
    
            // data diurutkan dalam array
            $data = ([
                'email'    => $request->email,
                'level'    => $request->level,
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
            return redirect()->route('user.dashboard')->with('success', 'Data berhasil di edit');
    
            // dd dipakai untuk debugging data :
            // dd ($data);
        }

        else {
            $result = User::whereId($id)->first();

            $validation = validator::make($request->all(),[
                'photo' => 'image|max:5000'
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
                'photo'         => $filepath
            ]);

            if($result->nama_lengkap != $request->nama_lengkap || $result->jenis_kelamin != $request->jenis_kelamin || isset($data['photo'])) {
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
        return view('form.head');
    }

    public function formProcess(Request $request) {
        
        $validation = Validator::make($request->all(), [
            'nama_panggilan'=> 'required',
            'nama_lengkap'  => 'required',
            'jenis_k'       => 'required',
            'nis'           => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
        ]); 

        if ($validation->fails()) {
            return redirect()->back()
            ->withInput();
        }

        $filepath = $request->file('foto')->store('profile-images');

        $find = User::find(Auth::id());

        $user = ([
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_k'       => $request->jenis_k,
            'photo'         => $filepath
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
            'no_hp'             => $request->nomor,
            'asal_smp'          => $request->asal,
            'nilai_ujian_akhir' => $request->nilai,
            'alamat_sekarang'   => $request->alamat,
        ];

        Biodata_siswa::UpdateOrCreate($bio); 

        if ($request->wali && $request->wali && $request->pekerjaan_wali && $request->alamat_wali && $request->nomor_wali) {
            $bio_wali = [
                'nis'            => $request->nis,
                'nama_wali'      => $request->wali,
                'pekerjaan_wali' => $request->pekerjaan_wali,
                'alamat_wali'    => $request->alamat_wali,
                'no_telp_wali'   => $request->nomor_wali,
            ];

            Biodata_wali::UpdateOrCreate($bio_wali);
        }
        else {
            $bio_ortu = [
                'nis'                   => $request->nis,
                'nama_ayah'             => $request->nama_ayah,
                'nama_ibu'              => $request->nama_ibu,
                'pendidikan_ayah'       => $request->pendidikan_ayah,
                'pendidikan_ibu'        => $request->pendidikan_ibu,
                'pekerjaan_ayah'        => $request->pekerjaan_ayah,
                'pekerjaan_ibu'         => $request->pekerjaan_ibu,
                'penghasilan_ortu'      => $request->penghasilan,
                'penghasilan_ortu_per-' => $request->penghasilan_per,
            ];

            Biodata_Ortu_Siswa::UpdateOrCreate($bio_ortu);
        }


        $bio_lainnya = [
            'nis'                       => $request->nis,
            'tanggal_diterima'          => $request->tgl_diterima,
            'anak_ke'                   => $request->anak_ke,
            'dari_jumlah_saudara'       => $request->jumlah_saudara,
            'jumlah_orang_yg_serumah'   => $request->keluarga_serumah,
            'jumlah_tanggungan_ortu'    => $request->jumlah_tanggungan,
            'kesekolah_memakai'         => $request->kendaraan,
            'tempat_tinggal'            => $request->tempat_tinggal,
            'penerangan'                => $request->penerangan,
            'penerangan'                => $request->penerangan,
            'hp'                        => $request->hp,
            'laptop'                    => $request->laptop,
            'pjj_memakai'               => $request->pjj,
            'pelajaran_yg_tdk_disuka'   => $request->not_fav_mapel,
            'pelajaran_yg_disuka'       => $request->fav_mapel,
            'cita_cita'                 => $request->cita_cita,
            'hobby'                     => $request->hobi,
            'tmpt_curhat'               => $request->curhat,
            'penyakit_mengganggu'       => $request->penyakit,
            'bhs_sehari-hari'           => $request->bahasa,
            'suku'                      => $request->suku,
        ];

        Data_siswa_lainnya::UpdateOrCreate($bio_lainnya);

        return redirect()->route('user.dashboard');
    }
    
}
