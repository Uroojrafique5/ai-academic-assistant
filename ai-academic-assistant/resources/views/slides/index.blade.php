@extends('layouts.main')

@section('title', 'Slide Generator')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h3 class="fw-bold mb-3">🎨 AI Slide Generator</h3>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="/slides" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Topic</label>
                    <input type="text" name="topic" class="form-control" placeholder="e.g. Introduction to Machine Learning" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Number of Slides</label>
                        <select name="num_slides" class="form-select">
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5" selected>5</option>
                            <option value="6">6</option>
                            <option value="8">8</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Theme</label>
                        <select name="theme" class="form-select">
                            <option value="default">Default (Light)</option>
                            <option value="dark">Dark</option>
                            <option value="ocean">Ocean Blue</option>
                            <option value="forest">Forest Green</option>
                            <option value="sunset">Sunset Orange</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-danger px-4">Generate Presentation</button>
                <p class="text-muted small mt-2">Note: Generation takes 10-20 seconds, please wait after clicking.</p>
            </form>
        </div>
    </div>
</div>
@endsection