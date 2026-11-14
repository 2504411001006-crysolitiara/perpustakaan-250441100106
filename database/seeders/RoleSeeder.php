<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Membuat Permission
        $permissions = [
            'mengelola buku',
            'melihat buku',
            'mengelola peminjaman',
            'melihat peminjaman',
            'mengelola pengguna',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // Membuat Role Admin
        $admin = Role::firstOrCreate([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        // Membuat Role Petugas
        $petugas = Role::firstOrCreate([
            'name' => 'Petugas',
            'guard_name' => 'web',
        ]);

        // Membuat Role Siswa
        $siswa = Role::firstOrCreate([
            'name' => 'Siswa',
            'guard_name' => 'web',
        ]);

        // Memberikan Permission kepada setiap Role
        $admin->givePermissionTo(Permission::all());

        $petugas->givePermissionTo([
            'mengelola buku',
            'melihat buku',
            'mengelola peminjaman',
            'melihat peminjaman',
        ]);

        $siswa->givePermissionTo([
            'melihat buku',
            'melihat peminjaman',
        ]);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}