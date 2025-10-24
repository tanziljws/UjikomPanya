<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_type',
        'activity_name',
        'user_type',
        'user_id',
        'status',
        'description',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the activity log.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope untuk filter aktivitas admin
     */
    public function scopeAdminActivities($query)
    {
        return $query->where('user_type', 'Admin');
    }

    /**
     * Scope untuk filter aktivitas user
     */
    public function scopeUserActivities($query)
    {
        return $query->where('user_type', 'User');
    }

    /**
     * Scope untuk aktivitas 7 hari terakhir
     */
    public function scopeLastWeek($query)
    {
        return $query->where('created_at', '>=', now()->subDays(7));
    }

    /**
     * Scope untuk aktivitas hari ini
     */
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    /**
     * Log aktivitas admin
     */
    public static function logAdminActivity($activityType, $activityName, $userId = null, $description = null)
    {
        return self::create([
            'activity_type' => $activityType,
            'activity_name' => $activityName,
            'user_type' => 'Admin',
            'user_id' => $userId ?? auth()->id(),
            'status' => 'Berhasil',
            'description' => $description,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    /**
     * Log aktivitas user
     */
    public static function logUserActivity($activityType, $activityName, $userId = null, $description = null)
    {
        return self::create([
            'activity_type' => $activityType,
            'activity_name' => $activityName,
            'user_type' => 'User',
            'user_id' => $userId ?? auth()->id(),
            'status' => 'Berhasil',
            'description' => $description,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    /**
     * Log aktivitas system
     */
    public static function logSystemActivity($activityType, $activityName, $description = null)
    {
        return self::create([
            'activity_type' => $activityType,
            'activity_name' => $activityName,
            'user_type' => 'System',
            'status' => 'Berhasil',
            'description' => $description,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
