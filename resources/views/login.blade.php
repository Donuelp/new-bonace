<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Bon-Ace</title>
    <style>
        :root {
            color-scheme: light;
            --bg: #ffffff;
            --panel: #ffffff;
            --text: #181512;
            --muted: rgba(24, 21, 18, 0.62);
            --gold: #c9a227;
            --gold-soft: rgba(201, 162, 39, 0.14);
            --border: rgba(24, 21, 18, 0.08);
            --shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
            --radius-lg: 28px;
            --radius-md: 20px;
            --radius-sm: 14px;
            --container: calc(100vw - 3rem);
        }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { margin: 0; font-family: Arial, Helvetica, sans-serif; background: var(--bg); color: var(--text); }
        a { color: inherit; text-decoration: none; }
        img { display: block; max-width: 100%; }

        .login-wrapper {
            width: var(--container);
            margin: 0 auto;
            padding: 5rem 0 0;
            display: flex;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            background: var(--panel);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            border-radius: var(--radius-lg);
            padding: 3rem 2.5rem;
        }
        .login-card h1 {
            margin: 0 0 0.5rem;
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            text-transform: uppercase;
            letter-spacing: 0.04em;
            text-align: center;
        }
        .login-card p {
            margin: 0 0 2.5rem;
            color: var(--muted);
            font-size: 0.95rem;
            text-align: center;
        }
        .form-group { margin-bottom: 1.5rem; }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text);
        }
        .form-group input {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            font-size: 1rem;
            font-family: inherit;
            background: var(--bg);
            color: var(--text);
            transition: border-color 200ms ease, box-shadow 200ms ease;
            outline: none;
        }
        .form-group input:focus { border-color: var(--gold); box-shadow: 0 0 0 3px var(--gold-soft); }
        .form-group .error { color: #c0392b; font-size: 0.82rem; margin-top: 0.25rem; }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 50px;
            padding: 0.9rem 1.35rem;
            border: 1px solid var(--gold);
            background: var(--gold);
            color: #16120d;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            border-radius: var(--radius-sm);
            font-size: 0.95rem;
            cursor: pointer;
            transition: background 200ms ease, color 200ms ease;
        }
        .btn:hover { background: transparent; color: var(--gold); }
        .login-card .form-footer { margin-top: 1.5rem; text-align: center; }
        .login-card .form-footer a { font-size: 0.88rem; color: var(--gold); text-decoration: underline; }
        .login-card .form-footer a:hover { color: var(--text); }

        @media (max-width: 720px) {
            .login-wrapper { padding-top: 1rem; }
            .login-card { padding: 2rem 1.5rem; }
        }
    </style>
</head>
<body>
    <main>
        <div class="login-wrapper">
            <div class="login-card">
                <h1>Welcome Back</h1>
                <p>Sign in to your Bon-Ace account</p>
                @if ($errors->any())
                    <div style="margin-bottom: 1rem;">
                        @foreach ($errors->all() as $error)
                            <p class="error">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn">Sign In</button>
                </form>
                <div class="form-footer">
                    <a href="#">Forgot your password?</a>
                </div>
            </div>
        </div>
    </main>
    </main>
</body>
</html>