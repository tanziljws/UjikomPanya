<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user (update if exists)
        Admin::updateOrCreate(
            ['username' => 'admin'],
            [
                'username' => 'admin',
                'password' => Hash::make('123'),
            ]
        );

        // Create sample user (update if exists)
        User::updateOrCreate(
            ['email' => 'john@example.com'],
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'status' => 'active',
            ]
        );

        // Call other seeders
        $this->call([
            GaleriSeeder::class,
            AgendaSeeder::class,
            InformasiSeeder::class,
        ]);
    }
}
