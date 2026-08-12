@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold">AI Academic Assistant</h1>
    <p class="text-muted">Grammar checking, summarization, aur presentation generation — sab ek jagah</p>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <a href="/grammar-check" class="text-decoration-none text-dark">
            <div class="card h-100 p-4 border-top border-4 border-primary">
                <div class="fs-1 mb-2">✍️</div>
                <h5 class="fw-bold">Grammar & Plagiarism Checker</h5>
                <p class="text-muted small">Check your grammar mistakes or plagiarism, both in English or Urdu.</p>
                <span class="badge bg-primary-subtle text-primary">{{ $stats['grammar_checks'] }} checks done</span>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="/summarizer" class="text-decoration-none text-dark">
            <div class="card h-100 p-4 border-top border-4 border-success">
                <div class="fs-1 mb-2">📝</div>
                <h5 class="fw-bold">Study Notes Summarizer</h5>
                <p class="text-muted small">summarize your long notes and automatically generate flashcards for revision.</p>
                <span class="badge bg-success-subtle text-success">{{ $stats['summaries'] }} summaries created</span>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="/slides" class="text-decoration-none text-dark">
            <div class="card h-100 p-4 border-top border-4 border-danger">
                <div class="fs-1 mb-2">🎨</div>
                <h5 class="fw-bold">AI Slide Generator</h5>
                <p class="text-muted small">Write any topic name, AI relevant content and images will be generated for presentation.</p>
                <span class="badge bg-danger-subtle text-danger">{{ $stats['presentations'] }} presentations made</span>
            </div>
        </a>
    </div>
</div>
@endsection