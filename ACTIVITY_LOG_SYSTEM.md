# Sistem Laporan Aktivitas

## Deskripsi
Sistem ini mencatat semua aktivitas admin dan user secara otomatis dan menampilkan laporan per 7 hari terakhir.

## Fitur

### 1. Tracking Aktivitas Admin
- **Upload Foto Galeri** - Dicatat saat admin menambah foto baru
- **Tambah Agenda** - Dicatat saat admin membuat agenda baru
- **Tambah Informasi** - Dicatat saat admin membuat informasi baru

### 2. Tracking Aktivitas User
- **Register** - Dicatat saat user baru mendaftar
- **Login** - Dicatat setiap kali user login
- **Like** - Dicatat saat user menyukai foto
- **Comment** - Dicatat saat user memberikan komentar

## Database

### Tabel: `activity_logs`
```sql
- id
- activity_type (admin_post_galeri, admin_post_agenda, admin_post_informasi, user_register, user_login, user_like, user_comment)
- activity_name (deskripsi aktivitas)
- user_type (Admin, User, System)
- user_id (ID user yang melakukan aktivitas)
- status (Berhasil, Gagal, Pending)
- description (detail tambahan)
- ip_address
- user_agent
- created_at
- updated_at
```

## Model: ActivityLog

### Static Methods
- `logAdminActivity($type, $name, $userId, $description)` - Log aktivitas admin
- `logUserActivity($type, $name, $userId, $description)` - Log aktivitas user
- `logSystemActivity($type, $name, $description)` - Log aktivitas sistem

### Scopes
- `adminActivities()` - Filter aktivitas admin
- `userActivities()` - Filter aktivitas user
- `lastWeek()` - Filter aktivitas 7 hari terakhir
- `today()` - Filter aktivitas hari ini

## Controller yang Sudah Diupdate

1. **GaleriController**
   - `store()` - Log saat admin upload foto
   - `toggleLike()` - Log saat user like foto
   - `storeComment()` - Log saat user comment

2. **AgendaController**
   - `store()` - Log saat admin tambah agenda

3. **InformasiController**
   - `store()` - Log saat admin tambah informasi

4. **AuthController**
   - `login()` - Log saat user login

5. **RegisterController**
   - `register()` - Log saat user register

6. **ReportController**
   - `index()` - Menampilkan laporan dengan data real-time

## Halaman Laporan

### URL: `/admin/reports`

### Data yang Ditampilkan:
1. **Statistik Total**
   - Total Foto
   - Total User
   - Total Agenda
   - Total Informasi

2. **Statistik 7 Hari Terakhir**
   - Post Admin (Galeri + Agenda + Informasi)
   - User Register
   - User Login
   - User Like
   - User Comment

3. **Tabel Aktivitas Terbaru**
   - Menampilkan 20 aktivitas terakhir dalam 7 hari
   - Kolom: Waktu, Aktivitas, User Type, Status

## Cara Menggunakan

### Menambah Log Manual
```php
use App\Models\ActivityLog;

// Log aktivitas admin
ActivityLog::logAdminActivity(
    'admin_post_galeri',
    'Upload foto: Judul Foto',
    auth()->id(),
    'Detail tambahan'
);

// Log aktivitas user
ActivityLog::logUserActivity(
    'user_login',
    'User login: Nama User',
    auth()->id(),
    'Detail tambahan'
);
```

### Query Data
```php
// Aktivitas 7 hari terakhir
$activities = ActivityLog::lastWeek()->get();

// Aktivitas admin saja
$adminActivities = ActivityLog::adminActivities()->get();

// Aktivitas user saja
$userActivities = ActivityLog::userActivities()->get();

// Aktivitas hari ini
$todayActivities = ActivityLog::today()->get();
```

## Testing

Untuk testing, jalankan seeder:
```bash
php artisan db:seed --class=ActivityLogSeeder
```

Seeder akan membuat 10 contoh aktivitas dengan berbagai tipe dan waktu.

## Catatan
- Semua aktivitas dicatat secara otomatis
- Laporan diupdate real-time
- Data disimpan dengan IP address dan user agent untuk audit
- Filter 7 hari terakhir untuk performa optimal
