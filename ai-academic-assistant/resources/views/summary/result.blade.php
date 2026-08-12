@extends('layouts.main')

@section('title', 'Summary Result')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h3 class="fw-bold mb-3">Summary</h3>

            <div class="alert alert-success">
                {{ $summary->summary_text }}
            </div>

            <h5 class="fw-bold mt-4">Flashcards ({{ count($flashcards) }})</h5>
            @forelse ($flashcards as $card)
                <div class="card mb-2 p-3 border-start border-4 border-success">
                    <strong class="text-success">Q:</strong> {{ $card->question }}<br>
                    <strong class="text-success">A:</strong> {{ $card->answer }}
                </div>
            @empty
                <p class="text-muted">No flashcards generated.</p>
            @endforelse

            <a href="/summarizer" class="btn btn-outline-success mt-3">← Summarize Another Text</a>
        </div>
    </div>
</div>
@endsection