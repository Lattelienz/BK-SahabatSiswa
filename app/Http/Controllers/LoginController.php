<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function login_proses(Request $request) { //function utk post data, trus di validasi
       $request->validate([
            'email'     => 'required',
            'password'  => 'required',
       ]);

       $data = [                                  //simpan datanya
            'email'     => $request->email,
            'password'  => $request->password
       ];


       if (Auth::attempt($data)) //pengecekan data, trus diarahkan ke next page 
       {                    
          if (Auth::user()->level != 'Admin') { //jika berhasil dan bukan admin
               return redirect()->route('user.dashboard')->with('success', 'Alhamdulillah berhasil login');                
          }

          //jika berhasil dan admin
          return redirect()->route('user.dataGuru')->with('success', 'Alhamdulillah berhasil login');
       }
       else {
          return redirect()->route('login')->with('failed','coba lagi');      //jika gagal false
       }
    }

    public function logout() {
          Auth::logout();
          return redirect()->route('login')->with('success', 'Anda telah logout');
    }

}
