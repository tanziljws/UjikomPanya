<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// ==========================
// HOMEPAGE
// ==========================
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ==========================
// MENU UTAMA UNTUK PENGUNJUNG (SIDEBAR)
// ==========================

// Menampilkan halaman profil, agenda, informasi
Route::view('/profil', 'profil')->name('profil');
Route::view('/agenda', 'agenda')->name('agenda');
Route::view('/informasi', 'informasi')->name('informasi');
Route::get('/galeri', [GaleriController::class, 'publicIndex'])->name('galeri.public');

// Login form (halaman login biasa)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout routes (tidak memerlukan auth)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ==========================
// PROTEKSI RUTE USER (HANYA SETELAH LOGIN)
// ==========================

Route::middleware('auth')->group(function () {
    // Dashboard user
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

// ==========================
// LOGIN ADMIN
// ==========================

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'authenticate'])->name('admin.login.submit');

// ==========================
// PROTEKSI RUTE ADMIN (HANYA SETELAH LOGIN)
// ==========================

Route::middleware('auth:admin')->prefix('admin')->group(function () {

    // Dashboard admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Galeri routes dengan nama yang lebih spesifik
    Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri.index');
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('admin.galeri.create');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('/galeri/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

    // User management routes
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::patch('/users/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('admin.users.toggle-status');

    // Content management routes
    Route::get('/content', [ContentController::class, 'index'])->name('admin.content.index');
    Route::get('/content/create', [ContentController::class, 'create'])->name('admin.content.create');
    Route::post('/content', [ContentController::class, 'store'])->name('admin.content.store');
    Route::get('/content/{id}/edit', [ContentController::class, 'edit'])->name('admin.content.edit');
    Route::put('/content/{id}', [ContentController::class, 'update'])->name('admin.content.update');
    Route::delete('/content/{id}', [ContentController::class, 'destroy'])->name('admin.content.destroy');

    // Agenda management routes
    Route::get('/agenda', [AgendaController::class, 'index'])->name('admin.agenda.index');
    Route::get('/agenda/create', [AgendaController::class, 'create'])->name('admin.agenda.create');
    Route::post('/agenda', [AgendaController::class, 'store'])->name('admin.agenda.store');
    Route::get('/agenda/{id}/edit', [AgendaController::class, 'edit'])->name('admin.agenda.edit');
    Route::put('/agenda/{id}', [AgendaController::class, 'update'])->name('admin.agenda.update');
    Route::delete('/agenda/{id}', [AgendaController::class, 'destroy'])->name('admin.agenda.destroy');

    // Informasi management routes
    Route::get('/informasi', [InformasiController::class, 'index'])->name('admin.informasi.index');
    Route::get('/informasi/create', [InformasiController::class, 'create'])->name('admin.informasi.create');
    Route::post('/informasi', [InformasiController::class, 'store'])->name('admin.informasi.store');
    Route::get('/informasi/{id}', [InformasiController::class, 'show'])->name('admin.informasi.show');
    Route::get('/informasi/{id}/edit', [InformasiController::class, 'edit'])->name('admin.informasi.edit');
    Route::put('/informasi/{id}', [InformasiController::class, 'update'])->name('admin.informasi.update');
    Route::delete('/informasi/{id}', [InformasiController::class, 'destroy'])->name('admin.informasi.destroy');

    // Settings management routes
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::get('/settings/edit', [SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::get('/settings/security', [SettingController::class, 'security'])->name('admin.settings.security');
    Route::get('/settings/database', [SettingController::class, 'database'])->name('admin.settings.database');
    Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');

    // Reports management routes
    Route::get('/reports', [ReportController::class, 'index'])->name('admin.reports.index');
    Route::post('/reports/generate', [ReportController::class, 'generateReport'])->name('admin.reports.generate');
});

// Testing route untuk memastikan tidak ada masalah dengan middleware
Route::get('/admin/test', function () {
    return 'Admin test route berhasil diakses!';
})->middleware('auth:admin')->name('admin.test');

// Route untuk testing tanpa middleware (temporary)
Route::get('/admin/galeri-test', [GaleriController::class, 'index'])->name('galeri.test');

// Debug route untuk memeriksa session
Route::get('/admin/debug', function () {
    if (auth()->guard('admin')->check()) {
        return 'Admin sudah login: ' . auth()->guard('admin')->user()->username;
    } else {
        return 'Admin belum login';
    }
})->name('admin.debug');

// Route galeri tanpa middleware untuk testing
Route::get('/admin/galeri-no-auth', [GaleriController::class, 'index'])->name('galeri.noauth');

// Route untuk testing view galeri tanpa auth
Route::get('/admin/galeri-view-test', function () {
    $galeri = \App\Models\Galeri::all();
    return view('admin.galeri.index', compact('galeri'));
})->name('galeri.viewtest');
