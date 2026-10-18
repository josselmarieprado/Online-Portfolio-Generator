<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Creative portfolio of {{ $portfolio->full_name }}">
    <meta name="theme-color" content="#9667E7">

    <title>{{ $portfolio->full_name }} | Creative Portfolio</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --lavender-white: #EEEAFD;
            --light-lavender: #D8CAF6;
            --soft-purple: #C2A9EF;
            --medium-purple: #AC86E8;
            --deep-purple: #9667E7;
            --ink: #302047;
            --muted: #69577F;
            --white: #FFFFFF;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 24px;
        }

        body {
            margin: 0;
            background: var(--lavender-white);
            color: var(--ink);
            font-family: Inter, "Segoe UI", Arial, sans-serif;
        }

        a {
            transition: .2s ease;
        }

        a:focus-visible {
            outline: 3px solid var(--deep-purple);
            outline-offset: 4px;
        }

        .topbar {
            position: relative;
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 16px 5%;
            background: white;
            border-bottom: 1px solid var(--light-lavender);
        }

        .brand {
            color: var(--deep-purple);
            font-size: 17px;
            font-weight: 900;
            letter-spacing: .16em;
            text-decoration: none;
        }

        .top-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 39px;
            padding: 9px 14px;
            border: 1px solid var(--light-lavender);
            border-radius: 10px;
            color: var(--deep-purple);
            background: white;
            font-size: 12px;
            font-weight: 750;
            text-decoration: none;
        }

        .button:hover {
            border-color: var(--deep-purple);
            background: var(--lavender-white);
        }

        .button-primary {
            color: white;
            background: var(--deep-purple);
            border-color: var(--deep-purple);
        }

        .button-primary:hover {
            background: #8050D2;
            color: white;
        }

        .creative-layout {
            display: grid;
            grid-template-columns: minmax(280px, 34%) minmax(0, 1fr);
            min-height: calc(100vh - 72px);
        }

        /* Large, colorful profile panel */
        .profile-panel {
            position: sticky;
            top: 0;
            display: flex;
            height: 100vh;
            max-height: 100vh;
            flex-direction: column;
            align-items: flex-start;
            overflow-y: auto;
            padding: 52px clamp(24px, 4vw, 58px);
            color: white;
            background:
                radial-gradient(circle at 10% 15%, rgba(238,234,253,.25), transparent 27%),
                radial-gradient(circle at 90% 80%, rgba(216,202,246,.24), transparent 30%),
                linear-gradient(150deg, #9667E7 0%, #8050D2 52%, #AC86E8 100%);
        }

        .profile-panel::before {
            position: absolute;
            top: 38%;
            left: -85px;
            width: 190px;
            height: 190px;
            border: 1px solid rgba(255,255,255,.20);
            border-radius: 50%;
            content: "";
            pointer-events: none;
        }

        .profile-panel::after {
            position: absolute;
            right: -80px;
            bottom: 70px;
            width: 220px;
            height: 220px;
            border: 1px solid rgba(255,255,255,.17);
            border-radius: 50%;
            content: "";
            pointer-events: none;
        }

        .profile-content {
            position: relative;
            z-index: 1;
            width: 100%;
        }

        .avatar {
            display: block;
            width: 138px;
            height: 138px;
            margin-bottom: 25px;
            object-fit: cover;
            border: 4px solid rgba(255,255,255,.9);
            border-radius: 34px;
            box-shadow: 0 18px 38px rgba(48,32,71,.24);
        }

        .avatar-placeholder {
            display: flex;
            width: 138px;
            height: 138px;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            border: 3px solid white;
            border-radius: 34px;
            background: var(--lavender-white);
            color: var(--deep-purple);
            font-size: 48px;
            font-weight: 900;
        }

        .profile-label {
            display: inline-block;
            padding: 7px 11px;
            border: 1px solid rgba(255,255,255,.45);
            border-radius: 100px;
            background: rgba(255,255,255,.14);
            color: white;
            font-size: 10px;
            font-weight: 850;
            letter-spacing: .12em;
            text-transform: uppercase;
        }

        .profile-panel h1 {
            margin: 19px 0 0;
            color: white;
            font-size: clamp(30px, 3vw, 43px);
            font-weight: 900;
            letter-spacing: -.05em;
            line-height: 1.12;
            overflow-wrap: anywhere;
        }

        .profile-subtitle {
            margin-top: 12px;
            color: #F1E9FF;
            font-size: 14px;
            font-weight: 650;
        }

        .profile-description {
            margin-top: 24px;
            padding-top: 22px;
            border-top: 1px solid rgba(255,255,255,.28);
            color: #F5F0FF;
            font-size: 13px;
            line-height: 1.9;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .contact-list {
            display: grid;
            gap: 13px;
            margin-top: 25px;
            font-size: 12px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            min-width: 0;
            color: white;
            overflow-wrap: anywhere;
        }

        .contact-item a {
            color: white;
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        .contact-item a:hover {
            text-decoration: underline;
        }

        .contact-icon {
            display: inline-flex;
            width: 27px;
            height: 27px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,.28);
            border-radius: 9px;
            background: rgba(255,255,255,.12);
        }

        .profile-bottom {
            position: relative;
            z-index: 1;
            margin-top: auto;
            padding-top: 35px;
            color: #F1E9FF;
            font-size: 11px;
            line-height: 1.8;
        }

        /* Main content area */
        .main-content {
            min-width: 0;
            padding: clamp(22px, 4vw, 52px);
            background:
                radial-gradient(ellipse at 100% 0%, rgba(194,169,239,.22), transparent 30%),
                var(--lavender-white);
        }

        .welcome-heading {
            margin-bottom: 30px;
        }

        .welcome-kicker {
            color: var(--deep-purple);
            font-size: 11px;
            font-weight: 900;
            letter-spacing: .17em;
            text-transform: uppercase;
        }

        .welcome-heading h2 {
            margin: 9px 0 0;
            color: var(--ink);
            font-size: clamp(25px, 3vw, 37px);
            font-weight: 900;
            letter-spacing: -.04em;
        }

        .welcome-heading p {
            margin-top: 10px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        .section {
            margin-top: 23px;
            padding: clamp(20px, 3vw, 29px);
            border: 1px solid var(--light-lavender);
            border-radius: 22px;
            background: rgba(255,255,255,.91);
            box-shadow: 0 10px 28px rgba(75,48,112,.045);
            scroll-margin-top: 22px;
        }

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 20px;
        }

        .heading-left {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .heading-number {
            display: flex;
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: var(--lavender-white);
            color: var(--deep-purple);
            font-size: 12px;
            font-weight: 900;
        }

        .section-heading h2 {
            margin: 0;
            color: var(--ink);
            font-size: 16px;
            font-weight: 850;
            overflow-wrap: anywhere;
        }

        .count {
            flex-shrink: 0;
            padding: 5px 9px;
            border-radius: 100px;
            background: var(--lavender-white);
            color: var(--deep-purple);
            font-size: 10px;
            font-weight: 800;
        }

        .about-copy {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.95;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        /* Creative skill blocks */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }

        .skill-card {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
            padding: 13px;
            border: 1px solid var(--light-lavender);
            border-radius: 13px;
            background: #FAF8FF;
            color: var(--ink);
            font-size: 12px;
            font-weight: 750;
            overflow-wrap: anywhere;
        }

        .skill-dot {
            width: 9px;
            height: 9px;
            flex-shrink: 0;
            border-radius: 50%;
            background: var(--deep-purple);
            box-shadow: 0 0 0 4px var(--light-lavender);
        }

        /* Project cards */
        .project-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .project-card {
            display: flex;
            min-width: 0;
            flex-direction: column;
            padding: 19px;
            border: 1px solid var(--light-lavender);
            border-radius: 17px;
            background: white;
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .project-card:nth-child(3n + 2) {
            background: #F5F0FF;
        }

        .project-card:nth-child(3n) {
            background: #FCFAFF;
        }

        .project-card:hover {
            transform: translateY(-3px);
            border-color: var(--medium-purple);
            box-shadow: 0 14px 28px rgba(75,48,112,.10);
        }

        .project-index {
            display: inline-flex;
            width: 32px;
            height: 32px;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            border-radius: 10px;
            background: var(--deep-purple);
            color: white;
            font-size: 11px;
            font-weight: 900;
        }

        .project-card h3 {
            color: var(--ink);
            font-size: 14px;
            font-weight: 850;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .project-tech {
            margin-top: 10px;
            color: var(--deep-purple);
            font-size: 11px;
            font-weight: 750;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .project-description {
            margin-top: 12px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.85;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .project-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            align-self: flex-start;
            margin-top: auto;
            padding: 10px 12px;
            border: 1px solid var(--light-lavender);
            border-radius: 10px;
            color: var(--deep-purple);
            font-size: 11px;
            font-weight: 850;
            text-decoration: none;
        }

        .project-link:hover {
            border-color: var(--deep-purple);
            background: var(--deep-purple);
            color: white;
        }

        /* Education and experience */
        .timeline {
            display: grid;
            gap: 19px;
        }

        .timeline-item {
            position: relative;
            padding: 0 0 0 17px;
            border-left: 2px solid var(--light-lavender);
        }

        .timeline-item::before {
            position: absolute;
            top: 3px;
            left: -6px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--deep-purple);
            content: "";
        }

        .timeline-item h3 {
            color: var(--ink);
            font-size: 13px;
            font-weight: 850;
            overflow-wrap: anywhere;
        }

        .timeline-item .subtext {
            margin-top: 6px;
            color: var(--deep-purple);
            font-size: 12px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .timeline-item .date {
            margin-top: 7px;
            color: #8A789D;
            font-size: 11px;
        }

        .timeline-item .description {
            margin-top: 9px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
            white-space: pre-line;
        }

        /* Social links */
        .social-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            min-width: 0;
            padding: 13px;
            border: 1px solid var(--light-lavender);
            border-radius: 12px;
            background: white;
            color: var(--ink);
            font-size: 12px;
            font-weight: 750;
            text-decoration: none;
        }

        .social-link span:first-child {
            overflow-wrap: anywhere;
        }

        .social-link:hover {
            border-color: var(--deep-purple);
            background: #F5F0FF;
            color: var(--deep-purple);
        }

        .social-arrow {
            flex-shrink: 0;
            color: var(--deep-purple);
        }

        .empty-state {
            padding: 22px;
            border: 1px dashed var(--medium-purple);
            border-radius: 14px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
            text-align: center;
        }

        .footer {
            padding: 30px 0 5px;
            color: #857394;
            font-size: 11px;
            line-height: 1.8;
            text-align: center;
        }

        .footer strong {
            color: var(--deep-purple);
            letter-spacing: .14em;
        }

        @media (min-width: 1500px) {
            .creative-layout {
                grid-template-columns: minmax(340px, 32%) minmax(0, 1fr);
            }

            .main-content {
                padding: 55px;
            }
        }

        @media (max-width: 950px) {
            .creative-layout {
                grid-template-columns: minmax(235px, 32%) minmax(0, 1fr);
            }

            .profile-panel {
                padding: 35px 24px;
            }

            .main-content {
                padding: 25px 20px;
            }

            .project-grid {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        @media (max-width: 680px) {
            .topbar {
                align-items: flex-start;
                flex-direction: column;
                padding: 15px 18px;
            }

            .top-actions {
                width: 100%;
            }

            .top-actions .button {
                flex: 1;
            }

            .creative-layout {
                grid-template-columns: minmax(0, 1fr);
            }

            .profile-panel {
                position: relative;
                height: auto;
                max-height: none;
                min-height: 0;
                padding: 34px 24px;
            }

            .avatar,
            .avatar-placeholder {
                width: 110px;
                height: 110px;
                border-radius: 27px;
            }

            .profile-panel h1 {
                font-size: 34px;
            }

            .profile-bottom {
                margin-top: 30px;
            }

            .main-content {
                padding: 20px 14px;
            }

            .welcome-heading {
                margin-bottom: 22px;
            }

            .section {
                margin-top: 15px;
                padding: 20px;
                border-radius: 17px;
            }

            .skills-grid,
            .social-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            .project-grid {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                transition: none !important;
            }
        }

        @media print {
            .topbar {
                display: none;
            }

            .creative-layout {
                display: block;
            }

            .profile-panel {
                position: relative;
                height: auto;
                max-height: none;
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            .main-content {
                background: white;
            }

            .section,
            .project-card {
                break-inside: avoid;
                box-shadow: none;
            }
        }
    </style>
</head>

<body>

    <!-- Top Navigation -->
    <nav class="topbar" aria-label="Main navigation">
        <a href="#top" class="brand">B.O.R.N.FOLIO</a>

        <div class="top-actions">
            <a href="{{ route('portfolios.index') }}" class="button">
                My Portfolios
            </a>

            <a href="{{ route('portfolios.edit', $portfolio->id) }}"
               class="button button-primary">
                Edit Portfolio ↗
            </a>
        </div>
    </nav>

    <main id="top" class="creative-layout">

        <!-- LEFT: Colorful Profile Panel -->
        <aside class="profile-panel">
            <div class="profile-content">

                @if($portfolio->profile_picture)
                    <img
                        src="{{ asset('storage/' . $portfolio->profile_picture) }}"
                        alt="Profile picture of {{ $portfolio->full_name }}"
                        class="avatar"
                    >
                @else
                    <div class="avatar-placeholder" aria-label="Profile picture placeholder">
                        {{ strtoupper(substr($portfolio->full_name ?? 'U', 0, 1)) }}
                    </div>
                @endif

                <span class="profile-label">✦ Creative Portfolio</span>

                <h1>{{ $portfolio->full_name }}</h1>

                <p class="profile-subtitle">Personal Profile & Creative Journey</p>

                @if($portfolio->about_me)
                    <div class="profile-description">
                        {{ $portfolio->about_me }}
                    </div>
                @endif

                <div class="contact-list">
                    @if($portfolio->email)
                        <div class="contact-item">
                            <span class="contact-icon" aria-hidden="true">✉</span>
                            <a href="mailto:{{ $portfolio->email }}">
                                {{ $portfolio->email }}
                            </a>
                        </div>
                    @endif

                    @if($portfolio->contact_number)
                        <div class="contact-item">
                            <span class="contact-icon" aria-hidden="true">☎</span>
                            <a href="tel:{{ $portfolio->contact_number }}">
                                {{ $portfolio->contact_number }}
                            </a>
                        </div>
                    @endif

                    @if($portfolio->address)
                        <div class="contact-item">
                            <span class="contact-icon" aria-hidden="true">⌖</span>
                            <span>{{ $portfolio->address }}</span>
                        </div>
                    @endif
                </div>

            </div>

            <div class="profile-bottom">
                <p class="font-bold text-white">A little creativity goes a long way.</p>
                <p>Express your story. Share your work. Keep growing.</p>
            </div>
        </aside>

        <!-- RIGHT: Portfolio Content -->
        <div class="main-content">

            <header class="welcome-heading">
                <span class="welcome-kicker">Discover • Create • Inspire</span>
                <h2>A collection of my journey.</h2>
                <p>
                    Explore my skills, selected projects, education,
                    and experiences in one place.
                </p>
            </header>

            <!-- About Me -->
            @if($portfolio->about_me)
                <section id="about" class="section">
                    <div class="section-heading">
                        <div class="heading-left">
                            <span class="heading-number">01</span>
                            <h2>About Me</h2>
                        </div>
                    </div>

                    <p class="about-copy">{{ $portfolio->about_me }}</p>
                </section>
            @endif

            <!-- Skills -->
            @if($portfolio->skills && count($portfolio->skills) > 0)
                <section id="skills" class="section">
                    <div class="section-heading">
                        <div class="heading-left">
                            <span class="heading-number">02</span>
                            <h2>Expertise & Skills</h2>
                        </div>

                        <span class="count">
                            {{ count($portfolio->skills) }}
                            {{ count($portfolio->skills) === 1 ? 'skill' : 'skills' }}
                        </span>
                    </div>

                    <div class="skills-grid">
                        @foreach($portfolio->skills as $skill)
                            <div class="skill-card">
                                <span class="skill-dot" aria-hidden="true"></span>
                                <span>{{ $skill->skill_name }}</span>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- Selected Projects -->
            @if($portfolio->projects && count($portfolio->projects) > 0)
                <section id="projects" class="section">
                    <div class="section-heading">
                        <div class="heading-left">
                            <span class="heading-number">03</span>
                            <h2>Selected Works</h2>
                        </div>

                        <span class="count">
                            {{ count($portfolio->projects) }}
                            {{ count($portfolio->projects) === 1 ? 'project' : 'projects' }}
                        </span>
                    </div>

                    <div class="project-grid">
                        @foreach($portfolio->projects as $project)
                            <article class="project-card">
                                <span class="project-index">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>

                                <h3>{{ $project->project_title }}</h3>

                                @if($project->technologies)
                                    <p class="project-tech">
                                        {{ $project->technologies }}
                                    </p>
                                @endif

                                @if($project->description)
                                    <p class="project-description">
                                        {{ $project->description }}
                                    </p>
                                @endif

                                @if($project->project_link)
                                    <a
                                        href="{{ $project->project_link }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="project-link"
                                    >
                                        Explore Project <span aria-hidden="true">↗</span>
                                    </a>
                                @endif
                            </article>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- Education -->
            @if($portfolio->educations && count($portfolio->educations) > 0)
                <section id="education" class="section">
                    <div class="section-heading">
                        <div class="heading-left">
                            <span class="heading-number">04</span>
                            <h2>Education</h2>
                        </div>
                    </div>

                    <div class="timeline">
                        @foreach($portfolio->educations as $edu)
                            <article class="timeline-item">
                                <h3>{{ $edu->school }}</h3>

                                @if($edu->degree)
                                    <p class="subtext">{{ $edu->degree }}</p>
                                @endif

                                @if($edu->start_year || $edu->end_year)
                                    <p class="date">
                                        {{ $edu->start_year ?: 'Start year not specified' }}
                                        –
                                        {{ $edu->end_year ?: 'Present' }}
                                    </p>
                                @endif
                            </article>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- Work Experience -->
            @if($portfolio->experiences && count($portfolio->experiences) > 0)
                <section id="experience" class="section">
                    <div class="section-heading">
                        <div class="heading-left">
                            <span class="heading-number">05</span>
                            <h2>Experience</h2>
                        </div>
                    </div>

                    <div class="timeline">
                        @foreach($portfolio->experiences as $exp)
                            <article class="timeline-item">
                                <h3>{{ $exp->job_title }}</h3>

                                @if($exp->company)
                                    <p class="subtext">{{ $exp->company }}</p>
                                @endif

                                <p class="date">
                                    {{ $exp->start_date ?: 'Start date not specified' }}
                                    –
                                    {{ $exp->end_date ?: 'Present' }}
                                </p>

                                @if($exp->description)
                                    <p class="description">{{ $exp->description }}</p>
                                @endif
                            </article>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- Social Links -->
            @if($portfolio->socials && count($portfolio->socials) > 0)
                <section id="social-links" class="section">
                    <div class="section-heading">
                        <div class="heading-left">
                            <span class="heading-number">06</span>
                            <h2>Find Me Online</h2>
                        </div>
                    </div>

                    <div class="social-grid">
                        @foreach($portfolio->socials as $social)
                            <a
                                href="{{ $social->url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="social-link"
                            >
                                <span>{{ ucfirst($social->platform) }}</span>
                                <span class="social-arrow" aria-hidden="true">↗</span>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif

            <!-- Empty-state message if no content has been added -->
            @if(
                (!$portfolio->skills || count($portfolio->skills) === 0) &&
                (!$portfolio->projects || count($portfolio->projects) === 0) &&
                (!$portfolio->educations || count($portfolio->educations) === 0) &&
                (!$portfolio->experiences || count($portfolio->experiences) === 0) &&
                (!$portfolio->socials || count($portfolio->socials) === 0)
            )
                <section class="section">
                    <div class="empty-state">
                        <p class="mb-2 font-bold">Your creative journey starts here.</p>
                        <p>Add your skills, projects, education, or experience to showcase more of your story.</p>
                    </div>
                </section>
            @endif

            <footer class="footer">
                <p><strong>B.O.R.N.FOLIO</strong></p>
                <p>Personal Portfolio Builder</p>
                <p>Designed to express your individuality.</p>

                <a href="#top" class="mt-3 inline-block font-bold text-purple-700 hover:text-purple-950">
                    Back to top ↑
                </a>
            </footer>

        </div>
    </main>

</body>
</html>
