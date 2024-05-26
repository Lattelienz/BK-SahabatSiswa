<?php

namespace Database\Seeders;

use App\Models\Biodata_siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BioSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Biodata_siswa::create([
            'nis'              =>  '10226',
            'nama_panggilan'   =>  'Pahlevi',
            'agama'            =>  'Islam',
            'tempat_lahir'     =>  'Banjarmasin',
            'tanggal_lahir'    =>  '2007-03-28',
            'no_hp'            =>  '083159028735',
            'asal_smp'         =>  'SMP Negeri 19',
            'nilai_ujian_akhir'=>  '82',
            'alamat_sekarang'  =>  'Jl. Garuda No.13',
        ]);
    }
}
