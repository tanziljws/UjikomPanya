<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Informasi;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $informasis = [
            [
                'title' => 'Penerimaan Peserta Didik Baru 2025/2026',
                'description' => 'Informasi lengkap tentang pendaftaran siswa baru untuk tahun ajaran 2025/2026',
                'content' => [
                    'pendahuluan' => 'SMK Negeri 4 Kota Bogor membuka pendaftaran untuk siswa baru tahun ajaran 2025/2026',
                    'jurusan' => 'Teknik Komputer dan Jaringan, Rekayasa Perangkat Lunak, Multimedia, dan Akuntansi',
                    'persyaratan' => 'Fotokopi KK, Akta Kelahiran, Ijazah/SKL, dan dokumen pendukung lainnya',
                    'jadwal' => 'Pendaftaran dibuka mulai Januari 2025'
                ],
                'category' => 'announcement',
                'author' => 'Admin Sekolah',
                'status' => true,
                'image' => null,
                'published_at' => '2025-01-15 08:00:00'
            ],
            [
                'title' => 'Prestasi Siswa di Kompetisi Nasional',
                'description' => 'Siswa SMK Negeri 4 berhasil meraih juara dalam kompetisi teknologi tingkat nasional',
                'content' => [
                    'prestasi' => 'Juara 1 Lomba Kompetensi Siswa (LKS) bidang Web Technologies',
                    'peserta' => 'Tim dari jurusan Rekayasa Perangkat Lunak',
                    'lokasi' => 'Jakarta Convention Center',
                    'hadiah' => 'Beasiswa dan sertifikat nasional'
                ],
                'category' => 'news',
                'author' => 'Tim Humas',
                'status' => true,
                'image' => null,
                'published_at' => '2025-01-10 08:00:00'
            ],
            [
                'title' => 'Jadwal Ujian Nasional 2025',
                'description' => 'Informasi lengkap tentang jadwal dan persiapan ujian nasional tahun 2025',
                'content' => [
                    'tanggal' => 'Ujian Nasional akan dilaksanakan pada bulan April 2025',
                    'mata_pelajaran' => 'Matematika, Bahasa Indonesia, Bahasa Inggris, dan mata pelajaran jurusan',
                    'persiapan' => 'Latihan soal dan try out akan dilaksanakan secara berkala',
                    'ketentuan' => 'Mengikuti protokol kesehatan yang berlaku'
                ],
                'category' => 'academic',
                'author' => 'Wakil Kepala Sekolah',
                'status' => true,
                'image' => null,
                'published_at' => '2025-01-05 08:00:00'
            ],
            [
                'title' => 'Kegiatan Ekstrakurikuler Semester Genap',
                'description' => 'Daftar kegiatan ekstrakurikuler yang tersedia untuk semester genap tahun ajaran 2024/2025',
                'content' => [
                    'olahraga' => 'Basket, Futsal, Volly, dan Pramuka',
                    'seni' => 'Seni Musik, Seni Tari, dan Teater',
                    'akademik' => 'English Club, Matematika Club, dan Komputer Club',
                    'pendaftaran' => 'Pendaftaran dibuka mulai Januari 2025'
                ],
                'category' => 'event',
                'author' => 'Pembina Ekstrakurikuler',
                'status' => true,
                'image' => null,
                'published_at' => '2025-01-01 08:00:00'
            ],
            [
                'title' => 'Informasi Pembayaran SPP dan Uang Komite',
                'description' => 'Petunjuk pembayaran SPP dan uang komite sekolah untuk semester genap',
                'content' => [
                    'spp' => 'SPP bulanan sebesar Rp 150.000 dapat dibayar melalui bank atau langsung ke sekolah',
                    'komite' => 'Uang komite sebesar Rp 200.000 per semester untuk mendukung kegiatan sekolah',
                    'jadwal' => 'Pembayaran paling lambat tanggal 10 setiap bulannya',
                    'metode' => 'Transfer bank atau pembayaran tunai di kantor sekolah'
                ],
                'category' => 'announcement',
                'author' => 'Bendahara Sekolah',
                'status' => true,
                'image' => null,
                'published_at' => '2024-12-28 08:00:00'
            ]
        ];

        foreach ($informasis as $informasi) {
            Informasi::create($informasi);
        }
    }
}
