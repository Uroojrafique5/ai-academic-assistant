@extends('layouts.main')

@section('title', 'Summarizer')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h3 class="fw-bold mb-3">📝 Study Notes Summarizer</h3>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="/summarizer" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Your Notes</label>
                    <textarea name="text" class="form-control" rows="10" placeholder="Paste your lecture notes or paragraph here..." required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Language</label>
                    <select name="language" class="form-select">
                        <option value="en">English</option>
                        <option value="ur">Urdu</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success px-4">Summarize</button>
            </form>
        </div>
    </div>
</div>
@endsection