<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if ($siswa->gaya_belajar) {
            $belajar = $siswa->gaya_belajar;

            if($belajar === 'visual') {
                $deskripsiGayaBelajar = 'Gaya Belajar Visual adalah proses pembelajaran yang mengandalkan pengelihatan sebagai penerima informasi dan pengetahuan. Seseorang yang memiliki gaya belajar visual akan mudah menerima gagasan, konsep, data dan informasi yang dikemas dalam bentuk gambar.';
            } else if($belajar === 'auditori') {
                $deskripsiGayaBelajar = 'Gaya Belajar Auditori adalah proses pembelajaran yang mengandalkan pendengaran sebagai penerima informasi dan pengetahuan. Seseorang dengan tipe belajar seperti ini lebih memfokuskan mendengar pembicaraan guru atau dosen dengan baik dan jelas tanpa perlu tampilan visual saat belajar.';
            } else {
                $deskripsiGayaBelajar = 'Gaya Belajar Kinestetik adalah proses pembelajaran yang mengandalkan sentuhan atau rasa untuk menerima informasi dan pengetahuan. Seseorang yang memiliki gaya belajar kinestetik cenderung suka melakukan, menyentuh, merasa, bergerak dan mengalami secara langsung.';
            }
        }

        if ($bio) {
            $bio_lain = $siswa->bio_lainnya;
            $bio_ortu = $siswa->bio_ortu;
            $bio_wali = $siswa->bio_wali;

            if ($request->get('export') == 'pdf'){
                $pdf = Pdf::loadView('pdf_view', [
                    'result' => $result,
                    'siswa' => $siswa,
                    'bio' => $bio,
                    'jurusan' => $jurusan,
                    'bio_lain' => $bio_lain,
                    'bio_ortu' => $bio_ortu,
                    'bio_wali' => $bio_wali,
                    'GayaBelajar' => $belajar,
                    'deskripsiGayaBelajar' => $deskripsiGayaBelajar,
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
}