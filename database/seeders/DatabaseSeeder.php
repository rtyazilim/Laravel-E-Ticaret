<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
        ]);

        $admin = User::firstOrCreate(
            ['email' => 'admin@rtyazilim.com'],
            [
                'name'     => 'Admin',
                'password' => bcrypt('Admin@2026!'),
            ]
        );
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->assignRole($adminRole);

        $user = User::firstOrCreate(
            ['email' => 'user@rtyazilim.com'],
            [
                'name'     => 'Demo Kullanıcı',
                'password' => bcrypt('User@2026!'),
            ]
        );
        $customerRole = Role::firstOrCreate(['name' => 'customer', 'guard_name' => 'web']);
        $user->assignRole($customerRole);
    }
}
