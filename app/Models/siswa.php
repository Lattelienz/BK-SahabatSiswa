<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nis';

    protected $table = 'tbl_siswa';

    protected $fillable = [
        'nis',
        'id_user',
        'nama_lengkap',
        'id_jurusan',
        'kelas',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_k'

    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function jurusan() {
        return $this->belongsTo(jurusan::class, 'id_jurusan');
    }    

    public function biodata() {
        return $this->hasOne(Biodata_siswa::class, 'nis');
    }

    public function bio_ortu() {
        return $this->hasOne(Biodata_Ortu_Siswa::class, 'nis');
    }

    public function bio_wali() {
        return $this->hasOne(Biodata_wali::class, 'nis');
    }

    public function bio_lainnya() {
        return $this->hasOne(Data_siswa_lainnya::class, 'nis');
    }
}
