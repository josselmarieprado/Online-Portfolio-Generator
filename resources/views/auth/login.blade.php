<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | B.O.R.N.FOLIO</title>

    <style>
        :root {
            --lavender-light: #EEEAFD;
            --lavender-soft: #D8CAF6;
            --lavender-medium: #C2A9EF;
            --lavender-purple: #AC8BE8;
            --lavender-deep: #9667D8;
            --text-dark: #30234F;
            --text-muted: #766B8D;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: linear-gradient(
                135deg,
                var(--lavender-light),
                #F9F7FF,
                var(--lavender-soft)
            );
            color: var(--text-dark);
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 36px;
            background: var(--white);
            border: 1px solid rgba(194, 169, 239, 0.5);
            border-radius: 22px;
            box-shadow: 0 18px 50px rgba(150, 103, 216, 0.16);
        }

        .brand {
            margin-bottom: 10px;
            color: var(--lavender-deep);
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        h1 {
            margin: 0 0 10px;
            color: var(--text-dark);
            font-size: 30px;
            font-weight: 700;
        }

        .subtitle {
            margin: 0 0 28px;
            color: var(--text-muted);
            line-height: 1.6;
            font-size: 14px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-dark);
            font-size: 14px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            margin-bottom: 20px;
            border: 1px solid var(--lavender-soft);
            border-radius: 10px;
            background: #FCFAFF;
            color: var(--text-dark);
            font-size: 15px;
            transition: border-color 0.2s ease,
                        box-shadow 0.2s ease,
                        background 0.2s ease;
        }

        input::placeholder {
            color: #A59AB8;
        }

        input:focus {
            outline: none;
            border-color: var(--lavender-purple);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(194, 169, 239, 0.25);
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(
                135deg,
                var(--lavender-purple),
                var(--lavender-deep)
            );
            color: var(--white);
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 7px 18px rgba(150, 103, 216, 0.25);
            transition: transform 0.2s ease,
                        box-shadow 0.2s ease,
                        filter 0.2s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(150, 103, 216, 0.35);
            filter: brightness(1.04);
        }

        button:active {
            transform: translateY(0);
        }

        .message {
            margin-bottom: 18px;
            padding: 12px 14px;
            border-radius: 9px;
            font-size: 14px;
            line-height: 1.5;
        }

        .message ul {
            margin: 0;
            padding-left: 20px;
        }

        .error {
            background: #FFF0F0;
            border: 1px solid #F4CACA;
            color: #9B3030;
        }

        .success {
            background: #F0F9F0;
            border: 1px solid #C9E8C9;
            color: #286A38;
        }

        .footer {
            margin-top: 24px;
            color: var(--text-muted);
            font-size: 13px;
            line-height: 1.7;
            text-align: center;
        }

        .footer + .footer {
            margin-top: 12px;
        }

        a {
            color: var(--lavender-deep);
            font-weight: bold;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        a:hover {
            color: #8050C3;
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            body {
                padding: 16px;
            }

            .login-card {
                padding: 28px 22px;
                border-radius: 18px;
            }

            h1 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>
    <main class="login-card">

        <div class="brand">B.O.R.N.FOLIO</div>

        <h1>Welcome back</h1>

        <p class="subtitle">
            Sign in to manage and create your portfolio.
        </p>

        @if (session('status'))
            <div class="message success" role="status">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="message error" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <label for="email">Email address</label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                autocomplete="username"
                placeholder="Enter your email"
                required
                autofocus
            >

            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                autocomplete="current-password"
                placeholder="Enter your password"
                required
            >

            <button type="submit">Sign In</button>
        </form>

        <div class="footer">
            Don't have an account?
            <a href="{{ route('register') }}">Create an account</a>
        </div>

        <div class="footer">
            <a href="{{ route('password.request') }}">Forgot password?</a>
        </div>

    </main>
</body>
</html>
