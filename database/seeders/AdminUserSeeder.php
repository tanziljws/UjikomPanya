<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        User::truncate();
        Admin::truncate();

        // Create regular user
        User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@sekolah.com',
            'password' => Hash::make('admin123'),
        ]);

        // Create admin user
        Admin::create([
            'username' => 'superadmin',
            'password' => Hash::make('superadmin123'),
        ]);

        $this->command->info('Admin dan User berhasil dibuat!');
        $this->command->info('Admin: username = superadmin, password = superadmin123');
        $this->command->info('User: email = admin@sekolah.com, password = admin123');
    }
}
