<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\User;
use App\Models\Content;
use App\Models\Agenda;
use App\Models\Informasi;
use App\Models\ActivityLog;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        // Get statistics for dashboard
        $stats = [
            'total_gallery' => Galeri::count(),
            'total_users' => User::count(),
            'total_agenda' => Agenda::count(),
            'total_informasi' => Informasi::count(),
        ];

        // Get recent activities from activity_logs (last 7 days)
        $recent_activities = ActivityLog::with('user')
            ->lastWeek()
            ->latest()
            ->take(20)
            ->get()
            ->map(function($log) {
                return [
                    'waktu' => $log->created_at->diffForHumans(),
                    'aktivitas' => $log->activity_name,
                    'user' => $log->user_type,
                    'status' => $log->status,
                    'created_at' => $log->created_at
                ];
            });

        // Statistics for last 7 days
        $weeklyStats = [
            'admin_posts' => ActivityLog::where('user_type', 'Admin')
                ->whereIn('activity_type', ['admin_post_galeri', 'admin_post_agenda', 'admin_post_informasi'])
                ->lastWeek()
                ->count(),
            'user_registers' => ActivityLog::where('activity_type', 'user_register')
                ->lastWeek()
                ->count(),
            'user_logins' => ActivityLog::where('activity_type', 'user_login')
                ->lastWeek()
                ->count(),
            'user_likes' => ActivityLog::where('activity_type', 'user_like')
                ->lastWeek()
                ->count(),
            'user_comments' => ActivityLog::where('activity_type', 'user_comment')
                ->lastWeek()
                ->count(),
        ];

        return view('admin.reports.index', compact('stats', 'recent_activities', 'weeklyStats'));
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

    public function downloadCompletePDF()
    {
        // Get all statistics
        $stats = [
            'total_gallery' => Galeri::count(),
            'total_users' => User::count(),
            'total_agenda' => Agenda::count(),
            'total_informasi' => Informasi::count(),
        ];

        // Get weekly statistics
        $weeklyStats = [
            'admin_posts' => ActivityLog::where('user_type', 'Admin')
                ->whereIn('activity_type', ['admin_post_galeri', 'admin_post_agenda', 'admin_post_informasi'])
                ->lastWeek()
                ->count(),
            'user_registers' => ActivityLog::where('activity_type', 'user_register')
                ->lastWeek()
                ->count(),
            'user_logins' => ActivityLog::where('activity_type', 'user_login')
                ->lastWeek()
                ->count(),
            'user_likes' => ActivityLog::where('activity_type', 'user_like')
                ->lastWeek()
                ->count(),
            'user_comments' => ActivityLog::where('activity_type', 'user_comment')
                ->lastWeek()
                ->count(),
        ];

        // Get recent activities
        $recent_activities = ActivityLog::with('user')
            ->lastWeek()
            ->latest()
            ->take(50)
            ->get();

        // Get detailed data
        $users = User::latest()->take(20)->get();
        $galeris = Galeri::with('category')->latest()->take(20)->get();
        $agendas = Agenda::latest()->take(20)->get();
        $informasis = Informasi::latest()->take(20)->get();

        return view('admin.reports.pdf', compact(
            'stats',
            'weeklyStats',
            'recent_activities',
            'users',
            'galeris',
            'agendas',
            'informasis'
        ));
    }
} 