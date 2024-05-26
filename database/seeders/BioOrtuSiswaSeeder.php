<?php

namespace Database\Seeders;

use App\Models\Biodata_Ortu_Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BioOrtuSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Biodata_Ortu_Siswa::create([
            'nis'              =>  '10226',
            'nama_ayah'        =>  'Ayah',
            'nama_ibu'         =>  'Bunda',
            'pendidikan_ayah'  =>  'S1',
            'pendidikan_ibu'   =>  'S1',
            'pekerjaan_ayah'   =>  'Coder',
            'pekerjaan_ibu'    =>  'IRT',
            'penghasilan_ortu' =>  '1000000',
            'penghasilan_ortu_per-' => 'bulan'
        ]);
    }
}
