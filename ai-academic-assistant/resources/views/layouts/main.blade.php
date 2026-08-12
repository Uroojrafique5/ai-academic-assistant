<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AI Academic Assistant')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f8f9fc; }
        .navbar-brand { font-weight: 700; }
        .card { border: none; border-radius: 14px; box-shadow: 0 2px 10px rgba(0,0,0,0.06); }
        .btn { border-radius: 8px; }
        footer { color: #9ca3af; font-size: 13px; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">🎓 AI Academic Assistant</a>
            <div class="d-flex gap-3 align-items-center">
                @auth
                    <a href="/grammar-check" class="nav-link">Grammar</a>
                    <a href="/summarizer" class="nav-link">Summarizer</a>
                    <a href="/slides" class="nav-link">Slides</a>

                    <span class="text-muted small">Hi, {{ auth()->user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-sm btn-primary">Sign Up</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        @yield('content')
    </div>

    <footer class="text-center py-4">
        AI Academic Assistant &mdash; Built with Laravel + Flask
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>