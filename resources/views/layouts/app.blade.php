<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'B.O.R.N.FOLIO')</title>

    <meta
        name="description"
        content="@yield('meta_description', 'Create and manage your professional portfolio with B.O.R.N.FOLIO.')"
    >

    <style>
        :root {
            /* B.O.R.N.FOLIO LAVENDER COLOR PALETTE */
            --primary: #9667DE;
            --primary-dark: #8151CC;

            --lavender-light: #EEEAFD;
            --lavender-soft: #D8CAF6;
            --lavender-medium: #C2A9EF;
            --lavender-purple: #AC88E8;
            --lavender-deep: #9667DE;

            --background: #EEEAFD;
            --surface: #FFFFFF;
            --text: #29213B;
            --muted: #756B88;
            --border: #E5DCF5;
            --danger: #DC4660;

            --radius: 14px;
            --container-width: 1160px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
            line-height: 1.6;
        }

        a {
            color: var(--primary);
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        /* =========================
           HEADER
        ========================= */

        .site-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            width: 100%;
            background: rgba(255, 255, 255, 0.97);
            border-top: 3px solid var(--lavender-soft);
            border-bottom: 1px solid var(--border);
            box-shadow: 0 3px 14px rgba(85, 55, 125, 0.035);
            backdrop-filter: blur(12px);
        }

        .navbar {
            width: 100%;
            max-width: var(--container-width);
            min-height: 69px;
            margin: 0 auto;
            padding: 12px 24px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        /* BRAND */

        .brand {
            flex-shrink: 0;
            color: var(--lavender-deep);
            font-size: 22px;
            font-weight: 800;
            letter-spacing: 0.5px;
            white-space: nowrap;
            transition: color 0.2s ease;
        }

        .brand:hover {
            color: var(--primary-dark);
            text-decoration: none;
        }

        /* =========================
           NAVIGATION LINKS
        ========================= */

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 24px;
            margin: 0 auto;
        }

        .nav-links a {
            position: relative;
            display: inline-flex;
            align-items: center;
            min-height: 38px;
            padding: 5px 0;

            color: #625873;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;

            background: transparent;
            border: none;
            border-radius: 0;

            transition: color 0.2s ease;
        }

        .nav-links a::after {
            content: "";
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;

            height: 2px;
            border-radius: 4px;
            background: var(--lavender-deep);

            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.2s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--lavender-deep);
            background: transparent;
            text-decoration: none;
        }

        .nav-links a:hover::after,
        .nav-links a.active::after {
            transform: scaleX(1);
        }

        .nav-links a.active {
            font-weight: 800;
        }

        /* =========================
           RIGHT NAVIGATION ACTIONS
        ========================= */

        .nav-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-shrink: 0;
            gap: 10px;
        }

        .nav-user {
            margin-right: 2px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 500;
            white-space: nowrap;
        }

        /* =========================
           BUTTONS
        ========================= */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            min-height: 38px;
            padding: 8px 15px;

            border: 1px solid var(--primary);
            border-radius: 9px;

            background: var(--primary);
            color: #FFFFFF;

            font-size: 12px;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            line-height: 1.4;
            white-space: nowrap;

            transition:
                background 0.2s ease,
                border-color 0.2s ease,
                color 0.2s ease,
                transform 0.2s ease;
        }

        .btn:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
            color: #FFFFFF;
            text-decoration: none;
        }

        .nav-actions > a.btn:not(.btn-secondary):hover {
            transform: translateY(-1px);
        }

        /* LOG OUT BUTTON */

        .btn-secondary {
            background: #FFFFFF;
            color: #6840A7;
            border-color: var(--lavender-soft);
        }

        .btn-secondary:hover {
            background: var(--lavender-light);
            color: #6840A7;
            border-color: var(--lavender-purple);
        }

        .logout-form {
            display: inline-flex;
            align-items: center;
            margin: 0;
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .page-container {
            width: 100%;
            max-width: var(--container-width);
            margin: 0 auto;
            padding: 36px 24px;
            flex: 1;
        }

        /* =========================
           FLASH MESSAGES
        ========================= */

        .alert {
            margin-bottom: 20px;
            padding: 14px 16px;
            border-radius: 10px;
            font-size: 14px;
        }

        .alert-success {
            background: #F0FFF4;
            border: 1px solid #BBE7C7;
            color: #166534;
        }

        .alert-error {
            background: #FFF1F2;
            border: 1px solid #F4C8D0;
            color: #991B1B;
        }

        /* =========================
           FOOTER
        ========================= */

        .site-footer {
            margin-top: auto;
            padding: 22px 24px;
            border-top: 1px solid var(--border);
            background: #FFFFFF;
            color: var(--muted);
            font-size: 13px;
            text-align: center;
        }

        .site-footer p {
            margin: 0;
        }

        /* =========================
           ACCESSIBILITY
        ========================= */

        a:focus-visible,
        button:focus-visible {
            outline: 3px solid var(--lavender-medium);
            outline-offset: 3px;
        }

        /* =========================
           TABLET
        ========================= */

        @media (max-width: 900px) {
            .navbar {
                flex-wrap: wrap;
                gap: 12px 18px;
            }

            .nav-links {
                margin: 0;
                gap: 18px;
            }

            .nav-actions {
                flex-wrap: wrap;
            }
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 600px) {
            .navbar {
                padding: 13px 16px;
                align-items: flex-start;
                flex-direction: column;
                gap: 10px;
            }

            .brand {
                font-size: 21px;
            }

            .nav-links {
                width: 100%;
                flex-wrap: wrap;
                gap: 5px 20px;
            }

            .nav-links a {
                min-height: 34px;
                font-size: 13px;
            }

            .nav-actions {
                width: 100%;
                justify-content: flex-start;
                flex-wrap: wrap;
                gap: 8px;
            }

            .nav-user {
                width: 100%;
                margin-bottom: 2px;
            }

            .btn {
                min-height: 38px;
                padding: 8px 12px;
            }

            .page-container {
                padding: 24px 16px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- TOP NAVIGATION --}}
    <header class="site-header">
        <nav class="navbar" aria-label="Main navigation">

            {{-- BRAND --}}
            <a href="{{ url('/') }}" class="brand">
                B.O.R.N.FOLIO
            </a>

            {{-- NAVIGATION LINKS --}}
            <div class="nav-links">

                {{-- HOME --}}
                <a
                    href="{{ url('/') }}"
                    class="{{ request()->is('/') ? 'active' : '' }}"
                    @if (request()->is('/')) aria-current="page" @endif
                >
                    Home
                </a>

                @auth

                    {{-- MANAGE PORTFOLIOS --}}
                    <a
                        href="{{ route('portfolios.index') }}"
                        class="{{ request()->routeIs('portfolios.index', 'portfolios.show', 'portfolios.edit') ? 'active' : '' }}"
                        @if (request()->routeIs('portfolios.index', 'portfolios.show', 'portfolios.edit')) aria-current="page" @endif
                    >
                        Manage Portfolios
                    </a>

                @else

                    {{-- GUEST LINKS --}}
                    <a
                        href="{{ route('login') }}"
                        class="{{ request()->routeIs('login') ? 'active' : '' }}"
                        @if (request()->routeIs('login')) aria-current="page" @endif
                    >
                        Sign In
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="{{ request()->routeIs('register') ? 'active' : '' }}"
                            @if (request()->routeIs('register')) aria-current="page" @endif
                        >
                            Create Account
                        </a>
                    @endif

                @endauth

            </div>

            {{-- RIGHT-SIDE ACTIONS --}}
            <div class="nav-actions">

                @auth

                    {{-- USER NAME --}}
                    <span class="nav-user">
                        {{ auth()->user()->name }}
                    </span>

                    {{-- NEW PORTFOLIO --}}
                    <a
                        href="{{ route('portfolios.create') }}"
                        class="btn"
                    >
                        + New Portfolio
                    </a>

                    {{-- LOG OUT --}}
                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                        class="logout-form"
                        onsubmit="return confirm('Are you sure you want to log out?');"
                    >
                        @csrf

                        <button
                            type="submit"
                            class="btn btn-secondary"
                        >
                            Log Out
                        </button>
                    </form>

                @else

                    {{-- GUEST ACTIONS --}}
                    <a
                        href="{{ route('login') }}"
                        class="btn btn-secondary"
                    >
                        Sign In
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="btn"
                        >
                            Create Account
                        </a>
                    @endif

                @endauth

            </div>

        </nav>
    </header>

    {{-- SESSION SUCCESS MESSAGE --}}
    @if (session('success'))
        <div
            style="width:100%;max-width:1160px;margin:20px auto 0;padding:0 24px;"
        >
            <div class="alert alert-success" role="status">
                {{ session('success') }}
            </div>
        </div>
    @endif

    {{-- SESSION ERROR MESSAGE --}}
    @if (session('error'))
        <div
            style="width:100%;max-width:1160px;margin:20px auto 0;padding:0 24px;"
        >
            <div class="alert alert-error" role="alert">
                {{ session('error') }}
            </div>
        </div>
    @endif

    {{-- PAGE CONTENT --}}
    <main class="page-container">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="site-footer">
        <p>
            &copy; {{ date('Y') }} B.O.R.N.FOLIO.
            Build your portfolio. Share your journey.
        </p>
    </footer>

    @stack('scripts')

</body>
</html>