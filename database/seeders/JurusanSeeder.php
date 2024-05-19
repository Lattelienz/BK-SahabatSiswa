<?php

namespace Database\Seeders;

use App\Models\jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusan = [
            ['jurusan' => 'Pengembangan Perangkat Lunak dan Gim'],
            ['jurusan' => 'Pekerjaan Sosial'],
            ['jurusan' => 'Teknik Jaringan, Komputer dan Telekomunikasi'],
            ['jurusan' => 'Teknik Furnitur'],
            ['jurusan' => 'Broadcasting dan Film'],
            ['jurusan' => 'Desain Komunikasi Visual'],
            ['jurusan' => 'Teknik Kimia Industri']
        ];

        foreach ($jurusan as $data) {
            jurusan::create($data);
        }
    }
}
