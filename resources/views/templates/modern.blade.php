<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#17112B">
    <meta name="description" content="Personal portfolio of {{ $portfolio->full_name }}">

    <title>{{ $portfolio->full_name }} | Modern Portfolio</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --lavender-white: #EEEAFD;
            --light-lavender: #D8CAF6;
            --soft-purple: #C2A9EF;
            --medium-purple: #AC86E8;
            --deep-purple: #9667E7;

            --dark-bg: #17112B;
            --dark-panel: #211939;
            --dark-card: #2A2143;
            --dark-border: #44335F;
            --dark-text: #F5F0FF;
            --dark-muted: #C3B5DF;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 25px;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--dark-bg);
            color: var(--dark-text);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system,
                BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        a {
            transition: color .2s ease, background .2s ease,
                border-color .2s ease, transform .2s ease;
        }

        a:focus-visible {
            outline: 3px solid var(--soft-purple);
            outline-offset: 4px;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 20;
            display: flex;
            width: 250px;
            flex-direction: column;
            overflow-y: auto;
            padding: 30px 20px;
            background:
                radial-gradient(circle at top left, #38265D 0%, transparent 48%),
                var(--dark-panel);
            border-right: 1px solid var(--dark-border);
        }

        .brand {
            color: var(--soft-purple);
            font-size: 17px;
            font-weight: 900;
            letter-spacing: .16em;
            text-decoration: none;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border: 1px solid transparent;
            border-radius: 12px;
            color: var(--dark-muted);
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: linear-gradient(100deg, #9667E7, #AC86E8);
            color: #fff;
            border-color: #AC86E8;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 28px;
            color: var(--dark-muted);
            font-size: 12px;
            line-height: 1.8;
        }

        .main-area {
            min-width: 0;
            margin-left: 250px;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            min-height: 72px;
            padding: 14px 34px;
            background: rgba(23, 17, 43, .90);
            border-bottom: 1px solid var(--dark-border);
            backdrop-filter: blur(16px);
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 40px;
            padding: 10px 16px;
            border: 1px solid var(--dark-border);
            border-radius: 11px;
            font-size: 13px;
            font-weight: 750;
            text-decoration: none;
        }

        .button-outline {
            background: var(--dark-panel);
            color: var(--dark-text);
        }

        .button-outline:hover {
            border-color: var(--medium-purple);
            background: var(--dark-card);
        }

        .button-primary {
            border-color: var(--deep-purple);
            background: var(--deep-purple);
            color: white;
        }

        .button-primary:hover {
            background: #8050D2;
            transform: translateY(-1px);
        }

        .content {
            width: 100%;
            max-width: 1450px;
            margin: 0 auto;
            padding: 30px 34px 20px;
        }

        .hero {
            position: relative;
            display: grid;
            grid-template-columns: auto minmax(0, 1fr);
            align-items: center;
            gap: 27px;
            overflow: hidden;
            padding: 34px;
            border: 1px solid var(--dark-border);
            border-radius: 24px;
            background:
                radial-gradient(ellipse at 100% 0%, #49336F 0%, transparent 42%),
                linear-gradient(125deg, #211939, #19142F 80%);
        }

        .hero::after {
            position: absolute;
            right: -70px;
            bottom: -125px;
            width: 250px;
            height: 250px;
            border: 1px solid rgba(194, 169, 239, .22);
            border-radius: 50%;
            content: "";
            pointer-events: none;
        }

        .avatar {
            width: 132px;
            height: 132px;
            flex-shrink: 0;
            object-fit: cover;
            border: 4px solid var(--dark-panel);
            outline: 2px solid var(--medium-purple);
            border-radius: 28px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .25);
        }

        .avatar-placeholder {
            display: flex;
            width: 132px;
            height: 132px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--medium-purple);
            border-radius: 28px;
            background: linear-gradient(135deg, #D8CAF6, #9667E7);
            color: #211939;
            font-size: 44px;
            font-weight: 900;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 11px;
            border: 1px solid #654A91;
            border-radius: 100px;
            background: rgba(150, 103, 231, .16);
            color: var(--soft-purple);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        .hero h1 {
            margin: 12px 0 0;
            overflow-wrap: anywhere;
            color: white;
            font-size: clamp(28px, 3vw, 42px);
            font-weight: 850;
            letter-spacing: -.045em;
            line-height: 1.15;
        }

        .hero-subtitle {
            margin-top: 9px;
            color: var(--soft-purple);
            font-size: 15px;
            font-weight: 650;
        }

        .contact-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 18px;
            margin-top: 18px;
            color: var(--dark-muted);
            font-size: 12px;
        }

        .contact-list a {
            overflow-wrap: anywhere;
            color: var(--dark-muted);
            text-decoration: none;
        }

        .contact-list a:hover {
            color: white;
        }

        .hero-about {
            position: relative;
            z-index: 1;
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid rgba(194, 169, 239, .20);
            color: var(--dark-muted);
            font-size: 13px;
            line-height: 1.9;
            white-space: pre-line;
        }

        .hero-about strong {
            display: block;
            margin-bottom: 6px;
            color: var(--dark-text);
            font-size: 13px;
        }

        .section-heading {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 19px;
        }

        .section-heading h2 {
            margin: 0;
            color: var(--dark-text);
            font-size: 18px;
            font-weight: 800;
            letter-spacing: -.02em;
        }

        .section-count {
            padding: 5px 10px;
            border: 1px solid var(--dark-border);
            border-radius: 100px;
            background: var(--dark-panel);
            color: var(--soft-purple);
            font-size: 11px;
            font-weight: 700;
        }

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.15fr) minmax(0, .85fr);
            align-items: start;
            gap: 20px;
            margin-top: 22px;
        }

        .column {
            display: grid;
            min-width: 0;
            gap: 20px;
        }

        .panel {
            min-width: 0;
            padding: 25px;
            border: 1px solid var(--dark-border);
            border-radius: 19px;
            background: var(--dark-panel);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
            scroll-margin-top: 95px;
        }

        .panel-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 0 20px;
            color: var(--dark-text);
            font-size: 16px;
            font-weight: 800;
        }

        .panel-icon {
            display: inline-flex;
            width: 35px;
            height: 35px;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            border: 1px solid #654A91;
            border-radius: 11px;
            background: #33244D;
            color: var(--soft-purple);
            font-size: 16px;
        }

        .body-copy {
            color: var(--dark-muted);
            font-size: 13px;
            line-height: 1.9;
            overflow-wrap: anywhere;
            white-space: pre-line;
        }

        .project-list {
            display: grid;
            gap: 14px;
        }

        .project-card {
            min-width: 0;
            padding: 19px;
            border: 1px solid var(--dark-border);
            border-radius: 15px;
            background: linear-gradient(130deg, #2B2144, #241B3B);
            transition: border-color .2s ease, transform .2s ease;
        }

        .project-card:hover {
            transform: translateY(-2px);
            border-color: var(--medium-purple);
        }

        .project-card h3 {
            margin: 0;
            color: white;
            font-size: 15px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .technology {
            margin-top: 12px;
            color: var(--soft-purple);
            font-size: 12px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .project-description {
            margin-top: 12px;
            color: var(--dark-muted);
            font-size: 12px;
            line-height: 1.9;
            overflow-wrap: anywhere;
            white-space: pre-line;
        }

        .project-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 16px;
            padding: 9px 12px;
            border: 1px solid #654A91;
            border-radius: 10px;
            background: rgba(150, 103, 231, .13);
            color: var(--soft-purple);
            font-size: 12px;
            font-weight: 750;
            text-decoration: none;
        }

        .project-link:hover {
            background: var(--deep-purple);
            color: white;
        }

        .timeline {
            display: grid;
            gap: 21px;
        }

        .timeline-item {
            position: relative;
            min-width: 0;
            padding-left: 19px;
            border-left: 2px solid #654A91;
        }

        .timeline-item::before {
            position: absolute;
            top: 4px;
            left: -6px;
            width: 10px;
            height: 10px;
            border: 2px solid var(--dark-panel);
            border-radius: 50%;
            background: var(--medium-purple);
            content: "";
        }

        .timeline-item h3 {
            margin: 0;
            color: white;
            font-size: 14px;
            font-weight: 750;
            overflow-wrap: anywhere;
        }

        .timeline-item .subtext {
            margin-top: 6px;
            color: var(--soft-purple);
            font-size: 12px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .timeline-item .date {
            margin-top: 7px;
            color: var(--dark-muted);
            font-size: 11px;
        }

        .timeline-item .description {
            margin-top: 10px;
            color: var(--dark-muted);
            font-size: 12px;
            line-height: 1.8;
            white-space: pre-line;
        }

        .skill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .skill-tag {
            display: inline-flex;
            padding: 8px 11px;
            border: 1px solid #654A91;
            border-radius: 9px;
            background: #33244D;
            color: var(--light-lavender);
            font-size: 12px;
            font-weight: 650;
            overflow-wrap: anywhere;
        }

        .social-list {
            display: grid;
            gap: 10px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 13px;
            border: 1px solid var(--dark-border);
            border-radius: 11px;
            background: var(--dark-card);
            color: var(--dark-muted);
            font-size: 12px;
            font-weight: 650;
            text-decoration: none;
        }

        .social-link span:first-child {
            overflow-wrap: anywhere;
        }

        .social-link:hover {
            border-color: var(--medium-purple);
            color: white;
        }

        .empty-state {
            padding: 25px 18px;
            border: 1px dashed #654A91;
            border-radius: 13px;
            color: var(--dark-muted);
            font-size: 13px;
            line-height: 1.8;
            text-align: center;
        }

        .footer {
            padding: 28px 0 12px;
            color: var(--dark-muted);
            font-size: 11px;
            text-align: center;
        }

        .footer strong {
            display: block;
            margin-bottom: 5px;
            color: var(--soft-purple);
            letter-spacing: .14em;
        }

        .mobile-brand {
            display: none;
        }

        @media (max-width: 1100px) {
            .sidebar {
                width: 215px;
                padding: 25px 14px;
            }

            .main-area {
                margin-left: 215px;
            }

            .content {
                padding: 24px 22px 15px;
            }

            .hero {
                padding: 26px;
            }

            .content-grid {
                grid-template-columns: minmax(0, 1fr);
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                position: static;
                width: 100%;
                padding: 16px 18px;
                border-right: 0;
                border-bottom: 1px solid var(--dark-border);
            }

            .sidebar-bottom {
                display: none;
            }

            .sidebar nav {
                display: flex;
                gap: 7px;
                overflow-x: auto;
                padding: 14px 0 2px;
            }

            .sidebar-link {
                flex-shrink: 0;
                padding: 9px 12px;
                font-size: 12px;
            }

            .main-area {
                margin-left: 0;
            }

            .topbar {
                position: static;
                justify-content: flex-start;
                min-height: auto;
                padding: 14px 18px;
            }

            .content {
                padding: 18px 14px;
            }

            .hero {
                grid-template-columns: minmax(0, 1fr);
                gap: 19px;
                padding: 23px;
                border-radius: 19px;
            }

            .avatar,
            .avatar-placeholder {
                width: 100px;
                height: 100px;
                border-radius: 23px;
            }

            .hero h1 {
                font-size: 30px;
            }

            .content-grid {
                gap: 15px;
                margin-top: 15px;
            }

            .column {
                gap: 15px;
            }

            .panel {
                padding: 20px;
                border-radius: 16px;
            }
        }

        @media print {
            body {
                background: white !important;
                color: #222 !important;
            }

            .sidebar,
            .topbar {
                display: none !important;
            }

            .main-area {
                margin: 0;
            }

            .hero,
            .panel,
            .project-card {
                background: white !important;
                color: #222 !important;
                border-color: #ddd !important;
                box-shadow: none !important;
                break-inside: avoid;
            }

            .hero h1,
            .panel-title,
            .project-card h3,
            .timeline-item h3 {
                color: #222 !important;
            }

            .body-copy,
            .project-description,
            .timeline-item .description,
            .timeline-item .date,
            .contact-list,
            .hero-about {
                color: #444 !important;
            }

            .content-grid {
                grid-template-columns: 1fr 1fr;
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
    </style>
</head>

<body>

    <!-- Sidebar Navigation -->
    <aside class="sidebar">
        <a href="#top" class="brand">B.O.R.N.FOLIO</a>

        <p class="mt-8 mb-3 px-3 text-xs font-bold uppercase tracking-widest text-purple-300">
            Portfolio Menu
        </p>

        <nav class="grid gap-2" aria-label="Portfolio navigation">
            <a href="#top" class="sidebar-link active">
                <span aria-hidden="true">⌂</span> Profile
            </a>
            <a href="#about" class="sidebar-link">
                <span aria-hidden="true">✧</span> About Me
            </a>
            <a href="#projects" class="sidebar-link">
                <span aria-hidden="true">▣</span> Projects
            </a>
            <a href="#experience" class="sidebar-link">
                <span aria-hidden="true">▤</span> Experience
            </a>
            <a href="#education" class="sidebar-link">
                <span aria-hidden="true">⌂</span> Education
            </a>
            <a href="#skills" class="sidebar-link">
                <span aria-hidden="true">✳</span> Skills
            </a>
            <a href="#social-links" class="sidebar-link">
                <span aria-hidden="true">↗</span> Social Links
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div class="mb-3 text-2xl text-purple-300" aria-hidden="true">✦</div>
            <p class="font-bold text-white">Create. Learn. Grow.</p>
            <p>Showcase your journey, one project at a time.</p>
        </div>
    </aside>

    <!-- Main Page -->
    <div class="main-area">

        <!-- Top Actions -->
        <header class="topbar">
            <a href="{{ route('portfolios.index') }}" class="button button-outline">
                My Portfolios
            </a>

            <a href="{{ route('portfolios.edit', $portfolio->id) }}"
               class="button button-primary">
                Edit Portfolio <span aria-hidden="true">↗</span>
            </a>
        </header>

        <main id="top" class="content">

            <!-- Profile Hero -->
            <section class="hero">

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

                <div class="min-w-0">
                    <span class="eyebrow">✦ Modern Portfolio</span>

                    <h1>{{ $portfolio->full_name }}</h1>

                    <p class="hero-subtitle">Personal Profile</p>

                    <div class="contact-list">
                        @if($portfolio->email)
                            <a href="mailto:{{ $portfolio->email }}">
                                ✉ {{ $portfolio->email }}
                            </a>
                        @endif

                        @if($portfolio->contact_number)
                            <a href="tel:{{ $portfolio->contact_number }}">
                                ☎ {{ $portfolio->contact_number }}
                            </a>
                        @endif

                        @if($portfolio->address)
                            <span>⌖ {{ $portfolio->address }}</span>
                        @endif
                    </div>
                </div>

                @if($portfolio->about_me)
                    <div id="about" class="hero-about" style="grid-column: 1 / -1;">
                        <strong>About Me</strong>
                        {{ $portfolio->about_me }}
                    </div>
                @endif

            </section>

            <!-- Main Content -->
            <div class="content-grid">

                <!-- Left Column: Projects and Experience -->
                <div class="column">

                    <!-- Projects -->
                    @if($portfolio->projects && count($portfolio->projects) > 0)
                        <section id="projects" class="panel">
                            <div class="section-heading">
                                <h2>Featured Projects</h2>

                                <span class="section-count">
                                    {{ count($portfolio->projects) }}
                                    {{ count($portfolio->projects) === 1 ? 'project' : 'projects' }}
                                </span>
                            </div>

                            <div class="project-list">
                                @foreach($portfolio->projects as $project)
                                    <article class="project-card">
                                        <h3>{{ $project->project_title }}</h3>

                                        @if($project->technologies)
                                            <p class="technology">
                                                <strong>Technologies:</strong>
                                                {{ $project->technologies }}
                                            </p>
                                        @endif

                                        @if($project->description)
                                            <p class="project-description">{{ $project->description }}</p>
                                        @endif

                                        @if($project->project_link)
                                            <a
                                                href="{{ $project->project_link }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="project-link"
                                            >
                                                View Project <span aria-hidden="true">↗</span>
                                            </a>
                                        @endif
                                    </article>
                                @endforeach
                            </div>
                        </section>
                    @endif

                    <!-- Experience -->
                    @if($portfolio->experiences && count($portfolio->experiences) > 0)
                        <section id="experience" class="panel">
                            <h2 class="panel-title">
                                <span class="panel-icon" aria-hidden="true">▤</span>
                                Work Experience
                            </h2>

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

                    <!-- Empty State -->
                    @if(
                        (!$portfolio->projects || count($portfolio->projects) === 0) &&
                        (!$portfolio->experiences || count($portfolio->experiences) === 0)
                    )
                        <section class="panel">
                            <h2 class="panel-title">Your Journey</h2>
                            <div class="empty-state">
                                Your projects and experience will appear here
                                when you add them to your portfolio.
                            </div>
                        </section>
                    @endif

                </div>

                <!-- Right Column: Skills, Education and Social -->
                <div class="column">

                    <!-- Skills -->
                    @if($portfolio->skills && count($portfolio->skills) > 0)
                        <section id="skills" class="panel">
                            <h2 class="panel-title">
                                <span class="panel-icon" aria-hidden="true">✳</span>
                                Skills & Technologies
                            </h2>

                            <div class="skill-list">
                                @foreach($portfolio->skills as $skill)
                                    <span class="skill-tag">
                                        {{ $skill->skill_name }}
                                    </span>
                                @endforeach
                            </div>
                        </section>
                    @endif

                    <!-- Education -->
                    @if($portfolio->educations && count($portfolio->educations) > 0)
                        <section id="education" class="panel">
                            <h2 class="panel-title">
                                <span class="panel-icon" aria-hidden="true">⌂</span>
                                Education
                            </h2>

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

                    <!-- Social Links -->
                    @if($portfolio->socials && count($portfolio->socials) > 0)
                        <section id="social-links" class="panel">
                            <h2 class="panel-title">
                                <span class="panel-icon" aria-hidden="true">↗</span>
                                Let's Connect
                            </h2>

                            <div class="social-list">
                                @foreach($portfolio->socials as $social)
                                    <a
                                        href="{{ $social->url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="social-link"
                                    >
                                        <span>{{ ucfirst($social->platform) }}</span>
                                        <span aria-hidden="true">↗</span>
                                    </a>
                                @endforeach
                            </div>
                        </section>
                    @endif

                </div>
            </div>

            <!-- Footer -->
            <footer class="footer">
                <strong>B.O.R.N.FOLIO</strong>
                <p>Modern Portfolio · Create. Learn. Grow.</p>
                <a href="#top" class="mt-3 inline-block text-purple-300 hover:text-white">
                    Back to top ↑
                </a>
            </footer>

        </main>
    </div>

</body>
</html>