<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(KategoriAsetSeeder::class);
        $this->call(LokasiSeeder::class);
        $this->call(AsetSeeder::class);

        // Create default admin user (before MutasiAsetSeeder)
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@sistemaset.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        // Create sample operator user
        $operator = User::create([
            'name' => 'Operator',
            'email' => 'operator@sistemaset.com',
            'password' => bcrypt('password'),
        ]);
        $operator->assignRole('operator');

        // Create sample viewer user
        $viewer = User::create([
            'name' => 'Viewer',
            'email' => 'viewer@sistemaset.com',
            'password' => bcrypt('password'),
        ]);
        $viewer->assignRole('viewer');

        $this->call(MutasiAsetSeeder::class);
    }
}
