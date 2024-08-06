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
            ['name' => 'Siswaa'],
            ['name' => 'Siswaa']  
        );

        $role_gurubk = Role::updateOrCreate(
            ['name' => 'guru_bk'],
            ['name' => 'guru_bk']  
        );

        $role_guru = Role::updateOrCreate(
            ['name' => 'guru'],
            ['name' => 'guru']  
        );

        $role_admin = Role::updateOrCreate(
            ['name' => 'Admin'],
            ['name' => 'Admin']  
        );

        $permission = Permission::updateOrCreate(
            ['name' => 'view_dashboard'],
            ['name' => 'view_dashboard']
        );

        $permission2 = Permission::updateOrCreate(
            ['name' => 'view_card'],
            ['name' => 'view_card']
        );

        $permission3 = Permission::updateOrCreate(
            ['name' => 'view_table_data_siswa'],
            ['name' => 'view_table_data_siswa']
        );

        $role_admin->givePermissionTo($permission);
        $role_siswa->givePermissionTo($permission2);
        $role_gurubk->givePermissionTo($permission3);

        $user = User::find(1);
        $user2 = User::find(11);
        $user3 = User::find(12);

        $user->assignRole('Admin');
        $user2->assignRole('Siswaa');
        $user3->assignRole('guru_bk');

        $user->can('view_dashboard');
        $user2->can('view_card');
        $user3->can('view_table_data_siswa');
    }
}
