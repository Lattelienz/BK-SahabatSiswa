<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_siswa = Role::updateOrCreate(
            ['name' => 'Siswa']  
        );

        $role_guru = Role::updateOrCreate(
            ['name' => 'guru']  
        );

        $role_admin = Role::updateOrCreate(
            ['name' => 'Admin']  
        );

        $permission = Permission::updateOrCreate(
            ['name' => 'view_dashboard']
        );

        $permission2 = Permission::updateOrCreate(
            ['name' => 'view_card']
        );

        $permission3 = Permission::updateOrCreate(
            ['name' => 'view_table_data_siswa']
        );

        $role_admin->givePermissionTo($permission);
        $role_siswa->givePermissionTo($permission2);
        $role_guru->givePermissionTo($permission3);

        user::where('level', 'Admin')->first()->assignRole('Admin');
        user::where('level', 'Guru')->first()->assignRole('Guru');
        user::where('level', 'Siswa')->first()->assignRole('Siswa');

    }
}
