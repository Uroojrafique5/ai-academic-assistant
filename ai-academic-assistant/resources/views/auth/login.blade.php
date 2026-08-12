@extends('layouts.main')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card p-4 mt-5">
            <h3 class="fw-bold text-center mb-4">🎓 Login</h3>

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>

                <p class="text-center mt-3 mb-0">
                    Account nahi hai? <a href="{{ route('register') }}">Sign Up</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection