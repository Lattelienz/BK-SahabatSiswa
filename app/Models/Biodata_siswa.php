<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata_siswa extends Model
{
    use HasFactory;

    protected $table = 'tbl_bio_siswa';

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis');
    }
}
