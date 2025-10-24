<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'category',
        'author',
        'status',
        'image',
        'published_at'
    ];

    protected $casts = [
        'content' => 'array',
        'status' => 'boolean',
        'published_at' => 'datetime'
    ];
} 