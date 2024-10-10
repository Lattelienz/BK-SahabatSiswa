<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata_Ortu_Siswa extends Model
{
    use HasFactory;

    protected $table = 'tbl_bio_ortu';

    protected $fillable = [
        'nis',
        'nama_ayah',
        'nama_ibu',
        'pendidikan_ayah',
        'pendidikan_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'penghasilan_ortu',
        'penghasilan_ortu_per',
        'alamat_ortu',
        'no_telp'
    ];

}
