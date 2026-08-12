<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'topic',
        'num_slides',
        'theme',
        'file_path',
        'slide_content',
    ];

    protected $casts = [
        'slide_content' => 'array',
    ];
}