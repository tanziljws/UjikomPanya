<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\User;
use App\Models\Content;
use App\Models\Agenda;
use App\Models\Informasi;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Get statistics for dashboard
        $stats = [
            'total_gallery' => Galeri::count(),
            'total_users' => User::count(),
            'total_content' => Content::count(),
            'total_agenda' => Agenda::count(),
            'total_informasi' => Informasi::count(),
            'active_users' => User::where('status', 'active')->count(),
            'active_content' => Content::where('status', true)->count(),
            'active_agenda' => Agenda::where('status', true)->count()
        ];

        // Get recent activities
        $recent_activities = collect();
        
        // Recent gallery uploads
        $recent_gallery = Galeri::latest()->take(5)->get()->map(function($item) {
            return [
                'type' => 'gallery',
                'title' => $item->judul,
                'date' => $item->created_at,
                'icon' => 'bi-images'
            ];
        });
        
        // Recent content
        $recent_content = Content::latest()->take(5)->get()->map(function($item) {
            return [
                'type' => 'content',
                'title' => $item->title,
                'date' => $item->created_at,
                'icon' => 'bi-file-text'
            ];
        });
        
        // Recent agenda
        $recent_agenda = Agenda::latest()->take(5)->get()->map(function($item) {
            return [
                'type' => 'agenda',
                'title' => $item->title,
                'date' => $item->created_at,
                'icon' => 'bi-calendar-event'
            ];
        });

        $recent_activities = $recent_gallery->concat($recent_content)->concat($recent_agenda)
            ->sortByDesc('date')
            ->take(10);

        return view('admin.reports.index', compact('stats', 'recent_activities'));
    }

    public function generateReport(Request $request)
    {
        $request->validate([
            'report_type' => 'required|in:gallery,users,content,agenda,informasi',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date'
        ]);

        $reportType = $request->report_type;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        switch ($reportType) {
            case 'gallery':
                $data = Galeri::whereBetween('created_at', [$startDate, $endDate])->get();
                break;
            case 'users':
                $data = User::whereBetween('created_at', [$startDate, $endDate])->get();
                break;
            case 'content':
                $data = Content::whereBetween('created_at', [$startDate, $endDate])->get();
                break;
            case 'agenda':
                $data = Agenda::whereBetween('created_at', [$startDate, $endDate])->get();
                break;
            case 'informasi':
                $data = Informasi::whereBetween('created_at', [$startDate, $endDate])->get();
                break;
        }

        return view('admin.reports.show', compact('data', 'reportType', 'startDate', 'endDate'));
    }
} 