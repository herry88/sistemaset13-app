<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view-dashboard',
            'manage-kategori-aset',
            'manage-lokasi',
            'manage-aset',
            'manage-mutasi-aset',
            'view-laporan',
            'manage-users',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $operator = Role::create(['name' => 'operator']);
        $operator->givePermissionTo([
            'view-dashboard',
            'manage-kategori-aset',
            'manage-lokasi',
            'manage-aset',
            'manage-mutasi-aset',
            'view-laporan',
        ]);

        $viewer = Role::create(['name' => 'viewer']);
        $viewer->givePermissionTo([
            'view-dashboard',
            'view-laporan',
        ]);
    }
}
