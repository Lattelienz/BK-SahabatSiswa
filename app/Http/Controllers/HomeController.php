<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
    
    public function profile() {
        return view('profil');
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
            'username'   => 'required',
            'password'   => 'required'
        ]);

        // lalu jika data yang dimasukkan tidak sesuai ketentuan, maka kode dibawah akan berjalan
        if( $validation->fails() ) return redirect()->back()->withInput()->withErrors($validation);
        // jika data sesuai, maka kode diatas tidak akan berjalan

        // data diurutkan dalam array
        $data['email']      = $request->email;
        $data['username']   = $request->username;
        $data['password']   = Hash::make($request->password);
        
        
        // data yang diinput kemudian diolah menjadi sebuah data baru
        User::create($data);
        
        // mengembalikan pengguna ke halaman dashboard
        return redirect('dashboard')->with('success', 'Data User berhasil ditambahkan');
        
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
        $data['username']   = $request->username;
        $data['email']      = $request->email;
        
        // kode dibawah berjalan jika data yang masuk memiliki password
        if($request->newPassword) {
            $data['password'] = Hash::make($request->newPassword);
        }

        // Memperbarui data user
        User::whereId($id)->update($data);
    
        // Mengarahkan pengguna ke halaman dashboard
        return redirect()->route('dashboard')->with('success', 'Data berhasil di edit');

        // dd dipakai untuk debugging data :
        // dd ($data);
    }
    // end

    // function to delete users
    public function delete(Request $request, $id) {
        $data = User::find($id);
    
        if ($data) {
            $data->delete();
        }
    
        return redirect()->route('dashboard');
    }
    // end
    
    public function nameSearch(Request $request)
    {
        $query = $request->nameSearch;

        $data = User::where('username', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->get();

        return back()->with([
            'active' => 'bk',
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
    
}
