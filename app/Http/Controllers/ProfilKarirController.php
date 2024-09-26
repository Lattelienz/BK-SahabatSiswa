<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfilKarir;

class ProfilKarirController extends Controller
{
    public function profilkarir(){
        return view('profilkarir');
    }

    public function profilkarir_store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nohp' => 'required',
            'email' => 'required|email',
            'sd' => 'required',
            'smp' => 'required',
            'smk' => 'required',
            'minat_karir' => 'required',
            'hobi' => 'required',
            'keterampilan_sudah' => 'required',
            'keterampilan_ingin' => 'required',
            'pengalaman_relawan' => 'required',
            'pengalaman_kerja' => 'required',
            'tujuan_panjang' => 'required',
            'rencana_kursus' => 'required',
            'rencana_sertifikasi' => 'required',
            'jaringan_profesional' => 'required',
            'nama_referensi' =>'required',
            'prestasi' => 'required',
            // Tambahkan validasi untuk semua field lainnya
        ]);

{
    dd($request->all()); // Menampilkan semua data yang dikirim dari form
}

        // Simpan data ke database
        // ProfilKarir::create([
        //     'siswa_id' => Auth::user()->id, // Asumsi siswa sudah login
        //     'no_hp' => $request->input('nohp'),
        //     'email' => $request->input('email'),
        //     'sd' => $request->input('sd'),
        //     'smp' => $request->input('smp'),
        //     'smk' => $request->input('smk'),
        //     'minat_karir' => $request->input('minat_karir'),
        //     'hobi' => $request->input('hobi'),
        //     'keterampilan_sudah' => $request->input('keterampilan_sudah'),
        //     'keterampilan_ingin' => $request->input('keterampilan_ingin'),
        //     'pengalaman_relawan' => $request->input('pengalaman_relawan'),
        //     'pengalaman_kerja' => $request->input('pengalaman_kerja'),
        //     'tujuan_pendek' => $request->input('tujuan_pendek'),
        //     'tujuan_panjang' => $request->input('tujuan_panjang'),
        //     'rencana_kursus' => $request->input('rencana_kursus'),
        //     'rencana_sertifikasi' => $request->input('rencana_sertifikasi'),
        //     'jaringan_profesional' => $request->input('jaringan_profesional'),
        //     'nama_referensi' => $request->input('nama_referensi'),
        //     'prestasi' => $request->input('prestasi'),
        // ]);

        // Redirect kembali ke halaman dashboard atau profil siswa
        return redirect()->route('user.dashboard')->with('success', 'Profil karir berhasil disimpan');
    }

    // public function profilkarir_show($id)
    // {
    //     // Ambil data siswa dan profil karirnya
    //     $siswa = User::find($id);
    //     $profil_karir = ProfilKarir::where('siswa_id', $id)->first();

    //     return view('profilkarir.show', compact('siswa', 'profil_karir'));
    // }
    
}
