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
        {
            $data = User::get();

            return view('dashboard', compact('data'));
        }
        return abort(403);

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
    
    public function  edit(Request $request,$id){
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

    public function delete(Request $request, $id) {
        $data = User::find($id);
    
        if ($data) {
            $data->delete();
        }
    
        return redirect()->route('index');
    }

    public function halaman(Request $request)
    {
        $query = $request->input('nameSearch');
        $data = User::query();

        if($query) {
            $data->where('name', 'like', '%' . $query . '%');
        }
    
        $data = User::get();   
        return view('halaman', [
            'active' => 'bk',
            'data'=>$data
        ]);
    }

    public function nameSearch(Request $request)
    {
        $query = $request->nameSearch;

        $data = User::where('name', 'like', '%' . $query . '%')->get();

        return view('halaman', [
            'active' => 'bk',
            'data'=>$data
        ]);
    }

    public function nameSearchUser(Request $request)
    {
        $query = $request->nameSearch;

        $data = User::where('name', 'like', '%' . $query . '%')->get();

        return view('index', [
            'active' => 'admin',
            'data'=>$data
        ]);
    }

    public function nameSearchGeneral(Request $request)
    {
        $query = $request->nameSearch;

        $data = User::where('name', 'like', '%' . $query . '%')->get();

        return view('general', [
            'active' => 'guru',
            'data'=> $data
        ]);
    }

    public function classFilter(Request $request)
    {
        $query = $request->classFilter;

        $data = User::where('class', 'like', '%' . $query . '%')->get();

        return view('halaman', [
            'active' => 'bk',
            'data'=>$data
        ]);
    }

    public function classFilterUser(Request $request)
    {
        $query = $request->classFilter;

        $data = User::where('class', 'like', '%' . $query . '%')->get();

        return view('index', [
            'active' => 'admin',
            'data'=>$data
        ]);
    }

    public function classFilterGeneral(Request $request)
    {
        $query = $request->classFilter;

        $data = User::where('class', 'like', '%' . $query . '%')->get();

        return view('general', [
            'active' => 'admin',
            'data'=>$data
        ]);
    }

    public function general()
    {
        $data = User::all();   
        return view('general', ['data'=>$data]);

    }
    
    public function form(){
        return view('form');
}
    public function profil(){
        return view('profil');
}
}
