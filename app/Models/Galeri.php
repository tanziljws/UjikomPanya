<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    // IZINKAN FIELD judul, deskripsi, gambar dan category_id untuk mass assignment
    protected $fillable = ['judul', 'deskripsi', 'gambar', 'category_id'];

    /**
     * Get the likes for the gallery item.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Get the comments for the gallery item.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    /**
     * Check if a user has liked the gallery item.
     */
    public function isLikedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    /**
     * Get the user who created the gallery item.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the gallery item.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
