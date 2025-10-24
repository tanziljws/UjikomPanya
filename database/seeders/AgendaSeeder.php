<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agenda;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agendas = [
            [
                'title' => 'Rapat Koordinasi Guru',
                'description' => 'Rapat koordinasi bulanan untuk membahas program pembelajaran dan kegiatan sekolah',
                'date' => '2025-01-20',
                'time' => '08:00:00',
                'location' => 'Aula SMK Negeri 4',
                'type' => 'meeting',
                'status' => true,
                'image' => null
            ],
            [
                'title' => 'Kunjungan Industri',
                'description' => 'Kunjungan siswa ke perusahaan mitra untuk praktik kerja industri',
                'date' => '2025-01-25',
                'time' => '07:30:00',
                'location' => 'PT Maju Bersama',
                'type' => 'event',
                'status' => true,
                'image' => null
            ],
            [
                'title' => 'Ujian Tengah Semester',
                'description' => 'Pelaksanaan ujian tengah semester untuk semua jurusan',
                'date' => '2025-02-10',
                'time' => '08:00:00',
                'location' => 'Ruang Kelas',
                'type' => 'academic',
                'status' => true,
                'image' => null
            ],
            [
                'title' => 'Workshop Kewirausahaan',
                'description' => 'Workshop pengembangan jiwa kewirausahaan untuk siswa kelas XI',
                'date' => '2025-02-15',
                'time' => '09:00:00',
                'location' => 'Lab Komputer',
                'type' => 'event',
                'status' => true,
                'image' => null
            ],
            [
                'title' => 'Peringatan Hari Kartini',
                'description' => 'Kegiatan peringatan Hari Kartini dengan berbagai lomba dan pentas seni',
                'date' => '2025-04-21',
                'time' => '08:00:00',
                'location' => 'Halaman Sekolah',
                'type' => 'event',
                'status' => true,
                'image' => null
            ]
        ];

        foreach ($agendas as $agenda) {
            Agenda::create($agenda);
        }
    }
}
