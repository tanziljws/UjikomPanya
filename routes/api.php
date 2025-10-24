<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GaleriController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\AgendaController;
use App\Http\Controllers\Api\InformasiController;
use App\Http\Controllers\Api\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public routes (tidak perlu authentication)
Route::prefix('v1')->group(function () {
    
    // ==========================
    // AUTHENTICATION API
    // ==========================
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/admin/login', [AuthController::class, 'adminLogin']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // ==========================
    // PUBLIC GALLERY API
    // ==========================
    Route::get('/gallery', [GaleriController::class, 'publicIndex']);
    Route::get('/gallery/{id}', [GaleriController::class, 'publicShow']);
    
    // ==========================
    // PUBLIC CONTENT API
    // ==========================
    Route::get('/content', [ContentController::class, 'publicIndex']);
    Route::get('/content/{id}', [ContentController::class, 'publicShow']);
    
    // ==========================
    // PUBLIC AGENDA API
    // ==========================
    Route::get('/agenda', [AgendaController::class, 'publicIndex']);
    Route::get('/agenda/{id}', [AgendaController::class, 'publicShow']);

// ==========================
    // PUBLIC INFORMATION API
// ==========================
    Route::get('/information', [InformasiController::class, 'publicIndex']);
    Route::get('/information/{id}', [InformasiController::class, 'publicShow']);
    
    // ==========================
    // PUBLIC SCHOOL INFO API
    // ==========================
    Route::get('/school/profile', [AdminController::class, 'getSchoolProfile']);
    Route::get('/school/statistics', [AdminController::class, 'getStatistics']);
});

// Protected routes (perlu authentication)
Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    
    // ==========================
    // USER PROFILE API
    // ==========================
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::put('/profile', [AuthController::class, 'updateProfile']);
    Route::put('/profile/password', [AuthController::class, 'updatePassword']);
    
    // ==========================
    // USER GALLERY INTERACTION
    // ==========================
    Route::post('/gallery/{id}/like', [GaleriController::class, 'toggleLike']);
    Route::post('/gallery/{id}/comment', [GaleriController::class, 'addComment']);
    Route::get('/gallery/{id}/comments', [GaleriController::class, 'getComments']);
});

// Admin routes (perlu admin authentication)
Route::middleware(['auth:sanctum', 'admin'])->prefix('v1/admin')->group(function () {
    
    // ==========================
    // ADMIN DASHBOARD API
    // ==========================
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/statistics', [AdminController::class, 'getDetailedStatistics']);
    Route::get('/recent-activities', [AdminController::class, 'getRecentActivities']);
    
    // ==========================
    // ADMIN GALLERY MANAGEMENT API
    // ==========================
    Route::get('/gallery', [GaleriController::class, 'adminIndex']);
    Route::post('/gallery', [GaleriController::class, 'store']);
    Route::get('/gallery/{id}', [GaleriController::class, 'adminShow']);
    Route::put('/gallery/{id}', [GaleriController::class, 'update']);
    Route::delete('/gallery/{id}', [GaleriController::class, 'destroy']);
    Route::post('/gallery/upload', [GaleriController::class, 'uploadImage']);
    Route::get('/gallery/statistics', [GaleriController::class, 'getStatistics']);
    
    // ==========================
    // ADMIN USER MANAGEMENT API
    // ==========================
    Route::get('/users', [UserController::class, 'adminIndex']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'adminShow']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::patch('/users/{id}/toggle-status', [UserController::class, 'toggleStatus']);
    Route::patch('/users/{id}/change-role', [UserController::class, 'changeRole']);
    Route::get('/users/statistics', [UserController::class, 'getStatistics']);
    
    // ==========================
    // ADMIN CONTENT MANAGEMENT API
    // ==========================
    Route::get('/content', [ContentController::class, 'adminIndex']);
    Route::post('/content', [ContentController::class, 'store']);
    Route::get('/content/{id}', [ContentController::class, 'adminShow']);
    Route::put('/content/{id}', [ContentController::class, 'update']);
    Route::delete('/content/{id}', [ContentController::class, 'destroy']);
    Route::patch('/content/{id}/toggle-status', [ContentController::class, 'toggleStatus']);
    
    // ==========================
    // ADMIN AGENDA MANAGEMENT API
    // ==========================
    Route::get('/agenda', [AgendaController::class, 'adminIndex']);
    Route::post('/agenda', [AgendaController::class, 'store']);
    Route::get('/agenda/{id}', [AgendaController::class, 'adminShow']);
    Route::put('/agenda/{id}', [AgendaController::class, 'update']);
    Route::delete('/agenda/{id}', [AgendaController::class, 'destroy']);
    Route::patch('/agenda/{id}/toggle-status', [AgendaController::class, 'toggleStatus']);
    
    // ==========================
    // ADMIN INFORMATION MANAGEMENT API
    // ==========================
    Route::get('/information', [InformasiController::class, 'adminIndex']);
    Route::post('/information', [InformasiController::class, 'store']);
    Route::get('/information/{id}', [InformasiController::class, 'adminShow']);
    Route::put('/information/{id}', [InformasiController::class, 'update']);
    Route::delete('/information/{id}', [InformasiController::class, 'destroy']);
    Route::patch('/information/{id}/toggle-status', [InformasiController::class, 'toggleStatus']);
    
    // ==========================
    // ADMIN SETTINGS API
    // ==========================
    Route::get('/settings', [AdminController::class, 'getSettings']);
    Route::put('/settings', [AdminController::class, 'updateSettings']);
    Route::get('/settings/security', [AdminController::class, 'getSecuritySettings']);
    Route::put('/settings/security', [AdminController::class, 'updateSecuritySettings']);
    
    // ==========================
    // ADMIN REPORTS API
    // ==========================
    Route::get('/reports', [AdminController::class, 'getReports']);
    Route::post('/reports/generate', [AdminController::class, 'generateReport']);
    Route::get('/reports/export/{type}', [AdminController::class, 'exportReport']);
    
    // ==========================
    // ADMIN SYSTEM API
    // ==========================
    Route::get('/system/health', [AdminController::class, 'systemHealth']);
    Route::get('/system/logs', [AdminController::class, 'getSystemLogs']);
    Route::post('/system/backup', [AdminController::class, 'createBackup']);
    Route::get('/system/backup/download/{filename}', [AdminController::class, 'downloadBackup']);
});

// ==========================
// API DOCUMENTATION ROUTE
// ==========================
Route::get('/v1/documentation', function () {
    return response()->json([
        'message' => 'SMK Negeri 4 Gallery API Documentation',
        'version' => '1.0.0',
        'endpoints' => [
            'authentication' => [
                'POST /api/v1/login' => 'User login',
                'POST /api/v1/admin/login' => 'Admin login',
                'POST /api/v1/register' => 'User registration',
                'POST /api/v1/logout' => 'User logout'
            ],
            'public' => [
                'GET /api/v1/gallery' => 'Get public gallery',
                'GET /api/v1/content' => 'Get public content',
                'GET /api/v1/agenda' => 'Get public agenda',
                'GET /api/v1/information' => 'Get public information'
            ],
            'protected' => [
                'GET /api/v1/profile' => 'Get user profile',
                'PUT /api/v1/profile' => 'Update user profile'
            ],
            'admin' => [
                'GET /api/v1/admin/dashboard' => 'Admin dashboard',
                'GET /api/v1/admin/users' => 'Manage users',
                'GET /api/v1/admin/gallery' => 'Manage gallery',
                'GET /api/v1/admin/content' => 'Manage content',
                'GET /api/v1/admin/agenda' => 'Manage agenda',
                'GET /api/v1/admin/information' => 'Manage information'
            ]
        ],
        'authentication' => 'Bearer Token (Sanctum)',
        'rate_limit' => '100 requests per minute',
        'contact' => 'admin@smkn4.sch.id'
    ]);
});

// ==========================
// API HEALTH CHECK
// ==========================
Route::get('/v1/health', function () {
    return response()->json([
        'status' => 'healthy',
        'timestamp' => now()->toISOString(),
        'version' => '1.0.0',
        'environment' => config('app.env')
    ]);
});
