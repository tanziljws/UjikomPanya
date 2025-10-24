<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'type',
        'status',
        'image'
    ];

    protected $casts = [
        'content' => 'array',
        'status' => 'boolean'
    ];
} 