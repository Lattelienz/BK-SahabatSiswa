<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;

    protected $table = 'tbl_guru';

    protected $fillable = [
        'id_user',
        'id_jurusan',
        'nama_lengkap',
        'jabatan',
    ];

    public function jurusan() {
        return $this->belongsTo(jurusan::class, 'id_jurusan');
    }
}
