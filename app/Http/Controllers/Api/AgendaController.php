<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgendaController extends Controller
{
    /**
     * Public agenda index
     */
    public function publicIndex(Request $request)
    {
        $perPage = min(max((int) $request->query('per_page', 10), 1), 100);
        $search = $request->query('search');
        $date = $request->query('date');
        $status = $request->query('status', 'active');

        $query = Agenda::where('status', $status);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($date) {
            $query->whereDate('date', $date);
        }

        $agenda = $query->orderBy('date', 'asc')
                        ->orderBy('time', 'asc')
                        ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $agenda->items(),
            'pagination' => [
                'current_page' => $agenda->currentPage(),
                'last_page' => $agenda->lastPage(),
                'per_page' => $agenda->perPage(),
                'total' => $agenda->total(),
                'from' => $agenda->firstItem(),
                'to' => $agenda->lastItem()
            ]
        ]);
    }

    /**
     * Public agenda show
     */
    public function publicShow($id)
    {
        $agenda = Agenda::where('status', 'active')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $agenda
        ]);
    }

    /**
     * Admin agenda index
     */
    public function adminIndex(Request $request)
    {
        $perPage = min(max((int) $request->query('per_page', 15), 1), 100);
        $search = $request->query('search');
        $status = $request->query('status');
        $date = $request->query('date');

        $query = Agenda::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($status) {
            $query->where('status', $status);
        }

        if ($date) {
            $query->whereDate('date', $date);
        }

        $agenda = $query->orderBy('date', 'desc')
                        ->orderBy('time', 'desc')
                        ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $agenda->items(),
            'pagination' => [
                'current_page' => $agenda->currentPage(),
                'last_page' => $agenda->lastPage(),
                'per_page' => $agenda->perPage(),
                'total' => $agenda->total(),
                'from' => $agenda->firstItem(),
                'to' => $agenda->lastItem()
            ]
        ]);
    }

    /**
     * Admin agenda show
     */
    public function adminShow($id)
    {
        $agenda = Agenda::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $agenda
        ]);
    }

    /**
     * Store new agenda
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'location' => 'required|string|max:255',
            'status' => 'nullable|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $agenda = Agenda::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'status' => $request->status ?? 'active'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Agenda berhasil ditambahkan',
            'data' => $agenda
        ], 201);
    }

    /**
     * Update agenda
     */
    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'date' => 'sometimes|date',
            'time' => 'sometimes|string',
            'location' => 'sometimes|string|max:255',
            'status' => 'sometimes|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $agenda->update($request->only(['title', 'description', 'date', 'time', 'location', 'status']));

        return response()->json([
            'success' => true,
            'message' => 'Agenda berhasil diupdate',
            'data' => $agenda
        ]);
    }

    /**
     * Delete agenda
     */
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return response()->json([
            'success' => true,
            'message' => 'Agenda berhasil dihapus'
        ]);
    }

    /**
     * Toggle agenda status
     */
    public function toggleStatus($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->status = $agenda->status === 'active' ? 'inactive' : 'active';
        $agenda->save();

        return response()->json([
            'success' => true,
            'message' => 'Status agenda berhasil diubah',
            'data' => [
                'id' => $agenda->id,
                'status' => $agenda->status
            ]
        ]);
    }

    /**
     * Get agenda statistics
     */
    public function getStatistics()
    {
        $total = Agenda::count();
        $active = Agenda::where('status', 'active')->count();
        $inactive = Agenda::where('status', 'inactive')->count();
        $today = Agenda::whereDate('date', today())->where('status', 'active')->count();
        $upcoming = Agenda::where('date', '>', today())->where('status', 'active')->count();

        return response()->json([
            'success' => true,
            'data' => [
                'total' => $total,
                'active' => $active,
                'inactive' => $inactive,
                'today' => $today,
                'upcoming' => $upcoming
            ]
        ]);
    }

    /**
     * Get today's agenda
     */
    public function getToday()
    {
        $agenda = Agenda::whereDate('date', today())
                        ->where('status', 'active')
                        ->orderBy('time', 'asc')
                        ->get();

        return response()->json([
            'success' => true,
            'data' => $agenda
        ]);
    }

    /**
     * Get upcoming agenda
     */
    public function getUpcoming(Request $request)
    {
        $limit = min(max((int) $request->query('limit', 10), 1), 50);
        
        $agenda = Agenda::where('date', '>', today())
                        ->where('status', 'active')
                        ->orderBy('date', 'asc')
                        ->orderBy('time', 'asc')
                        ->limit($limit)
                        ->get();

        return response()->json([
            'success' => true,
            'data' => $agenda
        ]);
    }

    /**
     * Get agenda by date range
     */
    public function getByDateRange(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $agenda = Agenda::whereBetween('date', [$request->start_date, $request->end_date])
                        ->where('status', 'active')
                        ->orderBy('date', 'asc')
                        ->orderBy('time', 'asc')
                        ->get();

        return response()->json([
            'success' => true,
            'data' => $agenda,
            'date_range' => [
                'start_date' => $request->start_date,
                'end_date' => $request->end_date
            ]
        ]);
    }

    /**
     * Search agenda
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
        $agenda = Agenda::where('status', 'active')
                        ->where(function($q) use ($query) {
                            $q->where('title', 'like', "%{$query}%")
                              ->orWhere('description', 'like', "%{$query}%")
                              ->orWhere('location', 'like', "%{$query}%");
                        })
                        ->orderBy('date', 'asc')
                        ->orderBy('time', 'asc')
                        ->get();

        return response()->json([
            'success' => true,
            'data' => $agenda,
            'search_query' => $query
        ]);
    }
}
