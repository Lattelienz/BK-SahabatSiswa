<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata_siswa_lainnya extends Model
{
    use HasFactory;

    protected $table = 'tbl_data_siswa_lainnya';

    protected $fillable = [
        'tanggal_diterima',
        'anak_ke',
        'dari_jumlah_saudara',
        'jumlah_orang_yg_serumah',
        'jumlah_tanggungan_ortu',
        'kesekolah_memakai',
        'tempat_tinggal',
        'tanggal_diterima',
        'penerangan',
        'hp',
        'laptop',
        'pjj_memakai',
        'pelajaran_yg_tdk_disuka',
        'pelajaran_yg_disuka',
        'cita-cita_stlh_tamat',
        'hobby',
        'penyakit_yg_menggangu_belajar',
        'bhs_sehari_hari',
        'suku'
    ];

    public function siswa() {
        return $this->belongsTo(siswa::class, 'nis');
    }

}
