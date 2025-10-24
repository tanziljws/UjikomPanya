<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'location',
        'type',
        'status',
        'image'
    ];

    protected $casts = [
        'date' => 'date',
        'status' => 'boolean'
    ];
} 