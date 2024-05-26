<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata_siswa extends Model
{
    use HasFactory;

    protected $table = 'tbl_bio_siswa';

    protected $fillable = [
        'nis',
        'nama_panggilan',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'asal_smp',
        'nilai_ujian_akhir',
        'alamat_sekarang'
    ];

}
