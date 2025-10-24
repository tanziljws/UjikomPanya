<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GaleriController extends Controller
{
    /**
     * Public gallery index
     */
    public function publicIndex(Request $request)
    {
        $perPage = min(max((int) $request->query('per_page', 12), 1), 100);
        $search = $request->query('search');
        $category = $request->query('category');

        $query = Galeri::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($category) {
            $query->where('kategori', $category);
        }

        $galeri = $query->orderBy('created_at', 'desc')
                        ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $galeri->items(),
            'pagination' => [
                'current_page' => $galeri->currentPage(),
                'last_page' => $galeri->lastPage(),
                'per_page' => $galeri->perPage(),
                'total' => $galeri->total(),
                'from' => $galeri->firstItem(),
                'to' => $galeri->lastItem()
            ]
        ]);
    }

    /**
     * Public gallery show
     */
    public function publicShow($id)
    {
        $galeri = Galeri::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $galeri
        ]);
    }

    /**
     * Admin gallery index
     */
    public function adminIndex(Request $request)
    {
        $perPage = min(max((int) $request->query('per_page', 15), 1), 100);
        $search = $request->query('search');
        $status = $request->query('status');

        $query = Galeri::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($status) {
            $query->where('status', $status);
        }

        $galeri = $query->orderBy('created_at', 'desc')
                        ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $galeri->items(),
            'pagination' => [
                'current_page' => $galeri->currentPage(),
                'last_page' => $galeri->lastPage(),
                'per_page' => $galeri->perPage(),
                'total' => $galeri->total(),
                'from' => $galeri->firstItem(),
                'to' => $galeri->lastItem()
            ]
        ]);
    }

    /**
     * Admin gallery show
     */
    public function adminShow($id)
    {
        $galeri = Galeri::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $galeri
        ]);
    }

    /**
     * Store new gallery item
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'nullable|string|max:100',
            'status' => 'nullable|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('images', $imageName, 'public');
        }

        $galeri = Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imagePath ?? null,
            'kategori' => $request->kategori ?? 'umum',
            'status' => $request->status ?? 'active'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Galeri berhasil ditambahkan',
            'data' => $galeri
        ], 201);
    }

    /**
     * Update gallery item
     */
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'judul' => 'sometimes|string|max:255',
            'deskripsi' => 'sometimes|string',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'sometimes|string|max:100',
            'status' => 'sometimes|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
                Storage::disk('public')->delete($galeri->gambar);
            }

            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('images', $imageName, 'public');
            
            $galeri->gambar = $imagePath;
        }

        $galeri->update($request->only(['judul', 'deskripsi', 'kategori', 'status']));

        return response()->json([
            'success' => true,
            'message' => 'Galeri berhasil diupdate',
            'data' => $galeri
        ]);
    }

    /**
     * Delete gallery item
     */
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Delete image file
        if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return response()->json([
            'success' => true,
            'message' => 'Galeri berhasil dihapus'
        ]);
    }

    /**
     * Upload image
     */
    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('images', $imageName, 'public');
            
            return response()->json([
                'success' => true,
                'message' => 'Image berhasil diupload',
                'data' => [
                    'filename' => $imageName,
                    'path' => $imagePath,
                    'url' => asset('storage/' . $imagePath)
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Tidak ada file yang diupload'
        ], 400);
    }

    /**
     * Get gallery statistics
     */
    public function getStatistics()
    {
        $total = Galeri::count();
        $active = Galeri::where('status', 'active')->count();
        $inactive = Galeri::where('status', 'inactive')->count();
        $categories = Galeri::selectRaw('kategori, COUNT(*) as count')
                            ->groupBy('kategori')
                            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'total' => $total,
                'active' => $active,
                'inactive' => $inactive,
                'categories' => $categories
            ]
        ]);
    }

    /**
     * Toggle like (for authenticated users)
     */
    public function toggleLike($id)
    {
        // Implementation for like functionality
        return response()->json([
            'success' => true,
            'message' => 'Like functionality coming soon'
        ]);
    }

    /**
     * Add comment (for authenticated users)
     */
    public function addComment(Request $request, $id)
    {
        // Implementation for comment functionality
        return response()->json([
            'success' => true,
            'message' => 'Comment functionality coming soon'
        ]);
    }

    /**
     * Get comments (for authenticated users)
     */
    public function getComments($id)
    {
        // Implementation for getting comments
        return response()->json([
            'success' => true,
            'data' => [],
            'message' => 'Comment functionality coming soon'
        ]);
    }
}
