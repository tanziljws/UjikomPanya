<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        // Sample gallery data with existing images
        $galeriData = [
            [
                'judul' => 'Kegiatan Belajar Mengajar',
                'gambar' => 'smkn4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Upacara Bendera',
                'gambar' => 'smk42.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Laboratorium Komputer',
                'gambar' => '1754023639.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Bengkel Otomotif',
                'gambar' => '1754023677.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kunjungan Industri',
                'gambar' => '1754024673.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Perpustakaan Sekolah',
                'gambar' => '1754024776.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($galeriData as $data) {
            Galeri::updateOrCreate(
                ['judul' => $data['judul']],
                $data
            );
        }
    }
}
