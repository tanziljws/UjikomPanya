<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'guest_token', 'galeri_id'];

    /**
     * Get the user that owns the like.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the gallery item that was liked.
     */
    public function galeri()
    {
        return $this->belongsTo(Galeri::class);
    }
}
