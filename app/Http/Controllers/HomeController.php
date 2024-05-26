<?php

namespace App\Http\Controllers;

use App\Models\Biodata_Ortu_Siswa;
use App\Models\Biodata_siswa;
use App\Models\Data_siswa_lainnya;
use App\Models\siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }
    
    public function dashboard(){
        
        if (session('result') !== null) {
            return view('dashboard', ['result' => session('result')]);
        }
        
        else {
            $data = User::with('siswa.jurusan', 'guru.jurusan')->get();
            return view('dashboard', compact('data'));
        }

    }

    public function showsiswa($id){
        $result = User::with([
            'siswa' => [
                'jurusan',
                'biodata',
            ]
        ])->find($id);

        $siswa = $result->siswa;
        $bio = $siswa->biodata->first();
        $jurusan = $siswa->jurusan;

        return view('view_profil', compact('siswa', 'bio', 'jurusan'));
    }
    
    public function profil() {
        
        //mencari user dengan id yang sudah diambil
        $result = User::with([
            'siswa' => [
                'jurusan',
                'biodata',
            ],
            'guru.jurusan'
        ])->find(Auth::id());

        if ($result->level == 'Siswa') {

            //mengambil data lainnya dari tabel siswa
            $siswa = $result->siswa;
            $bio = $siswa->biodata->first();
            $jurusan = $siswa->jurusan;

            // dd($siswa, $jurusan, $bio);
            
            return view('profil', compact('result', 'siswa', 'jurusan', 'bio'));
        }

        elseif ($result->level == 'Guru') {
            //mengambil data lainnya dari tabel guru
            $guru = $result->guru;
            $jurusan = $guru->jurusan;

            // dd($guru, $jurusan);
            
            return view('profil', compact('result', 'guru', 'jurusan'));
        }

        return redirect()->route('user.dashboard');
        
    }

    // function to create an user
    public function create(){
        return view('create');
    }

    public function store(Request $request){

        // pertama, data yang masuk diperiksa terlebih dahulu melalui validator
        $validation = Validator::make($request->all(),[
            'nama_lengkap'  => 'required',
            'email'         => 'required|email',
            'password'      => 'required',
        ]);

        // lalu jika data yang dimasukkan tidak sesuai ketentuan, maka kode dibawah akan berjalan
        if( $validation->fails() ) return redirect()->back()->withInput()->withErrors($validation);
        // jika data sesuai, maka kode diatas tidak akan berjalan

        $email = $request->email;

        // data diurutkan dalam array
        $data = ([
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'level'      => $request->level,
        ]);

        dd($request);

        User::create($data);
        
        if ($request->nis || $request->jurusan && $request->kelas) {
            $siswa = ([
                'nis'           => $request->NIS,
                'id_user'       => User::where('email', $request->email)->first()->id,
                'nama_lengkap'  => $request->nama_lengkap,
                'id_jurusan'    => $request->jurusan,
                'kelas'         => $request->kelas
            ]);

            siswa::create($siswa);
        }

        // data yang diinput kemudian diolah menjadi sebuah data baru
        
        // mengembalikan pengguna ke halaman dashboard
        return redirect()->route('user.dashboard')->with('success', 'Data User berhasil ditambahkan');
        
    }
    // end

    // function to edit users
    public function edit(Request $request, $id){
        $data = User::find ($id);

        return view('edit', compact('data'), [
            'active' => null
        ]);
    }

    public function update(Request $request, $id)
    {
        // pertama, data yang masuk diperiksa terlebih dahulu melalui validator
        $validation = Validator::make($request->all(),[
            'email'         => 'required|email',
            'username'      => 'required'
        ]);

        // lalu jika data yang dimasukkan tidak sesuai ketentuan, maka kode dibawah akan berjalan
        if( $validation->fails() ) return redirect()->back()->withInput()->withErrors($validation);
        // jika data sesuai, maka kode diatas tidak akan berjalan
        
        // data diurutkan dalam array
        $data = ([
            'username' => $request->username,
            'email'    => $request->email,
        ]);
        
        // kode dibawah berjalan jika data yang masuk memiliki password
        if($request->newPassword) {
            $data['password'] = Hash::make($request->newPassword);
        }

        // Memperbarui data user
        User::whereId($id)->update($data);
    
        // Mengarahkan pengguna ke halaman dashboard
        return redirect()->route('user.dashboard')->with('success', 'Data berhasil di edit');

        // dd dipakai untuk debugging data :
        // dd ($data);
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
    
    public function search(Request $request)
    {
        $query = $request->nameSearch;

        $data = User::Where('email', 'like', '%' . $query . '%')
                    ->get();

        return back()->with([
            'result'=> $data
        ]);
    }

    public function classFilter(Request $request)
    {
        $query = $request->classFilter;

        $data = User::where('class', 'like', '%' . $query . '%')->get();

        return back()->with([
            'active' => 'bk',
            'result' => $data
        ]);
    }
    
    public function form() {
        return view('form.head');
    }

    public function formProcess(Request $request) {
        
        $user = User::find(Auth::id());

        $tbl_siswa = ([
            'id_user'       => $user->id,
            'nis'           => $request->nis,
            'nama_lengkap'  => $request->nama_lengkap,
            'id_jurusan'    => $user->siswa->id_jurusan
        ]);
        
        siswa::where('id_user', $user->id)->update($tbl_siswa);
        
        $bio = [
            'nis'               => $request->nis,
            'nama_panggilan'    => $request->nama_panggilan,
            'agama'             => $request->agama,
            'jenis_k'           => $request->jenis_k,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'no_hp'             => $request->nomor,
            'asal_smp'          => $request->asal,
            'nilai_ujian_akhir' => $request->nilai,
            'alamat_sekarang'   => $request->alamat,
        ];

        Biodata_siswa::create($bio); 

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

        Biodata_Ortu_Siswa::create($bio_ortu);

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

        Data_siswa_lainnya::create($bio_lainnya);

        return redirect()->route('user.dashboard');
    }

}
