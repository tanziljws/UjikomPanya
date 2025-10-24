<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    /**
     * Public content index
     */
    public function publicIndex(Request $request)
    {
        $perPage = min(max((int) $request->query('per_page', 10), 1), 100);
        $search = $request->query('search');
        $type = $request->query('type');

        $query = Content::where('status', 'active');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($type) {
            $query->where('type', $type);
        }

        $content = $query->orderBy('created_at', 'desc')
                         ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $content->items(),
            'pagination' => [
                'current_page' => $content->currentPage(),
                'last_page' => $content->lastPage(),
                'per_page' => $content->perPage(),
                'total' => $content->total(),
                'from' => $content->firstItem(),
                'to' => $content->lastItem()
            ]
        ]);
    }

    /**
     * Public content show
     */
    public function publicShow($id)
    {
        $content = Content::where('status', 'active')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $content
        ]);
    }

    /**
     * Admin content index
     */
    public function adminIndex(Request $request)
    {
        $perPage = min(max((int) $request->query('per_page', 15), 1), 100);
        $search = $request->query('search');
        $status = $request->query('status');
        $type = $request->query('type');

        $query = Content::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($status) {
            $query->where('status', $status);
        }

        if ($type) {
            $query->where('type', $type);
        }

        $content = $query->orderBy('created_at', 'desc')
                         ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $content->items(),
            'pagination' => [
                'current_page' => $content->currentPage(),
                'last_page' => $content->lastPage(),
                'per_page' => $content->perPage(),
                'total' => $content->total(),
                'from' => $content->firstItem(),
                'to' => $content->lastItem()
            ]
        ]);
    }

    /**
     * Admin content show
     */
    public function adminShow($id)
    {
        $content = Content::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $content
        ]);
    }

    /**
     * Store new content
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'nullable|string|max:100',
            'status' => 'nullable|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $content = Content::create([
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type ?? 'article',
            'status' => $request->status ?? 'active'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Content berhasil ditambahkan',
            'data' => $content
        ], 201);
    }

    /**
     * Update content
     */
    public function update(Request $request, $id)
    {
        $content = Content::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'type' => 'sometimes|string|max:100',
            'status' => 'sometimes|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $content->update($request->only(['title', 'content', 'type', 'status']));

        return response()->json([
            'success' => true,
            'message' => 'Content berhasil diupdate',
            'data' => $content
        ]);
    }

    /**
     * Delete content
     */
    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        return response()->json([
            'success' => true,
            'message' => 'Content berhasil dihapus'
        ]);
    }

    /**
     * Toggle content status
     */
    public function toggleStatus($id)
    {
        $content = Content::findOrFail($id);
        $content->status = $content->status === 'active' ? 'inactive' : 'active';
        $content->save();

        return response()->json([
            'success' => true,
            'message' => 'Status content berhasil diubah',
            'data' => [
                'id' => $content->id,
                'status' => $content->status
            ]
        ]);
    }

    /**
     * Get content statistics
     */
    public function getStatistics()
    {
        $total = Content::count();
        $active = Content::where('status', 'active')->count();
        $inactive = Content::where('status', 'inactive')->count();
        $types = Content::selectRaw('type, COUNT(*) as count')
                        ->groupBy('type')
                        ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'total' => $total,
                'active' => $active,
                'inactive' => $inactive,
                'types' => $types
            ]
        ]);
    }

    /**
     * Get content by type
     */
    public function getByType($type)
    {
        $content = Content::where('type', $type)
                         ->where('status', 'active')
                         ->orderBy('created_at', 'desc')
                         ->get();

        return response()->json([
            'success' => true,
            'data' => $content
        ]);
    }

    /**
     * Search content
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
        $content = Content::where('status', 'active')
                         ->where(function($q) use ($query) {
                             $q->where('title', 'like', "%{$query}%")
                               ->orWhere('content', 'like', "%{$query}%");
                         })
                         ->orderBy('created_at', 'desc')
                         ->get();

        return response()->json([
            'success' => true,
            'data' => $content,
            'search_query' => $query
        ]);
    }
}
