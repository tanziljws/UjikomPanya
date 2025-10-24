<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\Galeri;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create regular user
        User::create([
            'name' => 'Onya',
            'email' => 'onya@example.com',
            'password' => Hash::make('123'),
        ]);

        // Create admin user
        Admin::create([
            'username' => 'admin',
            'password' => Hash::make('123'),
        ]);

        // Create sample gallery items
        Galeri::create([
            'judul' => 'Upacara Bendera',
            'deskripsi' => 'Upacara bendera setiap hari Senin di halaman sekolah',
            'gambar' => 'images/1753932149.png',
        ]);

        Galeri::create([
            'judul' => 'Kegiatan Praktik',
            'deskripsi' => 'Siswa sedang melakukan praktik di laboratorium',
            'gambar' => 'images/1753932198.png',
        ]);

        Galeri::create([
            'judul' => 'Kunjungan Industri',
            'deskripsi' => 'Kunjungan industri ke perusahaan teknologi',
            'gambar' => 'images/1753933350.png',
        ]);

        Galeri::create([
            'judul' => 'Ekstrakurikuler',
            'deskripsi' => 'Kegiatan ekstrakurikuler robotik',
            'gambar' => 'images/1753933999.png',
        ]);

        Galeri::create([
            'judul' => 'Workshop Teknologi',
            'deskripsi' => 'Workshop teknologi untuk siswa kelas XII',
            'gambar' => 'images/1753935190.png',
        ]);

        Galeri::create([
            'judul' => 'Perayaan Hari Kemerdekaan',
            'deskripsi' => 'Perayaan hari kemerdekaan Indonesia',
            'gambar' => 'images/1753935224.png',
        ]);
    }
}
