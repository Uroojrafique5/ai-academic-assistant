<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Summary;
use App\Models\Flashcard;

class SummaryController extends Controller
{
    // Form dikhane ke liye
    public function index()
    {
        return view('summary.index');
    }

    // Form submit hone pe ye chalega
    public function summarize(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:10000',
        ]);

        $text = $request->input('text');
        $language = $request->input('language', 'en');

        // ===== Step A: Flask se Summary generate karwana =====
        $response = Http::timeout(60)->post('http://localhost:5000/summarize', [
            'text' => $text,
        ]);
        $data = $response->json();

        if (!$response->successful() || !isset($data['summary'])) {
            return back()->with('error', 'Summarization failed. Please try again.');
        }

        // ===== Step B: Summary ko database mein save karna =====
        $summary = Summary::create([
            'user_id' => auth()->id() ?? 1,
            'input_text' => $text,
            'summary_text' => $data['summary'],
            'language' => $language,
        ]);

        // ===== Step C: Flashcards ko database mein save karna =====
        foreach ($data['flashcards'] as $card) {
            Flashcard::create([
                'summary_id' => $summary->id,
                'question' => $card['question'],
                'answer' => $card['answer'],
            ]);
        }

        // ===== Step D: Result view mein bhejna =====
        return view('summary.result', [
            'summary' => $summary,
            'flashcards' => $summary->flashcards,
        ]);
    }
}