@extends('layouts.main')

@section('title', 'Results')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h3 class="fw-bold mb-3">Results</h3>

            <div class="alert alert-secondary">
                <strong>Plagiarism Score:</strong> {{ $plagiarismScore }}%
            </div>

            <h5 class="fw-bold mt-4">Grammar Issues ({{ count($grammarIssues) }})</h5>
            @forelse ($grammarIssues as $issue)
                <div class="alert alert-warning">
                    <strong>{{ $issue['message'] }}</strong><br>
                    <small>Suggestions: {{ implode(', ', $issue['suggestions']) }}</small>
                </div>
            @empty
                <p class="text-success">✅ No grammar issues found!</p>
            @endforelse

            <h5 class="fw-bold mt-4">Plagiarism Matches ({{ count($plagiarismMatches) }})</h5>
            @forelse ($plagiarismMatches as $match)
                <div class="alert alert-warning">
                    <strong>Sentence:</strong> {{ $match['sentence'] }}<br>
                    <small>Similarity: {{ $match['similarity'] }}%</small>
                </div>
            @empty
                <p class="text-success">✅ No plagiarism detected!</p>
            @endforelse

            <a href="/grammar-check" class="btn btn-outline-primary mt-3">← Check Another Text</a>
        </div>
    </div>
</div>
@endsection