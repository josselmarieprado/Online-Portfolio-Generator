<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>B.O.R.N.FOLIO | {{ $portfolio->full_name }}</title>

    <style>
        /* =========================================
           GLOBAL STYLES
        ========================================= */
        * {
            box-sizing: border-box;
        }

        :root {
            --bg: #f7f5fc;
            --surface: #ffffff;
            --text: #2f2541;
            --muted: #786d8c;
            --accent: #8561c9;
            --soft: #f0eafb;
            --border: #e5dcef;
            --shadow: 0 8px 24px rgba(50, 32, 78, .06);
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            line-height: 1.65;
            overflow-wrap: anywhere;
        }

        img {
            max-width: 100%;
        }

        a {
            color: var(--accent);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* =========================================
           NAVIGATION
        ========================================= */
        .toolbar {
            position: relative;
            z-index: 20;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            padding: 14px 5%;
            background: var(--surface);
            border-bottom: 1px solid var(--border);
        }

        .brand {
            margin: 0;
            color: var(--accent);
            font-size: 20px;
            font-weight: 900;
            letter-spacing: 1.5px;
        }

        .actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 9px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 15px;
            border: 1px solid transparent;
            border-radius: 9px;
            background: var(--accent);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s ease;
        }

        .btn:hover {
            opacity: .9;
            transform: translateY(-1px);
            text-decoration: none;
        }

        .btn.secondary {
            background: var(--surface);
            color: var(--text);
            border-color: var(--border);
        }

        /* =========================================
           SHARED PROFILE
        ========================================= */
        .portfolio-page {
            width: min(1120px, 100%);
            margin: 32px auto;
            padding: 0 22px;
        }

        .hero {
            display: flex;
            align-items: flex-start;
            gap: 22px;
            padding: 28px;
            margin-bottom: 24px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 18px;
            box-shadow: var(--shadow);
        }

        .profile-photo {
            display: block;
            width: 100px;
            height: 100px;
            flex-shrink: 0;
            object-fit: cover;
            border-radius: 16px;
            background: var(--soft);
        }

        .profile-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
            font-size: 34px;
            font-weight: 800;
        }

        .hero-content {
            flex: 1;
            min-width: 0;
        }

        .template-label {
            display: inline-block;
            margin-bottom: 8px;
            padding: 4px 10px;
            border-radius: 20px;
            background: var(--soft);
            color: var(--accent);
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .hero h1 {
            margin: 0;
            font-size: clamp(28px, 4vw, 42px);
            line-height: 1.2;
            letter-spacing: -.8px;
        }

        .hero .title {
            margin: 7px 0;
            color: var(--accent);
            font-size: 17px;
            font-weight: 700;
        }

        .hero-description {
            margin: 12px 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        .contact {
            display: flex;
            flex-wrap: wrap;
            gap: 7px 16px;
            margin-top: 14px;
            color: var(--muted);
            font-size: 12px;
        }

        /* =========================================
           CONTENT LAYOUT
        ========================================= */
        .portfolio-layout {
            display: grid;
            grid-template-columns: minmax(230px, .8fr) minmax(0, 1.6fr);
            align-items: start;
            gap: 22px;
        }

        .sidebar,
        .main-column {
            display: grid;
            align-content: start;
            gap: 18px;
            min-width: 0;
        }

        .section {
            min-width: 0;
            padding: 23px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 15px;
            box-shadow: var(--shadow);
        }

        .section h2 {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 0 17px;
            font-size: 16px;
            font-weight: 800;
            line-height: 1.4;
        }

        .section h2::before {
            content: "";
            width: 4px;
            height: 21px;
            flex-shrink: 0;
            border-radius: 5px;
            background: var(--accent);
        }

        .section p {
            margin: 7px 0;
        }

        .muted,
        .empty {
            color: var(--muted);
        }

        .empty {
            font-size: 13px;
        }

        .item {
            padding: 14px 0;
            border-bottom: 1px solid var(--border);
        }

        .item:first-of-type {
            padding-top: 0;
        }

        .item:last-child {
            padding-bottom: 0;
            border-bottom: 0;
        }

        .item h3,
        .project-card h3 {
            margin: 0 0 5px;
            font-size: 14px;
            font-weight: 800;
            line-height: 1.5;
        }

        .item p {
            font-size: 12px;
        }

        /* =========================================
           SKILLS
        ========================================= */
        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 7px;
            background: var(--soft);
            color: var(--accent);
            font-size: 11px;
            font-weight: 700;
        }

        /* =========================================
           PROJECTS
        ========================================= */
        .projects-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
        }

        .projects-heading h2 {
            margin-bottom: 17px;
        }

        .projects-heading small {
            color: var(--muted);
            font-size: 11px;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        .project-card {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            min-width: 0;
            padding: 18px;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: var(--surface);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .project-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        .project-card p {
            font-size: 12px;
        }

        .project-card .project-description {
            flex: 1;
        }

        .project-tech {
            color: var(--muted);
        }

        .project-link {
            display: inline-block;
            margin-top: 10px;
            font-size: 12px;
            font-weight: 800;
        }

        .site-footer {
            padding: 24px 16px;
            color: var(--muted);
            text-align: center;
            font-size: 11px;
        }

        /* =========================================
           TEMPLATE 1: SIMPLE
           Minimalist, centered, clean resume
        ========================================= */
        body.template-simple {
            --bg: #faf8fd;
            --surface: #ffffff;
            --text: #302541;
            --muted: #786d8c;
            --accent: #8561c9;
            --soft: #f0eafb;
            --border: #e8e1f1;
            --shadow: none;
        }

        .template-simple .portfolio-page {
            width: min(920px, 100%);
            margin: 38px auto;
        }

        .template-simple .hero {
            display: block;
            padding: 42px 36px;
            text-align: center;
            border-radius: 20px;
            box-shadow: none;
        }

        .template-simple .hero-content {
            max-width: 700px;
            margin: 0 auto;
        }

        .template-simple .profile-photo {
            width: 108px;
            height: 108px;
            margin: 0 auto 18px;
            border: 4px solid var(--soft);
            border-radius: 50%;
        }

        .template-simple .hero h1 {
            margin-top: 8px;
        }

        .template-simple .hero-description {
            max-width: 600px;
            margin: 13px auto;
        }

        .template-simple .contact {
            justify-content: center;
            margin-top: 18px;
        }

        .template-simple .portfolio-layout {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .template-simple .sidebar,
        .template-simple .main-column {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            align-items: stretch;
            gap: 18px;
        }

        .template-simple .main-column > .section {
            grid-column: 1 / -1;
        }

        .template-simple .section {
            border-radius: 12px;
            box-shadow: none;
        }

        .template-simple .projects-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        /* =========================================
           TEMPLATE 2: MODERN
           Corporate header and dashboard layout
        ========================================= */
        body.template-modern {
            --bg: #f2eff8;
            --surface: #ffffff;
            --text: #292139;
            --muted: #776d88;
            --accent: #7957b5;
            --soft: #eee7f8;
            --border: #e2d9ed;
            --shadow: 0 5px 18px rgba(41, 32, 61, .04);
        }

        .template-modern .toolbar {
            padding: 16px 5%;
            background: #29213d;
            border-bottom: 0;
        }

        .template-modern .brand {
            color: #e5d7ff;
        }

        .template-modern .btn {
            background: #8564c0;
        }

        .template-modern .btn.secondary {
            color: #fff;
            background: rgba(255, 255, 255, .09);
            border-color: rgba(255, 255, 255, .22);
        }

        .template-modern .portfolio-page {
            width: min(1240px, 100%);
            margin: 30px auto;
        }

        .template-modern .hero {
            align-items: center;
            padding: 36px;
            color: #fff;
            background: linear-gradient(120deg, #302541, #55436f);
            border: 0;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(41, 32, 61, .12);
        }

        .template-modern .hero h1 {
            color: #fff;
            font-size: clamp(32px, 4vw, 46px);
        }

        .template-modern .hero .title {
            color: #ddccfb;
        }

        .template-modern .hero-description,
        .template-modern .contact {
            color: #e3dced;
        }

        .template-modern .profile-photo {
            width: 112px;
            height: 112px;
            border: 3px solid rgba(255, 255, 255, .4);
            border-radius: 18px;
        }

        .template-modern .profile-placeholder {
            color: #fff;
            background: #725a91;
        }

        .template-modern .template-label {
            color: #f0e7ff;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .2);
        }

        .template-modern .portfolio-layout {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            align-items: start;
            gap: 20px;
        }

        /* Let each section participate in the dashboard grid. */
        .template-modern .sidebar,
        .template-modern .main-column {
            display: contents;
        }

        .template-modern .section {
            border-radius: 15px;
            box-shadow: 0 4px 16px rgba(41, 32, 61, .035);
        }

        .template-modern .section h2::before {
            background: linear-gradient(180deg, #a78bd7, #7653ae);
        }

        .template-modern .badge {
            color: #654791;
            background: #f0eafb;
            border: 1px solid #e5d9f5;
        }

        .template-modern .project-card {
            background: #fcfaff;
        }

        /* =========================================
           TEMPLATE 3: CREATIVE
           Fixed profile panel and editorial content
        ========================================= */
        body.template-creative {
            --bg: #f7f3fc;
            --surface: #ffffff;
            --text: #30213f;
            --muted: #796987;
            --accent: #8a5fc1;
            --soft: #f0e7fa;
            --border: #e7d9f1;
            --shadow: 0 8px 25px rgba(63, 39, 82, .045);
        }

        .template-creative .toolbar {
            padding: 14px 5%;
            background: #fff;
            border-bottom: 1px solid var(--border);
        }

        .template-creative .brand {
            color: #7951aa;
        }

        .template-creative .btn {
            background: #7951aa;
        }

        .template-creative .btn.secondary {
            color: #7951aa;
            background: #fff;
            border-color: #dfccef;
        }

        .template-creative .portfolio-page {
            width: 100%;
            max-width: none;
            margin: 0;
            padding: 0;
        }

        .template-creative .hero {
            position: fixed;
            top: 57px;
            bottom: 0;
            left: 0;
            z-index: 5;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            width: 310px;
            height: calc(100vh - 57px);
            overflow-y: auto;
            padding: 42px 30px;
            margin: 0;
            color: #fff;
            background: linear-gradient(155deg, #3c2b53, #75519b 65%, #9b7bc1);
            border: 0;
            border-radius: 0;
            box-shadow: none;
        }

        .template-creative .hero-content {
            width: 100%;
        }

        .template-creative .profile-photo {
            width: 112px;
            height: 112px;
            margin: 22px 0;
            border: 3px solid rgba(255, 255, 255, .7);
            border-radius: 22px;
        }

        .template-creative .profile-placeholder {
            color: #fff;
            background: rgba(255, 255, 255, .16);
        }

        .template-creative .template-label {
            color: #fff;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .25);
        }

        .template-creative .hero h1 {
            font-size: clamp(30px, 3vw, 40px);
            line-height: 1.12;
            letter-spacing: -1px;
        }

        .template-creative .hero .title,
        .template-creative .hero-description,
        .template-creative .contact {
            color: #f0e8f7;
        }

        .template-creative .contact {
            display: grid;
            gap: 9px;
            margin-top: 22px;
        }

        .template-creative .portfolio-layout {
            display: flex;
            flex-direction: column;
            gap: 22px;
            width: auto;
            margin-left: 310px;
            padding: 34px;
        }

        .template-creative .sidebar,
        .template-creative .main-column {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            align-items: start;
            gap: 22px;
        }

        .template-creative .main-column > .section {
            grid-column: 1 / -1;
        }

        .template-creative .section {
            border-radius: 18px;
        }

        .template-creative .section h2::before {
            background: linear-gradient(180deg, #a987d0, #7951aa);
        }

        .template-creative .badge {
            color: #69478c;
            background: #f1e9f8;
            border-radius: 20px;
        }

        .template-creative .project-card {
            border-color: #e9dff2;
            border-radius: 16px;
            background: linear-gradient(145deg, #fff, #fbf8fe);
        }

        /* =========================================
           RESPONSIVE DESIGN
        ========================================= */
        @media (max-width: 760px) {
            .toolbar {
                padding: 12px 4%;
            }

            .brand {
                font-size: 17px;
            }

            .actions {
                gap: 6px;
            }

            .btn {
                padding: 9px 11px;
                font-size: 12px;
            }

            .portfolio-page {
                margin: 18px auto;
                padding: 0 12px;
            }

            .hero {
                padding: 22px;
                gap: 15px;
            }

            .profile-photo {
                width: 76px;
                height: 76px;
            }

            .portfolio-layout {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .template-simple .sidebar,
            .template-simple .main-column,
            .template-creative .sidebar,
            .template-creative .main-column {
                grid-template-columns: 1fr;
            }

            .template-simple .main-column > .section,
            .template-creative .main-column > .section {
                grid-column: auto;
            }

            .template-modern .portfolio-layout {
                grid-template-columns: 1fr;
            }

            .template-modern .sidebar,
            .template-modern .main-column {
                display: contents;
            }

            .template-creative .hero {
                position: relative;
                top: auto;
                bottom: auto;
                left: auto;
                width: 100%;
                height: auto;
                min-height: 0;
                padding: 28px 22px;
            }

            .template-creative .profile-photo {
                margin: 14px 0;
            }

            .template-creative .portfolio-layout {
                width: 100%;
                margin: 0;
                padding: 20px 14px;
            }

            .template-creative .sidebar,
            .template-creative .main-column {
                display: grid;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .hero {
                flex-direction: column;
            }

            .template-simple .hero {
                display: block;
                padding: 28px 18px;
            }

            .section {
                padding: 18px;
            }

            .projects-heading {
                align-items: flex-start;
            }
        }

        /* =========================================
           PRINT / SAVE AS PDF
        ========================================= */
        @media print {
            body {
                background: #fff;
                color: #222;
            }

            .toolbar {
                display: none;
            }

            .portfolio-page {
                width: 100%;
                margin: 0;
                padding: 0;
            }

            .template-creative .hero {
                position: static;
                width: 100%;
                height: auto;
                color: #222;
                background: #fff;
            }

            .template-creative .portfolio-layout {
                width: 100%;
                margin: 0;
                padding: 0;
            }

            .section,
            .project-card {
                box-shadow: none;
                break-inside: avoid;
            }
        }
    </style>
</head>

<body class="template-{{ in_array($portfolio->template, ['simple', 'modern', 'creative'], true) ? $portfolio->template : 'simple' }}">

<header class="toolbar">
    <h2 class="brand">B.O.R.N.FOLIO</h2>

    <nav class="actions" aria-label="Portfolio actions">
        <a href="{{ route('portfolios.index') }}" class="btn secondary">
            My Portfolios
        </a>

        <a href="{{ route('portfolios.edit', $portfolio) }}" class="btn">
            Edit Portfolio
        </a>
    </nav>
</header>

<div class="portfolio-page">

    <!-- PROFILE HEADER -->
    <section class="hero">
        <div class="hero-content">

            @if ($portfolio->photo)
                <img
                    src="{{ asset('storage/' . $portfolio->photo) }}"
                    alt="Profile photo of {{ $portfolio->full_name }}"
                    class="profile-photo"
                >
            @elseif ($portfolio->profile_picture)
                <img
                    src="{{ asset('storage/' . $portfolio->profile_picture) }}"
                    alt="Profile photo of {{ $portfolio->full_name }}"
                    class="profile-photo"
                >
            @else
                <div class="profile-photo profile-placeholder">
                    {{ strtoupper(substr($portfolio->full_name ?? 'U', 0, 1)) }}
                </div>
            @endif

            <span class="template-label">
                {{ ucfirst(in_array($portfolio->template, ['simple', 'modern', 'creative'], true) ? $portfolio->template : 'simple') }}
                Portfolio
            </span>

            <h1>{{ $portfolio->full_name }}</h1>

            @if ($portfolio->professional_title)
                <p class="title">{{ $portfolio->professional_title }}</p>
            @endif

            @if ($portfolio->about_me)
                <p class="hero-description">{{ $portfolio->about_me }}</p>
            @endif

            <div class="contact">
                @if ($portfolio->email)
                    <span>✉ {{ $portfolio->email }}</span>
                @endif

                @if ($portfolio->phone)
                    <span>☎ {{ $portfolio->phone }}</span>
                @endif

                @if ($portfolio->address)
                    <span>⌖ {{ $portfolio->address }}</span>
                @endif
            </div>

        </div>
    </section>

    <main class="portfolio-layout">

        <!-- SIDEBAR SECTIONS -->
        <aside class="sidebar">

            <!-- ABOUT -->
            <section class="section">
                <h2>About Me</h2>

                @if ($portfolio->about_me)
                    <p>{{ $portfolio->about_me }}</p>
                @else
                    <p class="empty">No introduction added yet.</p>
                @endif
            </section>

            <!-- EDUCATION -->
            <section class="section">
                <h2>Education</h2>

                @forelse ($portfolio->educations as $education)
                    <article class="item">
                        <h3>{{ $education->school_name }}</h3>

                        @if ($education->degree || $education->field_of_study)
                            <p>
                                {{ $education->degree }}

                                @if ($education->degree && $education->field_of_study)
                                    ·
                                @endif

                                {{ $education->field_of_study }}
                            </p>
                        @endif

                        @php
                            $educationStart = $education->start_date
                                ? \Illuminate\Support\Carbon::parse($education->start_date)->format('M Y')
                                : null;

                            $educationEnd = $education->end_date
                                ? \Illuminate\Support\Carbon::parse($education->end_date)->format('M Y')
                                : null;
                        @endphp

                        @if ($educationStart || $educationEnd)
                            <p class="muted">
                                {{ $educationStart ?? 'Start date not set' }}
                                –
                                {{ $educationEnd ?? 'Present' }}
                            </p>
                        @endif

                        @if ($education->description)
                            <p>{{ $education->description }}</p>
                        @endif
                    </article>
                @empty
                    <p class="empty">No education added yet.</p>
                @endforelse
            </section>

            <!-- SKILLS -->
            <section class="section">
                <h2>Technical Skills</h2>

                @if ($portfolio->skills->isNotEmpty())
                    <div class="skills-list">
                        @foreach ($portfolio->skills as $skill)
                            <span class="badge">
                                {{ $skill->skill_name }}

                                @if ($skill->proficiency_level)
                                    · {{ $skill->proficiency_level }}
                                @endif
                            </span>
                        @endforeach
                    </div>
                @else
                    <p class="empty">No skills added yet.</p>
                @endif
            </section>

            <!-- SOCIAL LINKS -->
            <section class="section">
                <h2>Social Links</h2>

                @forelse ($portfolio->socialLinks as $socialLink)
                    <article class="item">
                        <h3>{{ $socialLink->platform_name }}</h3>

                        @php
                            $socialScheme = $socialLink->url
                                ? parse_url($socialLink->url, PHP_URL_SCHEME)
                                : null;

                            $validSocialUrl = in_array(
                                strtolower((string) $socialScheme),
                                ['http', 'https'],
                                true
                            );
                        @endphp

                        @if ($validSocialUrl)
                            <a
                                href="{{ $socialLink->url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                Visit Profile ↗
                            </a>
                        @else
                            <p class="muted">Link not available.</p>
                        @endif
                    </article>
                @empty
                    <p class="empty">No social links added yet.</p>
                @endforelse
            </section>

        </aside>

        <!-- MAIN CONTENT -->
        <div class="main-column">

            <!-- PROJECTS -->
            <section class="section">
                <div class="projects-heading">
                    <h2>Featured Projects</h2>
                    <small>{{ $portfolio->projects->count() }} project(s)</small>
                </div>

                @if ($portfolio->projects->isNotEmpty())
                    <div class="projects-grid">
                        @foreach ($portfolio->projects as $project)
                            @php
                                $projectTitle = $project->project_title
                                    ?? $project->project_name
                                    ?? 'Untitled Project';

                                $projectTechnologies = $project->technologies_used
                                    ?? $project->technologies
                                    ?? null;

                                $projectUrl = $project->project_url;

                                $projectScheme = $projectUrl
                                    ? parse_url($projectUrl, PHP_URL_SCHEME)
                                    : null;

                                $validProjectUrl = in_array(
                                    strtolower((string) $projectScheme),
                                    ['http', 'https'],
                                    true
                                );
                            @endphp

                            <article class="project-card">
                                <h3>{{ $projectTitle }}</h3>

                                @if ($project->description)
                                    <p class="project-description">
                                        {{ $project->description }}
                                    </p>
                                @else
                                    <p class="project-description muted">
                                        No project description provided.
                                    </p>
                                @endif

                                @if ($projectTechnologies)
                                    <p class="project-tech">
                                        <strong>Technologies:</strong>
                                        {{ $projectTechnologies }}
                                    </p>
                                @endif

                                @if ($validProjectUrl)
                                    <a
                                        class="project-link"
                                        href="{{ $projectUrl }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        View Project →
                                    </a>
                                @endif
                            </article>
                        @endforeach
                    </div>
                @else
                    <p class="empty">No projects added yet.</p>
                @endif
            </section>

            <!-- WORK EXPERIENCE -->
            <section class="section">
                <h2>Work Experience</h2>

                @forelse ($portfolio->experiences as $experience)
                    <article class="item">
                        <h3>{{ $experience->job_title ?: 'Work Experience' }}</h3>

                        <p>
                            {{ $experience->company_name }}

                            @if ($experience->location)
                                · {{ $experience->location }}
                            @endif
                        </p>

                        @php
                            $experienceStart = $experience->start_date
                                ? \Illuminate\Support\Carbon::parse($experience->start_date)->format('M Y')
                                : null;

                            $experienceEnd = $experience->end_date
                                ? \Illuminate\Support\Carbon::parse($experience->end_date)->format('M Y')
                                : null;
                        @endphp

                        @if ($experienceStart || $experienceEnd)
                            <p class="muted">
                                {{ $experienceStart ?? 'Start date not set' }}
                                –
                                {{ $experience->is_current
                                    ? 'Present'
                                    : ($experienceEnd ?? 'End date not set') }}
                            </p>
                        @endif

                        @if ($experience->description)
                            <p>{{ $experience->description }}</p>
                        @endif
                    </article>
                @empty
                    <p class="empty">No work experience added yet.</p>
                @endforelse
            </section>

        </div>
    </main>
</div>

<footer class="site-footer">
    B.O.R.N.FOLIO · Personal Portfolio Builder
</footer>

</body>
</html>
