<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nama_lengkap' => 'admin1',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Admin',
                'jenis_kelamin' => 'laki-laki'
            ],
            [
                'nama_lengkap' => 'admin2',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Admin',
                'jenis_kelamin' => 'perempuan'
            ],
            [
                'nama_lengkap' => 'admin3',
                'email' => 'admin3@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Admin',
                'jenis_kelamin' => 'laki-laki'
            ],
            [
                'nama_lengkap' => 'admin4',
                'email' => 'admin4@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Admin',
                'jenis_kelamin' => 'perempuan'
            ],
            [
                'nama_lengkap' => 'admin5',
                'email' => 'admin5@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Admin',
                'jenis_kelamin' => 'laki-laki'
            ],
            [
                'nama_lengkap' => 'admin6',
                'email' => 'admin6@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Admin',
                'jenis_kelamin' => 'perempuan'
            ],
            [
                'nama_lengkap' => 'admin7',
                'email' => 'admin7@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Admin',
                'jenis_kelamin' => 'laki-laki'
            ],
            [
                'nama_lengkap' => 'admin8',
                'email' => 'admin8@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Admin',
                'jenis_kelamin' => 'perempuan'
            ],
            [
                'nama_lengkap' => 'admin9',
                'email' => 'admin9@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Admin',
                'jenis_kelamin' => 'laki-laki'
            ],
            [
                'nama_lengkap' => 'admin10',
                'email' => 'admin10@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Admin',
                'jenis_kelamin' => 'perempuan'
            ],
            [
                'nama_lengkap' => 'siswa',
                'email' => 'siswa@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Siswa',
                'jenis_kelamin' => 'laki-laki'
            ],
            [
                'nama_lengkap' => 'guru',
                'email' => 'guru@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Guru',
                'jenis_kelamin' => 'perempuan'
            ]
        ];

        foreach ($users as $data) {
            User::create($data);
        }
    }
}
