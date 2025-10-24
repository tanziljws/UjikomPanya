<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InformasiController extends Controller
{
    /**
     * Public information index
     */
    public function publicIndex(Request $request)
    {
        $perPage = min(max((int) $request->query('per_page', 10), 1), 100);
        $search = $request->query('search');
        $category = $request->query('category');

        $query = Informasi::where('status', 'active');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($category) {
            $query->where('category', $category);
        }

        $informasi = $query->orderBy('created_at', 'desc')
                           ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $informasi->items(),
            'pagination' => [
                'current_page' => $informasi->currentPage(),
                'last_page' => $informasi->lastPage(),
                'per_page' => $informasi->perPage(),
                'total' => $informasi->total(),
                'from' => $informasi->firstItem(),
                'to' => $informasi->lastItem()
            ]
        ]);
    }

    /**
     * Public information show
     */
    public function publicShow($id)
    {
        $informasi = Informasi::where('status', 'active')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $informasi
        ]);
    }

    /**
     * Admin information index
     */
    public function adminIndex(Request $request)
    {
        $perPage = min(max((int) $request->query('per_page', 15), 1), 100);
        $search = $request->query('search');
        $status = $request->query('status');
        $category = $request->query('category');

        $query = Informasi::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($status) {
            $query->where('status', $status);
        }

        if ($category) {
            $query->where('category', $category);
        }

        $informasi = $query->orderBy('created_at', 'desc')
                           ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $informasi->items(),
            'pagination' => [
                'current_page' => $informasi->currentPage(),
                'last_page' => $informasi->lastPage(),
                'per_page' => $informasi->perPage(),
                'total' => $informasi->total(),
                'from' => $informasi->firstItem(),
                'to' => $informasi->lastItem()
            ]
        ]);
    }

    /**
     * Admin information show
     */
    public function adminShow($id)
    {
        $informasi = Informasi::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $informasi
        ]);
    }

    /**
     * Store new information
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'status' => 'nullable|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $informasi = Informasi::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category ?? 'pengumuman',
            'status' => $request->status ?? 'active'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Informasi berhasil ditambahkan',
            'data' => $informasi
        ], 201);
    }

    /**
     * Update information
     */
    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'category' => 'sometimes|string|max:100',
            'status' => 'sometimes|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $informasi->update($request->only(['title', 'content', 'category', 'status']));

        return response()->json([
            'success' => true,
            'message' => 'Informasi berhasil diupdate',
            'data' => $informasi
        ]);
    }

    /**
     * Delete information
     */
    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Informasi berhasil dihapus'
        ]);
    }

    /**
     * Toggle information status
     */
    public function toggleStatus($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->status = $informasi->status === 'active' ? 'inactive' : 'active';
        $informasi->save();

        return response()->json([
            'success' => true,
            'message' => 'Status informasi berhasil diubah',
            'data' => [
                'id' => $informasi->id,
                'status' => $informasi->status
            ]
        ]);
    }

    /**
     * Get information statistics
     */
    public function getStatistics()
    {
        $total = Informasi::count();
        $active = Informasi::where('status', 'active')->count();
        $inactive = Informasi::where('status', 'inactive')->count();
        $categories = Informasi::selectRaw('category, COUNT(*) as count')
                               ->groupBy('category')
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
     * Get information by category
     */
    public function getByCategory($category)
    {
        $informasi = Informasi::where('category', $category)
                             ->where('status', 'active')
                             ->orderBy('created_at', 'desc')
                             ->get();

        return response()->json([
            'success' => true,
            'data' => $informasi
        ]);
    }

    /**
     * Search information
     */
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'query' => 'required|string|min:2'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $query = $request->query;
        $informasi = Informasi::where('status', 'active')
                             ->where(function($q) use ($query) {
                                 $q->where('title', 'like', "%{$query}%")
                                   ->orWhere('content', 'like', "%{$query}%");
                             })
                             ->orderBy('created_at', 'desc')
                             ->get();

        return response()->json([
            'success' => true,
            'data' => $informasi,
            'search_query' => $query
        ]);
    }
}
