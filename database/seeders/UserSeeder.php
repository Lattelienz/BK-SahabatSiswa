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
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Admin'
            ],
            [
                'email' => 'siswa@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Siswa'
            ],
            [
                'email' => 'guru@gmail.com',
                'password' => Hash::make('123'),
                'level' => 'Guru'
            ]
        ];

        foreach ($users as $data) {
            User::create($data);
        }
    }
}
