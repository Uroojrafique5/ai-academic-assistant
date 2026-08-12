@extends('layouts.main')

@section('title', 'Grammar Checker')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h3 class="fw-bold mb-3">✍️ Grammar & Plagiarism Checker</h3>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="/grammar-check" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Your Text</label>
                    <textarea name="text" class="form-control" rows="8" placeholder="Write your note here." required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Language</label>
                    <select name="language" class="form-select">
                        <option value="en-US">English</option>
                        <option value="ur">Urdu (basic support)</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary px-4">Check Now</button>
            </form>
        </div>
    </div>
</div>
@endsection