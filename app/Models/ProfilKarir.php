<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilKarir extends Model
{
    use HasFactory;

    protected $table = 'profil_karir';
    
    protected $fillable = [
        'nis',
        'sd',
        'smp',
        'smk',
        'minat_karir',
        'hobi',
        'keterampilan_sudah',
        'keterampilan_kembangan',
        'pengalaman_relawan',
        'pengalaman_kerja',
        'tujuan_pendek',
        'tujuan_panjang',
        'rencana_kursus',
        'rencana_sertifikasi',
        'networking',
        'nama_referensi',
        'prestasi',
    ];
}
