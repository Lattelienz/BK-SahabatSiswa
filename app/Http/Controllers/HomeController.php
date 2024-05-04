<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        // return abort(403);

        Auth::logout();
          return redirect()->route('login')->with('success', 'Anda telah logout');
    }

    public function index(Request $request){
        $data = User::query(); // Menggunakan query builder untuk inisialisasi query
        
        $data = $data->get();
        
        return view('general', compact('data', 'request'), [
            'active' => 'guru'
        ]);
    }    

    public function admin(Request $request){
        
        $data = User::get();
        
        return view('index', compact('data', 'request'), [
            'active' => 'admin'
        ]);
    }    
    
    // function to create an user
    public function create(){
        return view('create', [
            'active' => 'bk'
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'name' => 'required',
            'class' => 'required',
            'password' => 'required'
        ]);

        $data['password'] = Hash::make($request->password);
        
        User::create($data);

        return redirect()->back()->with('success', 'Data User berhasil ditambahkan');
    }
    // end

    // function to edit users
    public function edit(Request $request, $id){
        $data = User::find ($id);

        return view('edit', compact('data'), [
            'active' => null
        ]);
    }

    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'email'     => 'required|email',
            'name'      => 'required',
            'password'  => 'required',
        ]);

        if($request->input('newPassword')) {
            $data['password'] = Hash::make($request->input('newPassword'));
        }
    
        // Memperbarui data user
        User::whereId($id)->update($data);
    
        // Mengarahkan pengguna ke halaman indeks
        return redirect()->back()->with('success', 'Data berhasil di edit');
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

        $data = User::where('username', 'like', '%' . $query . '%')->get();

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
