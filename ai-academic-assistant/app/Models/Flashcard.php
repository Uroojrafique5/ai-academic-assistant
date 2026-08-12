<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
    use HasFactory;

    protected $fillable = [
        'summary_id',
        'question',
        'answer',
    ];

    // Relationship: har flashcard ek summary se belong karta hai
    public function summary()
    {
        return $this->belongsTo(Summary::class);
    }
}