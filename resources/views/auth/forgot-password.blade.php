<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | B.O.R.N.FOLIO</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #faf7ff, #e9dcff);
            color: #29204f;
        }

        .card {
            width: 100%;
            max-width: 420px;
            padding: 36px;
            border: 1px solid #dfccff;
            border-radius: 24px;
            background: white;
            box-shadow: 0 16px 40px rgba(99, 64, 160, 0.10);
        }

        .brand {
            color: #9960e8;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 3px;
        }

        h1 {
            margin-bottom: 10px;
            font-size: 28px;
        }

        p {
            color: #706587;
            line-height: 1.6;
        }

        label {
            display: block;
            margin: 22px 0 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #d6c5ff;
            border-radius: 10px;
            font-size: 15px;
        }

        input:focus {
            outline: 2px solid #eadfff;
            border-color: #a477ed;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #ad8bea, #9360d7);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        a {
            color: #9459e5;
            text-decoration: none;
        }

        .back {
            margin-top: 22px;
            text-align: center;
        }

        .message {
            padding: 10px;
            border-radius: 8px;
            background: #f1eaff;
            color: #56358c;
        }

        .error {
            color: #c0395b;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <main class="card">
        <div class="brand">B.O.R.N.FOLIO</div>

        <h1>Forgot password?</h1>

        <p>
            Enter your email address and we'll send you a link
            to reset your password.
        </p>

        @if (session('status'))
            <div class="message">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label for="email">Email address</label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your email"
                required
                autofocus
                autocomplete="email"
            >

            <button type="submit">Send Reset Link</button>
        </form>

        <div class="back">
            <a href="{{ route('login') }}">Back to Sign In</a>
        </div>
    </main>
</body>
</html>
