<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password | B.O.R.N.FOLIO</title>

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
            margin: 24px 0 10px;
            font-size: 28px;
        }

        p {
            color: #706587;
            line-height: 1.6;
        }

        .description {
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin: 20px 0 8px;
            font-weight: bold;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #d6c5ff;
            border-radius: 10px;
            font-size: 15px;
            background: #fff;
            color: #29204f;
        }

        input:focus {
            outline: 2px solid #eadfff;
            border-color: #a477ed;
        }

        button {
            width: 100%;
            margin-top: 24px;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #ad8bea, #9360d7);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        button:hover {
            opacity: 0.9;
        }

        a {
            color: #9459e5;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .back {
            margin-top: 22px;
            text-align: center;
            font-size: 14px;
        }

        .message {
            padding: 12px;
            border-radius: 8px;
            background: #f1eaff;
            color: #56358c;
            font-size: 14px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .error {
            margin-top: 8px;
            color: #c0395b;
            font-size: 13px;
            line-height: 1.5;
        }

        .error-summary {
            margin-bottom: 18px;
            padding: 12px;
            border: 1px solid #f3c4d0;
            border-radius: 10px;
            background: #fff4f6;
        }

        .error-summary p {
            margin: 5px 0;
            color: #c0395b;
            font-size: 14px;
        }

        @media (max-width: 480px) {
            .card {
                padding: 26px 22px;
            }

            h1 {
                font-size: 25px;
            }
        }
    </style>
</head>
<body>

    <main class="card">

        <div class="brand">B.O.R.N.FOLIO</div>

        <h1>Reset password</h1>

        <p class="description">
            Create a new password for your account.
            Choose a secure password that you can remember.
        </p>

        @if (session('status'))
            <div class="message" role="status">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-summary" role="alert">
                <p><strong>Please check the following:</strong></p>

                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input
                type="hidden"
                name="token"
                value="{{ $request->route('token') }}"
            >

            <label for="email">Email address</label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email', $request->email) }}"
                placeholder="Enter your email"
                required
                autocomplete="email"
            >

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">New password</label>

            <input
                id="password"
                type="password"
                name="password"
                placeholder="Enter your new password"
                required
                autocomplete="new-password"
            >

            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password_confirmation">
                Confirm new password
            </label>

            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                placeholder="Re-enter your new password"
                required
                autocomplete="new-password"
            >

            <button type="submit">
                Reset Password
            </button>
        </form>

        <div class="back">
            <a href="{{ route('login') }}">Back to Sign In</a>
        </div>

    </main>

</body>
</html>
