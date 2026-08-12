<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrammarCheck extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'input_text',
        'language',
        'grammar_issues',
        'plagiarism_score',
        'plagiarism_matches',
    ];

    protected $casts = [
        'grammar_issues' => 'array',
        'plagiarism_matches' => 'array',
    ];
}