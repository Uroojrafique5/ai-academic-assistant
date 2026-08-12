@extends('layouts.main')

@section('title', 'Presentation Ready')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h3 class="fw-bold">{{ $presentation->topic }}</h3>
            <p class="text-muted">Your presentation is ready with {{ $presentation->num_slides }} slides.</p>

            <a href="/slides/download/{{ $presentation->id }}" class="btn btn-danger px-4 mb-4">⬇ Download PPTX</a>

            <h5 class="fw-bold">Preview</h5>
            @foreach ($presentation->slide_content['slides'] as $slide)
                <div class="card mb-2 p-3 border-start border-4 border-danger">
                    <h6 class="fw-bold text-danger">{{ $slide['heading'] }}</h6>
                    <ul class="mb-0">
                        @foreach ($slide['bullets'] as $bullet)
                            <li>{{ $bullet }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            <a href="/slides" class="btn btn-outline-danger mt-3">← Generate Another Presentation</a>
        </div>
    </div>
</div>
@endsection