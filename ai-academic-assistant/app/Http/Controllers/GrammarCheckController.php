<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\GrammarCheck;
use App\Models\CorpusDocument;

class GrammarCheckController extends Controller
{
    // Form dikhane ke liye
    public function index()
    {
        return view('grammar.index');
    }

    // Form submit hone pe ye chalega
    public function check(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:5000',
        ]);

        $text = $request->input('text');
        $language = $request->input('language', 'en-US');

        // ===== Step A: Flask se Grammar Check karwana =====
        $grammarResponse = Http::post('http://localhost:5000/check-grammar', [
            'text' => $text,
            'language' => $language,
        ]);
        $grammarData = $grammarResponse->json();

        // ===== Step B: Database se corpus documents fetch karna =====
        $corpusTexts = CorpusDocument::pluck('content')->toArray();

        // ===== Step C: Flask se Plagiarism Check karwana =====
        $plagiarismResponse = Http::post('http://localhost:5000/check-plagiarism', [
            'text' => $text,
            'corpus' => $corpusTexts,
        ]);
        $plagiarismData = $plagiarismResponse->json();

        // ===== Step D: Result ko database mein save karna =====
        $record = GrammarCheck::create([
            'user_id' => auth()->id(),  // agar login system nahi bana abhi, temporarily 1 use karein
            'input_text' => $text,
            'language' => $language === 'en-US' ? 'en' : 'ur',
            'grammar_issues' => $grammarData['issues'] ?? [],
            'plagiarism_score' => $plagiarismData['overall_score'] ?? 0,
            'plagiarism_matches' => $plagiarismData['matches'] ?? [],
        ]);

        // ===== Step E: Result ko view mein wapis bhejna =====
        return view('grammar.result', [
            'grammarIssues' => $grammarData['issues'] ?? [],
            'plagiarismScore' => $plagiarismData['overall_score'] ?? 0,
            'plagiarismMatches' => $plagiarismData['matches'] ?? [],
            'originalText' => $text,
        ]);
    }
}