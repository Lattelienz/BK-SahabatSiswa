<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_siswa_lainnya extends Model
{
    use HasFactory;

    protected $table = 'tbl_data_siswa_lainnya';

    protected $fillable = [
        'nis',
        'tanggal_diterima',
        'anak_ke',
        'dari_jumlah_saudara',
        'jumlah_orang_yg_serumah',
        'jumlah_tanggungan_ortu',
        'kesekolah_memakai',
        'tempat_tinggal',
        'penerangan',
        'hp',
        'laptop',
        'pjj_memakai',
        'pelajaran_yg_tdk_disuka',
        'pelajaran_yg_disuka',
        'cita_cita',
        'hobby',
        'tmpt_curhat',
        'penyakit_mengganggu',
        'bhs_sehari_hari',
        'suku',
    ];
}
