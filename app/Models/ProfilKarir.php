<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilKarir extends Model
{
    use HasFactory;

    protected $table = 'profil_karir';
    
    protected $fillable = [
        'siswa_id',
        'no_hp',
        'email',
        'sd',
        'smp',
        'smk',
        'minat_karir',
        'hobi',
        'keterampilan_sudah',
        'keterampilan_ingin',
        'pengalaman_relawan',
        'pengalaman_kerja',
        'tujuan_pendek',
        'tujuan_panjang',
        'rencana_kursus',
        'rencana_sertifikasi',
        'jaringan_profesional',
        'nama_referensi',
        'prestasi',
    ];
}
