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
            $data = User::with('siswa.jurusan', 'guru.jurusan')->paginate(10);
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
                        ->paginate(10)
                        ->withQueryString();

            return back()->with('data', $data);
        }
        
        else {

            $query = $request->filter;

            $data = User::where('level', 'like', '%' . $query . '%')
                        ->paginate(10)
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
            $bio = $siswa->biodata->first();
        }

        if ($request->get('export') == 'pdf'){
            $pdf = Pdf::loadView('showsiswa', [
                'siswa' => $siswa,
                'bio' => $bio,
                'jurusan' => $jurusan
            ]);
            return $pdf->download('Data siswa.pdf');
        }

        return view('view_profil', compact('result','siswa', 'bio', 'jurusan', 'id'));

    }

    public function showguru(request $request){
        $result = User::with([
            'siswa.jurusan'
        ])->find(auth::id());

        $jurusan = $result->siswa->jurusan->jurusan;

        $result2 = User::with('guru.jurusan')
        ->whereHas('guru.jurusan', function ($query) use ($jurusan) {
            $query->where('jurusan', $jurusan);
        })
        ->whereHas('guru', function ($query) {
            $query->where('jabatan', 'Guru BK');
        })
        ->first();

        $guru = $result2->guru;
        // dd($result2, $guru);
        return view('view_profil', compact('result2', 'guru'));

    }
    
    public function profil() {
        
        //mencari user dengan id yang sudah diambil
        $result = User::with([
            'siswa' => [
                'jurusan',
                'biodata',
            ], 'guru.jurusan'
        ])->find(Auth::id());

        if ($result->level == 'Siswa') {

            //mengambil data lainnya dari tabel siswa
            $siswa = $result->siswa;
            $bio = $siswa->biodata;
            if ($bio) {
                $bio = $siswa->biodata->first();
            }
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

    public function store(Request $request){

        // pertama, data yang masuk diperiksa terlebih dahulu melalui validator
        $validation = Validator::make($request->all(),[
            'nama_lengkap'  => 'required',
            'email'         => 'required|email',
            'password'      => 'required',
        ]);

        // lalu jika data yang dimasukkan tidak sesuai ketentuan, maka kode dibawah akan berjalan
        if( $validation->fails() ) return redirect()->back()->withInput()->withErrors($validation)->with('openModal', true);
        // jika data sesuai, maka kode diatas tidak akan berjalan

        // data diurutkan dalam array
        $data = ([
            'nama_lengkap'  => $request->nama_lengkap,
            'email'         => $request->email,
            'password'      => $request->password,
            'jenis_kelamin' => $request->jenis_kelamin,
            'level'         => $request->level
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
            }
    
            if ($request->jurusan && $request->jabatan) {
                $guru = ([
                    'id_user'       => User::where('email', $request->email)->first()->id,
                    'id_jurusan'    => $request->jurusan,
                    'jabatan'       => $request->jabatan,
                ]);
    
                guru::create($guru);            
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
    public function edit($id){
        $data = User::find($id);

        return response()->json(['user' => $data]);
    }

    public function update(Request $request, $id)
    {
        // dd($id);

        // pertama, data yang masuk diperiksa terlebih dahulu melalui validator
        $validation = Validator::make($request->all(),[
            'email'         => 'required|email',
        ]);

        // lalu jika data yang dimasukkan tidak sesuai ketentuan, maka kode dibawah akan berjalan
        if( $validation->fails() ) {
            return redirect()->back()->withInput()->withErrors($validation);
        }
        // jika data sesuai, maka kode diatas tidak akan berjalan
        
        // data diurutkan dalam array
        $data = ([
            'email'    => $request->email,
            'level'    => $request->level
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
                'nama_lengkap'  => $request->nama_lengkap,
                'id_jurusan'    => $request->jurusan,
                'kelas'         => $request->kelas
            ]);

            siswa::where('id_user', $id)->update($siswa);
        }

        if ($request->jurusan && $request->jabatan) {
            $guru = ([
                'nama_lengkap'  => $request->nama_lengkap,
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
        
        $find = User::find(Auth::id());

        $user = ([
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_k'       => $request->jenis_k
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
