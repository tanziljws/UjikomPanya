<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama' => 'Kegiatan Sekolah',
                'deskripsi' => 'Foto-foto kegiatan rutin dan acara sekolah'
            ],
            [
                'nama' => 'Prestasi Siswa',
                'deskripsi' => 'Foto dokumentasi prestasi dan pencapaian siswa'
            ],
            [
                'nama' => 'Ekstrakurikuler',
                'deskripsi' => 'Foto kegiatan ekstrakurikuler dan organisasi siswa'
            ],
            [
                'nama' => 'Pembelajaran',
                'deskripsi' => 'Foto proses pembelajaran di kelas dan laboratorium'
            ],
            [
                'nama' => 'Fasilitas Sekolah',
                'deskripsi' => 'Foto gedung, ruangan, dan fasilitas sekolah'
            ],
            [
                'nama' => 'Acara Khusus',
                'deskripsi' => 'Foto acara-acara khusus seperti perayaan hari besar'
            ],
            [
                'nama' => 'BUKU TAHUNAN 2025',
                'deskripsi' => 'Kumpulan foto dan dokumentasi Buku Tahunan 2025'
            ],
        ];

        // Use firstOrCreate to avoid duplicates when seeding multiple times
        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['nama' => $category['nama']],
                ['deskripsi' => $category['deskripsi'] ?? null]
            );
        }
    }
}
