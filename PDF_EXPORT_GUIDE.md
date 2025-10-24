# Panduan Export Laporan PDF

## Fitur
Sistem ini menyediakan **satu tombol download** untuk mengekspor **laporan lengkap** dalam format PDF yang siap cetak.

## Isi Laporan PDF

Laporan lengkap mencakup:

### 1. Statistik Total
- Total Foto Galeri
- Total User
- Total Agenda
- Total Informasi

### 2. Statistik Aktivitas 7 Hari Terakhir
- Post Admin (Galeri + Agenda + Informasi)
- User Register
- User Login
- User Like
- User Comment

### 3. Aktivitas Terbaru
- 50 aktivitas terakhir dalam 7 hari
- Detail: Tanggal, Aktivitas, Tipe User, Status

### 4. Data User Terbaru
- 20 user terakhir
- Detail: Nama, Email, Role, Tanggal Daftar

### 5. Data Galeri Terbaru
- 20 foto galeri terakhir
- Detail: Judul, Kategori, Tanggal Upload

### 6. Data Agenda Terbaru
- 20 agenda terakhir
- Detail: Judul, Tanggal, Lokasi, Status

### 7. Data Informasi Terbaru
- 20 informasi terakhir
- Detail: Judul, Kategori, Penulis, Tanggal

## Cara Menggunakan

### Dari Halaman Admin

1. Login sebagai admin
2. Buka menu **Laporan** (`/admin/reports`)
3. Di sidebar kanan, klik tombol **"Download PDF Lengkap"**
4. File PDF akan terbuka di tab baru
5. Gunakan fungsi print browser (Ctrl+P) untuk:
   - Mencetak langsung
   - Atau "Save as PDF" untuk menyimpan file

### URL Direct Access
```
http://127.0.0.1:8000/admin/reports/download-pdf
```

## Fitur PDF

### Auto Print
- PDF otomatis membuka dialog print saat halaman dimuat
- Anda bisa langsung mencetak atau menyimpan

### Responsive Print
- Layout otomatis menyesuaikan untuk ukuran kertas A4
- Margin optimal untuk pencetakan
- Page break yang baik untuk setiap section

### Styling Professional
- Header dengan logo sekolah
- Warna branded (biru SMK Negeri 4)
- Tabel dengan border yang jelas
- Badge berwarna untuk status
- Footer dengan informasi copyright

## Kustomisasi

### Mengubah Jumlah Data
Edit file `ReportController.php` method `downloadCompletePDF()`:

```php
// Ubah angka take() sesuai kebutuhan
$users = User::latest()->take(50)->get(); // dari 20 jadi 50
$galeris = Galeri::with('category')->latest()->take(50)->get();
```

### Mengubah Styling
Edit file `resources/views/admin/reports/pdf.blade.php` di bagian `<style>`:

```css
/* Contoh: Ubah warna header */
.section-title {
    background: #059669; /* Ganti warna */
    color: white;
}
```

### Menambah Section Baru
Tambahkan di `pdf.blade.php`:

```html
<div class="section">
    <div class="section-title">JUDUL SECTION BARU</div>
    <table>
        <!-- Isi tabel -->
    </table>
</div>
```

## Tips Penggunaan

### Untuk Cetak Fisik
- Gunakan kertas A4
- Set orientation: Portrait
- Margins: Default (2cm)
- Print in color untuk hasil terbaik

### Untuk Simpan Digital
- Pilih "Save as PDF" di print dialog
- Nama file otomatis: "Laporan_[tanggal].pdf"
- Ukuran file: ~100-500KB (tergantung data)

### Untuk Presentasi
- Buka PDF di browser
- Gunakan mode fullscreen (F11)
- Scroll untuk navigasi antar section

## Troubleshooting

### PDF tidak muncul
- Pastikan sudah login sebagai admin
- Clear browser cache (Ctrl+Shift+Del)
- Coba akses langsung via URL

### Data tidak lengkap
- Jalankan seeder: `php artisan db:seed --class=ActivityLogSeeder`
- Pastikan ada data di database

### Print tidak rapi
- Gunakan browser Chrome/Edge (recommended)
- Set scale ke 100%
- Disable background graphics jika perlu

### Auto print tidak jalan
- Beberapa browser block auto print
- Klik tombol print manual (Ctrl+P)

## File Terkait

1. **Controller**: `app/Http/Controllers/ReportController.php`
   - Method: `downloadCompletePDF()`

2. **View**: `resources/views/admin/reports/pdf.blade.php`
   - Template PDF lengkap

3. **Route**: `routes/web.php`
   - Route: `admin.reports.download.pdf`

4. **View Index**: `resources/views/admin/reports/index.blade.php`
   - Tombol download

## Update Log

### Version 1.0 (22 Oktober 2025)
- ✅ Implementasi export PDF lengkap
- ✅ Satu tombol untuk semua laporan
- ✅ Auto print functionality
- ✅ Responsive print layout
- ✅ Professional styling
- ✅ Include semua data penting

## Support

Untuk pertanyaan atau issue, hubungi tim developer atau buat issue di repository.
