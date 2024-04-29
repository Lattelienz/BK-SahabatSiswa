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
            [
                'name' => 'siswa',
            ],
            ['name' => 'siswa']  
        );
        $role_gurubk = Role::updateOrCreate(
            [
                'name' => 'guru_bk',
            ],
            ['name' => 'guru_bk']  
        );
        $role_guru = Role::updateOrCreate(
            [
                'name' => 'guru',
            ],
            ['name' => 'guru']  
        );
        $role_admin = Role::updateOrCreate(
            [
                'name' => 'admin',
            ],
            ['name' => 'admin']  
        );
        $permission = Permission::updateOrCreate(
            [
                'name' => 'view_dashboard'
            ],
            ['name' => 'view_dashboard']
        );
        $permission2 = Permission::updateOrCreate(
            [
                'name' => 'view_table_data_siswa'
            ],
            ['name' => 'view_table_data_siswa']
        );

        $role_admin->givePermissionTo($permission);
        $role_gurubk->givePermissionTo($permission2);
        $role_admin->givePermissionTo($permission2);

        $user = User::find(2);
        $user2 = User::find(3);

        $user->assignRole('admin');
        $user2->assignRole('guru_bk');
    }
}
