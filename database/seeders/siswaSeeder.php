<?php

namespace Database\Seeders;

use App\Models\siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class siswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        siswa::create([
            'nis'           => '10226',
            'id_user'       => '11',
            'id_jurusan'    => '1',
            'kelas'         => 'XI A',
        ]);
    }
}
