<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Galeri;
use App\Models\Content;
use App\Models\Agenda;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Get admin dashboard
     */
    public function dashboard()
    {
        $totalUsers = User::count();
        $activeUsers = User::where('status', 'active')->count();
        $totalGallery = Galeri::count();
        $activeGallery = Galeri::where('status', 'active')->count();
        $totalContent = Content::count();
        $activeContent = Content::where('status', 'active')->count();
        $totalAgenda = Agenda::count();
        $activeAgenda = Agenda::where('status', 'active')->count();
        $totalInformasi = Informasi::count();
        $activeInformasi = Informasi::where('status', 'active')->count();

        return response()->json([
            'success' => true,
            'data' => [
                'users' => [
                    'total' => $totalUsers,
                    'active' => $activeUsers,
                    'inactive' => $totalUsers - $activeUsers
                ],
                'gallery' => [
                    'total' => $totalGallery,
                    'active' => $activeGallery,
                    'inactive' => $totalGallery - $activeGallery
                ],
                'content' => [
                    'total' => $totalContent,
                    'active' => $activeContent,
                    'inactive' => $totalContent - $activeContent
                ],
                'agenda' => [
                    'total' => $totalAgenda,
                    'active' => $activeAgenda,
                    'inactive' => $totalAgenda - $activeAgenda
                ],
                'information' => [
                    'total' => $totalInformasi,
                    'active' => $activeInformasi,
                    'inactive' => $totalInformasi - $activeInformasi
                ]
            ]
        ]);
    }

    /**
     * Get admin statistics
     */
    public function statistics()
    {
        $userStats = User::selectRaw('role, COUNT(*) as count')
                         ->groupBy('role')
                         ->get();

        $galleryStats = Galeri::selectRaw('kategori, COUNT(*) as count')
                              ->groupBy('kategori')
                              ->get();

        $contentStats = Content::selectRaw('type, COUNT(*) as count')
                              ->groupBy('type')
                              ->get();

        $agendaStats = Agenda::selectRaw('status, COUNT(*) as count')
                            ->groupBy('status')
                            ->get();

        $informasiStats = Informasi::selectRaw('category, COUNT(*) as count')
                                  ->groupBy('category')
                                  ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'users' => $userStats,
                'gallery' => $galleryStats,
                'content' => $contentStats,
                'agenda' => $agendaStats,
                'information' => $informasiStats
            ]
        ]);
    }

    /**
     * Get recent activities
     */
    public function recentActivities()
    {
        $recentUsers = User::latest()->take(5)->get(['id', 'name', 'email', 'created_at']);
        $recentGallery = Galeri::latest()->take(5)->get(['id', 'judul', 'created_at']);
        $recentContent = Content::latest()->take(5)->get(['id', 'title', 'created_at']);
        $recentAgenda = Agenda::latest()->take(5)->get(['id', 'title', 'created_at']);
        $recentInformasi = Informasi::latest()->take(5)->get(['id', 'title', 'created_at']);

        return response()->json([
            'success' => true,
            'data' => [
                'users' => $recentUsers,
                'gallery' => $recentGallery,
                'content' => $recentContent,
                'agenda' => $recentAgenda,
                'information' => $recentInformasi
            ]
        ]);
    }

    /**
     * Get users list
     */
    public function getUsers(Request $request)
    {
        $perPage = min(max((int) $request->query('per_page', 15), 1), 100);
        $search = $request->query('search');
        $role = $request->query('role');
        $status = $request->query('status');

        $query = User::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($role) {
            $query->where('role', $role);
        }

        if ($status) {
            $query->where('status', $status);
        }

        $users = $query->orderBy('created_at', 'desc')
                       ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $users->items(),
            'pagination' => [
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'per_page' => $users->perPage(),
                'total' => $users->total(),
                'from' => $users->firstItem(),
                'to' => $users->lastItem()
            ]
        ]);
    }

    /**
     * Create user
     */
    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'nullable|in:user,admin',
            'status' => 'nullable|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user',
            'status' => $request->status ?? 'active'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User berhasil dibuat',
            'data' => $user
        ], 201);
    }

    /**
     * Get user detail
     */
    public function getUser($id)
    {
        $user = User::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    /**
     * Update user
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'sometimes|in:user,admin',
            'status' => 'sometimes|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user->update($request->only(['name', 'email', 'role', 'status']));

        return response()->json([
            'success' => true,
            'message' => 'User berhasil diupdate',
            'data' => $user
        ]);
    }

    /**
     * Delete user
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User berhasil dihapus'
        ]);
    }

    /**
     * Toggle user status
     */
    public function toggleUserStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = $user->status === 'active' ? 'inactive' : 'active';
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Status user berhasil diubah',
            'data' => [
                'id' => $user->id,
                'status' => $user->status
            ]
        ]);
    }

    /**
     * Change user role
     */
    public function changeUserRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'role' => 'required|in:user,admin'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user->update(['role' => $request->role]);

        return response()->json([
            'success' => true,
            'message' => 'Role user berhasil diubah',
            'data' => [
                'id' => $user->id,
                'role' => $user->role
            ]
        ]);
    }

    /**
     * Get user statistics
     */
    public function getUserStatistics()
    {
        $total = User::count();
        $active = User::where('status', 'active')->count();
        $inactive = User::where('status', 'inactive')->count();
        $roles = User::selectRaw('role, COUNT(*) as count')
                     ->groupBy('role')
                     ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'total' => $total,
                'active' => $active,
                'inactive' => $inactive,
                'roles' => $roles
            ]
        ]);
    }
}
