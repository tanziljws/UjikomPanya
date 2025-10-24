<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DashboardController;

// Authentication routes (only for admin)
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'authenticate'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Test route for debugging
Route::get('/test-agenda', function() {
    try {
        $agendas = \App\Models\Agenda::all();
        return response()->json([
            'success' => true,
            'agenda_count' => $agendas->count(),
            'agendas' => $agendas->toArray()
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
    }
});

// Public pages (no authentication required)
Route::get('/agenda', [PublicController::class, 'agenda'])->name('agenda');
Route::get('/informasi', [PublicController::class, 'informasi'])->name('informasi');
Route::get('/galeri', [PublicController::class, 'galeri'])->name('galeri');

// Gallery public routes (no auth required)
Route::post('/galeri/{id}/like', [GaleriController::class, 'toggleLike'])->name('galeri.like');
Route::get('/galeri/{id}/comments', [GaleriController::class, 'getComments'])->name('galeri.comments');
Route::get('/galeri/kategori/{categoryId}', [GaleriController::class, 'filterByCategory'])->name('galeri.category');
// Allow guests to submit comments
Route::post('/galeri/{id}/comment', [GaleriController::class, 'storeComment'])->name('galeri.comment');

// Alternative download route for troubleshooting
Route::get('/download/{id}', function($id) {
    $galeri = \App\Models\Galeri::findOrFail($id);
    $filePath = public_path('images/' . $galeri->gambar);
    
    if (!file_exists($filePath)) {
        abort(404, 'File tidak ditemukan');
    }
    
    $extension = pathinfo($galeri->gambar, PATHINFO_EXTENSION);
    $filename = $galeri->judul . '.' . $extension;
    $filename = preg_replace('/[^a-zA-Z0-9._-]/', '_', $filename);
    
    return response()->download($filePath, $filename);
})->name('download.simple');

// Gallery interaction routes (require user authentication)
Route::middleware(['auth'])->group(function () {
    // Profile (alias both /profile and /profil)
    Route::get('/profil', [App\Http\Controllers\ProfileController::class, 'index'])->name('profil');
    Route::get('/galeri/{id}/download', [GaleriController::class, 'download'])->name('galeri.download');
    
    // Profile routes
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/photo', [App\Http\Controllers\ProfileController::class, 'updatePhoto'])->name('profile.photo');
    Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Admin routes (require admin authentication)
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Gallery management
    Route::resource('galeri', GaleriController::class);
    
    // Category management
    Route::resource('category', CategoryController::class);
    
    // Content management
    Route::resource('content', ContentController::class);
    
    // Agenda management
    Route::resource('agenda', AgendaController::class);
    
    // Information management
    Route::resource('informasi', InformasiController::class);
    
    // Settings management
    Route::resource('settings', SettingController::class);
    
    // User management
    Route::resource('users', UserController::class);
    
    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
    Route::get('/reports/download-pdf', [ReportController::class, 'downloadCompletePDF'])->name('reports.download.pdf');
});

// User authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User registration routes
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'register'])->name('register.submit');

// Welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
