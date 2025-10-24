<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default user for testing
        User::create([
            'name' => 'User',
            'email' => 'user@smkn4bogor.sch.id',
            'password' => Hash::make('123'),
            'role' => 'user',
            'status' => 'active',
        ]);

        echo "User created successfully!\n";
        echo "Username: user@smkn4bogor.sch.id\n";
        echo "Password: 123\n";
    }
}
