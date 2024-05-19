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
        'nama_lengkap',
        'id_jurusan',
        'kelas',
        'tempat_lahir',
        'tanggal_lahir'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function biodata() {
        return $this->hasOne(Biodata_siswa::class, 'nis');
    }
}
