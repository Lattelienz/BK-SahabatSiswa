<?php

namespace Database\Seeders;

use App\Models\guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        guru::create ([
            'id_user'        =>  '3',
            'id_jurusan'     =>  '1',
            'nama_lengkap'   =>  'Guru',
            'jabatan'        =>  'Guru umum',
        ]);
    }
}
