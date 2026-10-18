<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account | B.O.R.N.FOLIO</title>

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

        .register-card {
            width: 100%;
            max-width: 440px;
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
            font-size: 14px;
            line-height: 1.6;
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

        button:focus-visible,
        a:focus-visible {
            outline: 2px solid var(--lavender-deep);
            outline-offset: 3px;
        }

        .errors {
            margin-bottom: 18px;
            padding: 12px 14px;
            border: 1px solid #F4CACA;
            border-radius: 9px;
            background: #FFF0F0;
            color: #9B3030;
            font-size: 14px;
            line-height: 1.5;
        }

        .errors ul {
            margin: 0;
            padding-left: 20px;
        }

        .errors li + li {
            margin-top: 5px;
        }

        .footer {
            margin-top: 24px;
            color: var(--text-muted);
            font-size: 13px;
            line-height: 1.7;
            text-align: center;
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

            .register-card {
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
    <main class="register-card">

        <div class="brand">B.O.R.N.FOLIO</div>

        <h1>Create account</h1>

        <p class="subtitle">
            Sign up to start building your personal portfolio.
        </p>

        @if ($errors->any())
            <div class="errors" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <label for="name">Full name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                autocomplete="name"
                placeholder="Enter your full name"
                maxlength="255"
                required
                autofocus
            >

            <label for="email">Email address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                autocomplete="email"
                placeholder="Enter your email address"
                maxlength="255"
                required
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                autocomplete="new-password"
                placeholder="Create a password"
                required
            >

            <label for="password_confirmation">Confirm password</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                autocomplete="new-password"
                placeholder="Re-enter your password"
                required
            >

            <button type="submit">Create Account</button>
        </form>

        <div class="footer">
            Already have an account?
            <a href="{{ route('login') }}">Sign in</a>
        </div>

    </main>
</body>
</html>
