<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata_wali extends Model
{
    use HasFactory;

    protected $table = 'tbl_biodata_wali';

    protected $fillable = [
        'nis',
        'nama_wali',
        'pekerjaan_wali',
        'alamat_wali',
        'no_telp_wali',
    ];
}
