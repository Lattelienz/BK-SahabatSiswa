<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfilKarir;
use App\Models\siswa;
use App\Models\User;

class ProfilKarirController extends Controller
{
    public function profilkarir(){
        return view('profilkarir');
    }

    public function profilkarir_store(Request $request)
    {
        // Validasi data
        $request->validate([
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

        $profilKarir = [
            'nis'                       => Siswa::where('id_user', Auth::id()),
            'sd'                        => $request->sd,
            'smp'                       => $request->smp,
            'smk'                       => $request->smk,
            'minat_karir'               => $request->minat_karir,
            'hobi'                      => $request->hobi,
            'keterampilan_sudah'        => $request->keterampilan,
            'keterampilan_kembangan'    => $request->keterampilan_kembangan,
            'pengalaman_relawan'        => $request->pengalaman,
            'pengalaman_kerja'          => $request->pengalaman_kerja,
            'tujuan_pendek'             => $request->tujuan_pendek,
            'tujuan_panjang'            => $request->tujuan_panjang,
            'rencana_kursus'            => $request->pelatihan,
            'rencana_sertifikasi'       => $request->sertifikasi,
            'networking'                => $request->networking,
            'nama_referensi'            => $request->referensi_orang,
            'prestasi'                  => $request->prestasi,
        ];

        dd($request->all()); // Menampilkan semua data yang dikirim dari form

        // Simpan data ke database
        ProfilKarir::create($profilKarir);

        // Redirect kembali ke halaman dashboard atau profil siswa
        return redirect()->route('user.dashboard')->with('success', 'Profil karir berhasil disimpan');
    }

    public function profilkarir_show($id)
    {
        // Ambil data siswa dan profil karirnya
        $siswa = User::find($id);
        $profil_karir = ProfilKarir::where('siswa_id', $id)->first();

        return view('profilkarir.show', compact('siswa', 'profil_karir'));
    }
    
}
