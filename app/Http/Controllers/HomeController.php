<?php

namespace App\Http\Controllers;

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
            // dd session('result');
            return view('dashboard', ['result' => session('result')]);
        }
        
        elseif (session('result') == null) {
            $data = User::get();
            return view('dashboard', compact('data'));
        }

    }
    
    public function profil() {

        // mengambil id user yang login ke laravel
        $id = Auth::id();
        
        //mencari user dengan id yang sudah diambil
        $result = User::find($id);
        
        if ($result->level == 'Siswa') {
            //mengambil data lainnya dari tabel siswa
            $tbl_siswa = $result->siswa;
            
            return view('profil', compact('result', 'tbl_siswa'));
        }

        elseif ($result->level == 'Guru') {
            //mengambil data lainnya dari tabel guru
            $tbl_guru = $result->guru;
            
            return view('profil', compact('result', 'tbl_guru'));
        }

        return redirect()->route('user.dashboard');
        
    }

    // function to create an user
    public function create(){
        return view('create', [
            'active' => 'bk'
        ]);
    }

    public function store(Request $request){

        // pertama, data yang masuk diperiksa terlebih dahulu melalui validator
        $validation = Validator::make($request->all(),[
            'email'      => 'required|email',
            'password'   => 'required',
            'level'      => 'required',
        ]);

        // lalu jika data yang dimasukkan tidak sesuai ketentuan, maka kode dibawah akan berjalan
        if( $validation->fails() ) return redirect()->back()->withInput()->withErrors($validation);
        // jika data sesuai, maka kode diatas tidak akan berjalan

        // data diurutkan dalam array
        $data = ([
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'level'      => $request->level
        ]);
        
        if ($request->jurusan and $request->kelas) {
            $siswa['id_jurusan'] = $request->jurusan;
            $siswa['kelas']      = $request->kelas;
            siswa::create($siswa);
        }
        
        // data yang diinput kemudian diolah menjadi sebuah data baru
        User::create($data);
        
        // mengembalikan pengguna ke halaman dashboard
        return redirect()->route('user.dashboard')->with('success', 'Data User berhasil ditambahkan');
        
        // dd ($data);
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

    // public function classFilter(Request $request)
    // {
    //     $query = $request->classFilter;

    //     $data = User::where('class', 'like', '%' . $query . '%')->get();

    //     return back()->with([
    //         'active' => 'bk',
    //         'result' => $data
    //     ]);
    // }
    
    public function form() {
        return view('form.head');
    }

    public function formProcess(Request $request) {
        
        $user = User::find(Auth::id());
        
        $tbl_siswa = new siswa ([
            'nis'           => $request->nis,
            'nama_lengkap'  => $request->nama_lengkap,
        ]);
        
        dd($tbl_siswa);
        
        $user->siswa()->save($tbl_siswa);
        
        // $siswa = $user->siswa;
        // $nis = $siswa->nis;
        // $biosiswa = $user->biodata_siswa->firstWhere('nis', $nis); 

        // $bio = [
        //     'contoh1' => $request->no_telp
        // ];

        // dd($user, $siswa, $biosiswa);

        return redirect();
    }

}
