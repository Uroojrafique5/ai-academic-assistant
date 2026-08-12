<?php

namespace App\Http\Controllers;

use App\Models\GrammarCheck;
use App\Models\Summary;
use App\Models\Presentation;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id() ?? 1;

        // Recent activity counts dikhane ke liye (optional stats)
        $stats = [
            'grammar_checks' => GrammarCheck::where('user_id', $userId)->count(),
            'summaries' => Summary::where('user_id', $userId)->count(),
            'presentations' => Presentation::where('user_id', $userId)->count(),
        ];

        return view('dashboard', ['stats' => $stats]);
    }
}