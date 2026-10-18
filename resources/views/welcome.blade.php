<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>B.O.R.N.FOLIO | Personal Portfolio Builder</title>

    <style>
        :root {
            --primary: #9667D8;
            --primary-dark: #7D50C2;
            --purple: #AC8BE8;
            --lavender-light: #EEEAFD;
            --lavender-soft: #D8CAF6;
            --lavender-mid: #C2A9EF;
            --text: #392B50;
            --muted: #776A8D;
            --white: #ffffff;
            --border: #D8CAF6;
            --shadow: 0 12px 35px rgba(105, 75, 160, .12);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--lavender-light);
            color: var(--text);
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font: inherit;
        }

        /* NAVIGATION */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255, 255, 255, .96);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(14px);
        }

        .nav-container {
            position: relative;
            max-width: 1250px;
            min-height: 72px;
            margin: auto;
            padding: 12px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--text);
            font-size: 19px;
            font-weight: 800;
            white-space: nowrap;
            flex-shrink: 0;
            z-index: 2;
        }

        .brand-icon {
            font-size: 24px;
            color: var(--primary);
        }

        .nav-links {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
            white-space: nowrap;
        }

        .nav-links a {
            position: relative;
            padding: 8px 0;
            color: #625477;
            font-size: 13px;
            font-weight: 700;
            transition: color .2s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--primary);
        }

        .nav-links a.active::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 2px;
            border-radius: 2px;
            background: linear-gradient(
                90deg,
                var(--primary),
                var(--purple)
            );
        }

        .nav-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            margin-left: auto;
            flex-shrink: 0;
            z-index: 2;
        }

        .logout-form {
            display: inline-flex;
            margin: 0;
        }

        /* BUTTONS */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 11px 17px;
            border: 1px solid transparent;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            white-space: nowrap;
            transition: transform .2s, box-shadow .2s, background .2s;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            color: white;
            background: linear-gradient(
                105deg,
                var(--primary),
                var(--purple)
            );
            box-shadow: 0 6px 15px rgba(150, 103, 216, .22);
        }

        .btn-primary:hover {
            color: white;
            box-shadow: 0 10px 22px rgba(150, 103, 216, .3);
        }

        .btn-outline {
            background: white;
            color: #594575;
            border-color: var(--lavender-mid);
        }

        .btn-outline:hover {
            background: var(--lavender-light);
            border-color: var(--purple);
        }

        .btn-large {
            padding: 13px 20px;
            font-size: 13px;
        }

        /* HERO */

        .hero {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(
                    ellipse at 78% 45%,
                    rgba(194, 169, 239, .38),
                    transparent 34%
                ),
                radial-gradient(
                    ellipse at 5% 15%,
                    rgba(216, 202, 246, .65),
                    transparent 38%
                ),
                linear-gradient(
                    120deg,
                    #ffffff,
                    #EEEAFD 60%,
                    #F8F3FF
                );
        }

        .hero-inner {
            max-width: 1200px;
            min-height: 405px;
            margin: auto;
            padding: 65px 30px;
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            align-items: center;
            gap: 35px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .eyebrow {
            display: inline-block;
            padding: 6px 13px;
            margin-bottom: 18px;
            border-radius: 30px;
            background: var(--lavender-light);
            color: var(--primary-dark);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .6px;
        }

        .hero h1 {
            max-width: 600px;
            margin-bottom: 18px;
            color: var(--text);
            font-size: clamp(34px, 4vw, 49px);
            line-height: 1.12;
            letter-spacing: -1.6px;
        }

        .gradient-text {
            color: var(--primary);
            background: linear-gradient(
                90deg,
                var(--primary),
                var(--purple)
            );
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            max-width: 560px;
            color: var(--muted);
            font-size: 15px;
            line-height: 1.9;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        /* HERO PORTFOLIO PREVIEW */

        .hero-visual {
            position: relative;
            min-height: 270px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .visual-glow {
            position: absolute;
            width: 90%;
            height: 85%;
            border-radius: 45%;
            background: linear-gradient(
                135deg,
                var(--lavender-soft),
                var(--lavender-light)
            );
            filter: blur(2px);
            transform: rotate(-8deg);
        }

        .portfolio-window {
            position: relative;
            width: 88%;
            max-width: 420px;
            padding: 22px;
            border: 1px solid var(--border);
            border-radius: 19px;
            background: rgba(255, 255, 255, .95);
            box-shadow: 0 25px 55px rgba(105, 75, 160, .18);
            transform: rotate(-3deg);
        }

        .window-top {
            display: flex;
            align-items: center;
            gap: 7px;
            padding-bottom: 15px;
            border-bottom: 1px solid #F0EAFB;
        }

        .window-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--lavender-mid);
        }

        .window-title {
            margin-left: 5px;
            color: var(--muted);
            font-size: 10px;
            font-weight: 700;
        }

        .window-profile {
            display: flex;
            align-items: center;
            gap: 13px;
            margin: 18px 0;
        }

        .window-avatar {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            background: linear-gradient(
                135deg,
                var(--lavender-mid),
                var(--lavender-soft)
            );
            color: var(--primary-dark);
            font-size: 22px;
            font-weight: 800;
        }

        .window-profile strong {
            display: block;
            margin-bottom: 4px;
            font-size: 14px;
        }

        .window-profile span {
            color: #9587AA;
            font-size: 10px;
        }

        .visual-line {
            height: 7px;
            margin: 9px 0;
            border-radius: 10px;
            background: var(--lavender-soft);
        }

        .visual-line.short {
            width: 45%;
            background: linear-gradient(
                90deg,
                var(--primary),
                var(--purple)
            );
        }

        .visual-line.medium {
            width: 70%;
        }

        .visual-projects {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 9px;
            margin-top: 17px;
        }

        .visual-project {
            height: 63px;
            border-radius: 9px;
            background: linear-gradient(
                145deg,
                var(--lavender-light),
                var(--lavender-mid)
            );
        }

        .visual-project:nth-child(2) {
            background: linear-gradient(
                145deg,
                var(--lavender-soft),
                var(--purple)
            );
        }

        .visual-project:nth-child(3) {
            background: linear-gradient(
                145deg,
                #F4EDFF,
                var(--lavender-mid)
            );
        }

        .floating-badge {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 43px;
            height: 43px;
            border: 3px solid rgba(255, 255, 255, .85);
            border-radius: 14px;
            color: white;
            font-size: 19px;
            font-weight: 800;
            box-shadow: 0 8px 20px rgba(105, 75, 160, .18);
            background: linear-gradient(
                135deg,
                var(--primary),
                var(--purple)
            );
        }

        .badge-blue {
            top: 8%;
            right: 11%;
        }

        .badge-purple {
            left: 3%;
            top: 30%;
        }

        .badge-pink {
            right: 1%;
            bottom: 13%;
        }

        /* SHARED SECTIONS */

        .section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 48px 28px;
        }

        .section-heading {
            margin-bottom: 9px;
            color: var(--text);
            text-align: center;
            font-size: 29px;
            line-height: 1.3;
            letter-spacing: -.6px;
        }

        .section-description {
            max-width: 740px;
            margin: 0 auto 30px;
            color: var(--muted);
            text-align: center;
            font-size: 13px;
            line-height: 1.8;
        }

        /* HOW IT WORKS */

        .steps {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 17px;
        }

        .step {
            padding: 25px 20px;
            border: 1px solid var(--border);
            border-radius: 15px;
            background: rgba(255, 255, 255, .9);
            box-shadow: 0 7px 22px rgba(105, 75, 160, .05);
            transition: transform .25s, box-shadow .25s;
        }

        .step:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }

        .step-icon {
            width: 53px;
            height: 53px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--lavender-light);
            color: var(--primary);
            font-size: 23px;
            font-weight: 800;
            box-shadow: inset 0 0 0 1px var(--border);
        }

        .step h3 {
            margin-bottom: 8px;
            font-size: 15px;
        }

        .step p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        /* TEMPLATE CARDS */

        .templates-section {
            padding-top: 32px;
            padding-bottom: 65px;
        }

        .templates {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
            align-items: stretch;
        }

        .template-card {
            display: flex;
            flex-direction: column;
            min-width: 0;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 17px;
            background: white;
            box-shadow: 0 9px 25px rgba(105, 75, 160, .07);
            transition: transform .25s, box-shadow .25s;
        }

        .template-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 35px rgba(105, 75, 160, .15);
        }

        .template-preview {
            min-height: 220px;
            padding: 23px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .simple-preview {
            background: linear-gradient(
                135deg,
                var(--lavender-light),
                var(--lavender-soft)
            );
        }

        .modern-preview {
            background: linear-gradient(
                135deg,
                var(--primary),
                var(--purple)
            );
        }

        .creative-preview {
            background: linear-gradient(
                135deg,
                var(--lavender-mid),
                #F8F3FF
            );
        }

        .mock-page {
            width: 100%;
            max-width: 300px;
            min-height: 175px;
            padding: 17px;
            border-radius: 11px;
            background: #fff;
            border: 1px solid rgba(210, 195, 240, .8);
            box-shadow: 0 12px 28px rgba(105, 75, 160, .14);
            transition: transform .25s;
        }

        .template-card:hover .mock-page {
            transform: scale(1.025);
        }

        .modern-preview .mock-page {
            border-top: 4px solid var(--lavender-mid);
        }

        .creative-preview .mock-page {
            background: #392B50;
            border-color: var(--lavender-mid);
            color: white;
        }

        .mock-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .mock-avatar {
            width: 37px;
            height: 37px;
            flex-shrink: 0;
            border-radius: 50%;
            background: linear-gradient(
                135deg,
                var(--lavender-mid),
                var(--lavender-soft)
            );
            border: 2px solid var(--lavender-light);
        }

        .creative-preview .mock-avatar {
            background: linear-gradient(
                135deg,
                var(--purple),
                var(--lavender-mid)
            );
            border-color: var(--purple);
        }

        .mock-heading {
            color: #594575;
            font-size: 10px;
            font-weight: 800;
            line-height: 1.4;
        }

        .creative-preview .mock-heading,
        .creative-preview .mock-section-title {
            color: var(--lavender-soft);
        }

        .mock-subheading {
            color: #9587AA;
            font-size: 8px;
        }

        .mock-section-title {
            margin-top: 11px;
            margin-bottom: 5px;
            color: #776A8D;
            font-size: 8px;
            font-weight: 800;
        }

        .mock-line {
            height: 5px;
            margin: 7px 0;
            border-radius: 8px;
            background: var(--lavender-soft);
        }

        .mock-line.short {
            width: 48%;
            height: 7px;
            background: linear-gradient(
                90deg,
                var(--primary),
                var(--purple)
            );
        }

        .mock-line.medium {
            width: 72%;
        }

        .creative-preview .mock-line {
            background: #594575;
        }

        .creative-preview .mock-line.short {
            background: var(--purple);
        }

        .mock-tag {
            display: inline-block;
            margin-top: 4px;
            margin-right: 3px;
            padding: 3px 7px;
            border-radius: 5px;
            background: var(--lavender-light);
            color: var(--primary-dark);
            font-size: 7px;
            font-weight: 700;
        }

        .creative-preview .mock-tag {
            color: var(--lavender-light);
            background: #594575;
        }

        .template-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: stretch;
            padding: 21px;
        }

        .template-label {
            display: inline-block;
            align-self: flex-start;
            padding: 4px 9px;
            margin-bottom: 9px;
            border-radius: 20px;
            background: var(--lavender-light);
            color: var(--primary-dark);
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .modern-card .template-label,
        .creative-card .template-label {
            background: var(--lavender-soft);
            color: #594575;
        }

        .template-info h3 {
            margin-bottom: 7px;
            color: var(--text);
            font-size: 19px;
        }

        .template-info p {
            flex: 1;
            margin-bottom: 18px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        .template-info .btn {
            width: 100%;
            min-height: 43px;
            margin-top: auto;
        }

        .creative-card .btn {
            background: linear-gradient(
                100deg,
                var(--primary),
                var(--purple)
            );
        }

        /* FOOTER */

        .footer {
            padding: 27px 20px;
            border-top: 1px solid var(--border);
            background: linear-gradient(
                135deg,
                #ffffff,
                var(--lavender-light),
                var(--lavender-soft)
            );
            color: var(--muted);
            text-align: center;
            font-size: 12px;
        }

        /* TABLET */

        @media (max-width: 1000px) {
            .nav-container {
                flex-wrap: wrap;
                gap: 14px;
                padding: 14px 20px;
            }

            .nav-links {
                position: static;
                transform: none;
                order: 3;
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
                gap: 25px;
                padding-top: 4px;
            }

            .hero-inner {
                grid-template-columns: 1fr 1fr;
                gap: 20px;
                padding: 55px 24px;
            }

            .hero h1 {
                font-size: 38px;
            }

            .steps {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .templates {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        /* MOBILE */

        @media (max-width: 650px) {
            .nav-container {
                padding: 12px 14px;
                gap: 12px;
            }

            .brand {
                font-size: 15px;
            }

            .brand-icon {
                font-size: 20px;
            }

            .nav-actions {
                gap: 6px;
            }

            .nav-actions .btn {
                padding: 9px 10px;
                font-size: 11px;
            }

            .nav-links {
                gap: 19px;
            }

            .nav-links a {
                font-size: 12px;
            }

            .hero-inner {
                grid-template-columns: 1fr;
                padding: 48px 20px 35px;
                text-align: center;
            }

            .hero h1 {
                font-size: 35px;
                letter-spacing: -1px;
            }

            .hero p {
                font-size: 14px;
            }

            .hero-actions {
                justify-content: center;
            }

            .hero-visual {
                min-height: 240px;
                margin-top: 5px;
            }

            .portfolio-window {
                width: 85%;
            }

            .section {
                padding: 38px 17px;
            }

            .section-heading {
                font-size: 24px;
            }

            .steps,
            .templates {
                grid-template-columns: 1fr;
            }

            .step {
                padding: 22px;
                text-align: center;
            }

            .step-icon {
                margin-left: auto;
                margin-right: auto;
            }

            .template-preview {
                min-height: 220px;
            }
        }

        @media (max-width: 380px) {
            .nav-container {
                justify-content: space-between;
            }

            .brand {
                font-size: 13px;
                gap: 4px;
            }

            .nav-actions {
                gap: 4px;
            }

            .nav-actions .btn {
                padding: 8px;
                font-size: 10px;
            }

            .hero h1 {
                font-size: 30px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

    <!-- NAVIGATION BAR -->

    <header class="navbar">
        <div class="nav-container">

            <a href="{{ url('/') }}" class="brand">
                <span class="brand-icon">▣</span>
                B.O.R.N.FOLIO
            </a>

            @auth
                <nav class="nav-links" aria-label="Main navigation">
                    <a href="{{ url('/') }}"
                       class="{{ request()->is('/') ? 'active' : '' }}">
                        Home
                    </a>

                    <a href="{{ route('portfolios.index') }}"
                       class="{{ request()->routeIs('portfolios.index', 'portfolios.show', 'portfolios.edit') ? 'active' : '' }}">
                        Manage Portfolios
                    </a>
                </nav>
            @endauth

            <div class="nav-actions">
                @auth
                    <a href="{{ route('portfolios.create') }}"
                       class="btn btn-primary">
                        + New Portfolio
                    </a>

                    <form method="POST"
                          action="{{ route('logout') }}"
                          class="logout-form"
                          onsubmit="return confirm('Are you sure you want to log out?');">
                        @csrf

                        <button type="submit" class="btn btn-outline">
                            Log Out
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline">
                        Log In
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            Register
                        </a>
                    @endif
                @endauth
            </div>

        </div>
    </header>

    <main>

        <!-- HERO SECTION -->

        <section class="hero">
            <div class="hero-inner">

                <div class="hero-content">
                    <span class="eyebrow">
                        YOUR FUTURE, YOUR PORTFOLIO
                    </span>

                    <h1>
                        Build &amp; Publish Your Personal Portfolio
                        <span class="gradient-text">in Minutes</span>
                    </h1>

                    <p>
                        Enter your personal background, education, skills,
                        projects, work experience, and social links.
                        Select one of our three professional templates
                        and create a portfolio you can share online.
                    </p>

                    <div class="hero-actions">
                        @auth
                            <a href="{{ route('portfolios.create') }}"
                               class="btn btn-primary btn-large">
                                + Create Portfolio Now &rarr;
                            </a>

                            <a href="{{ route('portfolios.index') }}"
                               class="btn btn-outline btn-large">
                                Manage Portfolios
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="btn btn-primary btn-large">
                                Log In to Get Started &rarr;
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="btn btn-outline btn-large">
                                    Create an Account
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>

                <!-- PORTFOLIO PREVIEW -->

                <div class="hero-visual"
                     aria-label="Portfolio preview illustration">

                    <div class="visual-glow"></div>

                    <div class="floating-badge badge-blue">✦</div>
                    <div class="floating-badge badge-purple">&lt;/&gt;</div>
                    <div class="floating-badge badge-pink">↗</div>

                    <div class="portfolio-window">
                        <div class="window-top">
                            <span class="window-dot"></span>
                            <span class="window-dot"></span>
                            <span class="window-dot"></span>
                            <span class="window-title">MY PORTFOLIO</span>
                        </div>

                        <div class="window-profile">
                            <div class="window-avatar">Y</div>

                            <div>
                                <strong>Your Name</strong>
                                <span>Web Developer · Designer</span>
                            </div>
                        </div>

                        <div class="visual-line short"></div>
                        <div class="visual-line"></div>
                        <div class="visual-line medium"></div>

                        <div class="visual-projects">
                            <div class="visual-project"></div>
                            <div class="visual-project"></div>
                            <div class="visual-project"></div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- HOW IT WORKS -->

        <section class="section">
            <h2 class="section-heading">How It Works</h2>

            <p class="section-description">
                Create your professional portfolio in four simple steps.
            </p>

            <div class="steps">

                <article class="step">
                    <div class="step-icon">♟</div>
                    <h3>Enter Information</h3>

                    <p>
                        Fill in your bio, education, skills, projects,
                        work experience, and social profiles.
                    </p>
                </article>

                <article class="step">
                    <div class="step-icon">▣</div>
                    <h3>Save Your Portfolio</h3>

                    <p>
                        Save your portfolio details so you can return
                        to your work and manage your information.
                    </p>
                </article>

                <article class="step">
                    <div class="step-icon">▦</div>
                    <h3>Choose a Template</h3>

                    <p>
                        Select one of three designs:
                        Simple, Modern, or Creative.
                    </p>
                </article>

                <article class="step">
                    <div class="step-icon">↗</div>
                    <h3>Publish &amp; Share</h3>

                    <p>
                        If public portfolio publishing is configured,
                        share your portfolio link with other people.
                    </p>
                </article>

            </div>
        </section>

        <!-- THREE PORTFOLIO TEMPLATES -->

        <section class="section templates-section" id="templates">

            <h2 class="section-heading">
                Choose From 3 Distinct Templates
            </h2>

            <p class="section-description">
                Choose a visual style for your portfolio. Your portfolio
                creation logic must use the selected template to display
                the corresponding design.
            </p>

            <div class="templates">

                <!-- SIMPLE TEMPLATE -->

                <article class="template-card simple-card">

                    <div class="template-preview simple-preview">
                        <div class="mock-page">

                            <div class="mock-profile">
                                <div class="mock-avatar"></div>

                                <div>
                                    <div class="mock-heading">YOUR NAME</div>
                                    <div class="mock-subheading">
                                        Personal Portfolio
                                    </div>
                                </div>
                            </div>

                            <div class="mock-line short"></div>

                            <div class="mock-section-title">ABOUT ME</div>
                            <div class="mock-line"></div>
                            <div class="mock-line medium"></div>

                            <span class="mock-tag">Skills</span>
                            <span class="mock-tag">Projects</span>

                        </div>
                    </div>

                    <div class="template-info">
                        <span class="template-label">Clean &amp; Minimal</span>

                        <h3>Simple Template</h3>

                        <p>
                            A clean, minimal layout that highlights your
                            biography, education, skills, and experience
                            without unnecessary distractions.
                        </p>

                        <a href="{{ route('portfolios.create', ['template' => 'simple']) }}"
                           class="btn btn-primary">
                            Choose Simple &rarr;
                        </a>
                    </div>

                </article>

                <!-- MODERN TEMPLATE -->

                <article class="template-card modern-card">

                    <div class="template-preview modern-preview">
                        <div class="mock-page">

                            <div class="mock-profile">
                                <div class="mock-avatar"></div>

                                <div>
                                    <div class="mock-heading">YOUR NAME</div>
                                    <div class="mock-subheading">
                                        Professional Profile
                                    </div>
                                </div>
                            </div>

                            <div class="mock-line short"></div>

                            <div class="mock-section-title">EXPERIENCE</div>
                            <div class="mock-line"></div>
                            <div class="mock-line medium"></div>

                            <div class="mock-section-title">
                                SELECTED PROJECTS
                            </div>

                            <div class="mock-line"></div>

                            <span class="mock-tag">Career</span>
                            <span class="mock-tag">Projects</span>

                        </div>
                    </div>

                    <div class="template-info">
                        <span class="template-label">Professional</span>

                        <h3>Modern Template</h3>

                        <p>
                            A polished design for students, job seekers,
                            and professionals showcasing their experience
                            and achievements.
                        </p>

                        <a href="{{ route('portfolios.create', ['template' => 'modern']) }}"
                           class="btn btn-primary">
                            Choose Modern &rarr;
                        </a>
                    </div>

                </article>

                <!-- CREATIVE TEMPLATE -->

                <article class="template-card creative-card">

                    <div class="template-preview creative-preview">
                        <div class="mock-page">

                            <div class="mock-profile">
                                <div class="mock-avatar"></div>

                                <div>
                                    <div class="mock-heading">YOUR NAME</div>
                                    <div class="mock-subheading">
                                        Creative Portfolio
                                    </div>
                                </div>
                            </div>

                            <div class="mock-line short"></div>

                            <div class="mock-section-title">
                                MY CREATIVE WORK
                            </div>

                            <div class="mock-line"></div>
                            <div class="mock-line medium"></div>

                            <div class="mock-section-title">
                                FEATURED PROJECTS
                            </div>

                            <div class="mock-line"></div>

                            <span class="mock-tag">Design</span>
                            <span class="mock-tag">Ideas</span>

                        </div>
                    </div>

                    <div class="template-info">
                        <span class="template-label">Bold &amp; Creative</span>

                        <h3>Creative Template</h3>

                        <p>
                            A distinctive, expressive style for designers,
                            developers, artists, and anyone who wants
                            a more creative portfolio presentation.
                        </p>

                        <a href="{{ route('portfolios.create', ['template' => 'creative']) }}"
                           class="btn btn-primary">
                            Choose Creative &rarr;
                        </a>
                    </div>

                </article>

            </div>
        </section>

    </main>

    <!-- FOOTER -->

    <footer class="footer">
        <p>
            &copy; {{ date('Y') }} B.O.R.N.FOLIO.
            Build your future, one portfolio at a time.
        </p>
    </footer>

</body>
</html>
