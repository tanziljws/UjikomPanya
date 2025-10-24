<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ActivityLog;
use Carbon\Carbon;

class ActivityLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = [
            // Admin activities
            [
                'activity_type' => 'admin_post_galeri',
                'activity_name' => 'Upload foto baru: Kegiatan Upacara Bendera',
                'user_type' => 'Admin',
                'user_id' => 1,
                'status' => 'Berhasil',
                'description' => 'Foto galeri berhasil ditambahkan',
                'created_at' => Carbon::now()->subHours(2),
            ],
            [
                'activity_type' => 'admin_post_agenda',
                'activity_name' => 'Tambah agenda: Rapat Guru',
                'user_type' => 'Admin',
                'user_id' => 1,
                'status' => 'Berhasil',
                'description' => 'Agenda baru berhasil ditambahkan',
                'created_at' => Carbon::now()->subHours(4),
            ],
            [
                'activity_type' => 'admin_post_informasi',
                'activity_name' => 'Tambah informasi: Pengumuman Libur Semester',
                'user_type' => 'Admin',
                'user_id' => 1,
                'status' => 'Berhasil',
                'description' => 'Informasi baru berhasil ditambahkan',
                'created_at' => Carbon::now()->subHours(6),
            ],
            
            // User activities
            [
                'activity_type' => 'user_register',
                'activity_name' => 'Registrasi user baru: Ahmad Fadillah',
                'user_type' => 'User',
                'user_id' => 2,
                'status' => 'Berhasil',
                'description' => 'User baru berhasil mendaftar',
                'created_at' => Carbon::now()->subDay(),
            ],
            [
                'activity_type' => 'user_login',
                'activity_name' => 'User login: Siti Nurhaliza',
                'user_type' => 'User',
                'user_id' => 3,
                'status' => 'Berhasil',
                'description' => 'User berhasil login ke sistem',
                'created_at' => Carbon::now()->subHours(3),
            ],
            [
                'activity_type' => 'user_like',
                'activity_name' => 'Like foto: Kegiatan Olahraga',
                'user_type' => 'User',
                'user_id' => 2,
                'status' => 'Berhasil',
                'description' => 'User menyukai foto galeri',
                'created_at' => Carbon::now()->subHours(5),
            ],
            [
                'activity_type' => 'user_comment',
                'activity_name' => 'Komentar pada foto: Kegiatan Ekstrakurikuler',
                'user_type' => 'User',
                'user_id' => 3,
                'status' => 'Berhasil',
                'description' => 'User memberikan komentar pada foto galeri',
                'created_at' => Carbon::now()->subHours(7),
            ],
            [
                'activity_type' => 'user_login',
                'activity_name' => 'User login: Budi Santoso',
                'user_type' => 'User',
                'user_id' => 4,
                'status' => 'Berhasil',
                'description' => 'User berhasil login ke sistem',
                'created_at' => Carbon::now()->subDays(2),
            ],
            [
                'activity_type' => 'user_like',
                'activity_name' => 'Like foto: Kegiatan Pramuka',
                'user_type' => 'User',
                'user_id' => 4,
                'status' => 'Berhasil',
                'description' => 'User menyukai foto galeri',
                'created_at' => Carbon::now()->subDays(3),
            ],
            [
                'activity_type' => 'admin_post_galeri',
                'activity_name' => 'Upload foto baru: Kegiatan Lomba',
                'user_type' => 'Admin',
                'user_id' => 1,
                'status' => 'Berhasil',
                'description' => 'Foto galeri berhasil ditambahkan',
                'created_at' => Carbon::now()->subDays(5),
            ],
        ];

        foreach ($activities as $activity) {
            ActivityLog::create($activity);
        }
    }
}
