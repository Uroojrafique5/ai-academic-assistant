@extends('layouts.main')

@section('title', 'Sign Up')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-4 mt-5">
            <h3 class="fw-bold text-center mb-4">🎓 Create Account</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Sign Up</button>

                <p class="text-center mt-3 mb-0">
                    Already have an account? <a href="{{ route('login') }}">Login</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection