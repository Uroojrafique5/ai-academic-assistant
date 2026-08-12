<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'original_filename',
        'input_text',
        'summary_text',
        'language',
    ];

    // Relationship: ek summary ke multiple flashcards ho sakte hain
    public function flashcards()
    {
        return $this->hasMany(Flashcard::class);
    }
}