<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#EEEAFD">
    <title>{{ $portfolio->full_name }} - Simple Portfolio</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --lavender-white: #EEEAFD;
            --light-lavender: #D8CAF6;
            --soft-purple: #C2A9EF;
            --medium-purple: #AC86E8;
            --deep-purple: #9667E7;
            --text-dark: #292044;
            --text-muted: #71658D;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: var(--lavender-white);
            color: var(--text-dark);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system,
                BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .page-background {
            background:
                radial-gradient(ellipse at top left, #ffffff 0%, transparent 48%),
                linear-gradient(145deg, #EEEAFD 0%, #F7F4FF 55%, #D8CAF6 100%);
        }

        .main-card {
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(194, 169, 239, 0.55);
            border-radius: 22px;
            box-shadow: 0 12px 35px rgba(91, 62, 145, 0.07);
        }

        .section-card {
            min-width: 0;
            padding: 24px;
            background: rgba(255, 255, 255, 0.90);
            border: 1px solid #D8CAF6;
            border-radius: 18px;
            box-shadow: 0 5px 18px rgba(91, 62, 145, 0.045);
            transition: border-color 0.2s ease, transform 0.2s ease;
            scroll-margin-top: 24px;
        }

        .section-card:hover {
            border-color: var(--medium-purple);
            transform: translateY(-2px);
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 0 18px;
            font-size: 1.05rem;
            font-weight: 750;
            letter-spacing: -0.02em;
            color: var(--text-dark);
        }

        .section-title::before {
            content: "";
            width: 5px;
            height: 24px;
            flex-shrink: 0;
            border-radius: 10px;
            background: linear-gradient(
                180deg,
                var(--soft-purple),
                var(--deep-purple)
            );
        }

        .muted {
            color: var(--text-muted);
        }

        .profile-picture {
            width: 112px;
            height: 112px;
            flex-shrink: 0;
            object-fit: cover;
            border: 4px solid white;
            outline: 2px solid var(--soft-purple);
            border-radius: 28px;
            box-shadow: 0 8px 22px rgba(91, 62, 145, 0.14);
        }

        .primary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 17px;
            border: 1px solid var(--deep-purple);
            border-radius: 12px;
            background: var(--deep-purple);
            color: white;
            font-size: 0.82rem;
            font-weight: 700;
            text-decoration: none;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .primary-button:hover {
            background: #8050D2;
            transform: translateY(-1px);
        }

        .secondary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border: 1px solid var(--light-lavender);
            border-radius: 12px;
            background: white;
            color: var(--text-dark);
            font-size: 0.82rem;
            font-weight: 650;
            text-decoration: none;
            transition: border-color 0.2s ease, background 0.2s ease;
        }

        .secondary-button:hover {
            background: var(--lavender-white);
            border-color: var(--medium-purple);
        }

        .skill-tag {
            display: inline-flex;
            align-items: center;
            padding: 8px 12px;
            border: 1px solid #D8CAF6;
            border-radius: 10px;
            background: #F3EEFF;
            color: #6845A5;
            font-size: 0.8rem;
            font-weight: 650;
        }

        .project-card {
            padding: 18px;
            border: 1px solid #E2D8F8;
            border-radius: 14px;
            background: linear-gradient(145deg, #FFFFFF, #F8F5FF);
        }

        .project-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 12px;
            color: #8050D2;
            font-size: 0.84rem;
            font-weight: 750;
            text-decoration: none;
        }

        .project-link:hover,
        .social-link:hover {
            text-decoration: underline;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            padding: 9px 12px;
            border: 1px solid #D8CAF6;
            border-radius: 10px;
            background: white;
            color: #6845A5;
            font-size: 0.83rem;
            font-weight: 650;
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        .contact-item {
            overflow-wrap: anywhere;
            word-break: break-word;
        }

        a:focus-visible {
            outline: 3px solid var(--medium-purple);
            outline-offset: 4px;
        }

        @media (max-width: 640px) {
            .section-card {
                padding: 19px;
            }

            .profile-picture {
                width: 92px;
                height: 92px;
                border-radius: 23px;
            }

            .main-card {
                border-radius: 17px;
            }
        }

        @media print {
            body,
            .page-background {
                background: white !important;
            }

            .main-card,
            .section-card {
                box-shadow: none;
                break-inside: avoid;
            }

            .no-print {
                display: none !important;
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

<body class="page-background min-h-screen">

    <!-- Top Navigation -->
    <nav class="no-print border-b border-purple-200/70 bg-white/80 backdrop-blur-md">
        <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-5 py-4 sm:px-8">

            <a href="#top"
               class="text-lg font-extrabold tracking-[0.16em] text-purple-700"
               style="text-decoration:none">
                B.O.R.N.FOLIO
            </a>

            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('portfolios.index') }}"
                   class="secondary-button">
                    My Portfolios
                </a>

                <a href="{{ route('portfolios.edit', $portfolio->id) }}"
                   class="primary-button">
                    Edit Portfolio
                    <span aria-hidden="true">↗</span>
                </a>
            </div>
        </div>
    </nav>

    <main id="top" class="mx-auto max-w-6xl px-4 py-7 sm:px-8 sm:py-10">

        <!-- Profile Header -->
        <header class="main-card relative mb-6 overflow-hidden p-6 sm:p-9">

            <div aria-hidden="true"
                 class="pointer-events-none absolute -right-16 -top-20 h-56 w-56 rounded-full opacity-60"
                 style="background:radial-gradient(circle, #D8CAF6 0%, #EEEAFD 65%, transparent 72%)">
            </div>

            <div class="relative flex flex-col items-start gap-6 sm:flex-row sm:items-center">

                @if($portfolio->profile_picture)
                    <img
                        src="{{ asset('storage/' . $portfolio->profile_picture) }}"
                        alt="Profile picture of {{ $portfolio->full_name }}"
                        class="profile-picture"
                    >
                @else
                    <div
                        class="flex h-24 w-24 shrink-0 items-center justify-center rounded-3xl text-3xl font-bold text-purple-800 sm:h-28 sm:w-28"
                        style="background:linear-gradient(135deg,#D8CAF6,#AC86E8)"
                        aria-label="Profile picture placeholder"
                    >
                        {{ strtoupper(substr($portfolio->full_name ?? 'U', 0, 1)) }}
                    </div>
                @endif

                <div class="relative min-w-0 flex-1">
                    <span class="mb-3 inline-flex rounded-full border border-purple-200 px-3 py-1 text-xs font-bold uppercase tracking-wider text-purple-700"
                          style="background:#F3EEFF">
                        Personal Portfolio
                    </span>

                    <h1 class="mt-1 break-words text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        {{ $portfolio->full_name }}
                    </h1>

                    <p class="muted mt-2 text-sm font-medium">
                        Personal Profile
                    </p>

                    <div class="mt-5 flex flex-wrap gap-x-5 gap-y-3 text-sm muted">

                        @if($portfolio->email)
                            <a href="mailto:{{ $portfolio->email }}"
                               class="contact-item hover:text-purple-700">
                                <span aria-hidden="true">✉</span>
                                {{ $portfolio->email }}
                            </a>
                        @endif

                        @if($portfolio->contact_number)
                            <a href="tel:{{ $portfolio->contact_number }}"
                               class="contact-item hover:text-purple-700">
                                <span aria-hidden="true">☎</span>
                                {{ $portfolio->contact_number }}
                            </a>
                        @endif

                        @if($portfolio->address)
                            <span class="contact-item">
                                <span aria-hidden="true">⌖</span>
                                {{ $portfolio->address }}
                            </span>
                        @endif

                    </div>
                </div>
            </div>

            @if($portfolio->about_me)
                <div class="relative mt-7 border-t border-purple-100 pt-6">
                    <h2 class="mb-2 text-sm font-bold uppercase tracking-wider text-purple-700">
                        A little about me
                    </h2>
                    <p class="max-w-4xl whitespace-pre-line text-sm leading-7 text-gray-700">{{ $portfolio->about_me }}</p>
                </div>
            @endif
        </header>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 items-start gap-5 lg:grid-cols-3">

            <!-- Left Column -->
            <div class="space-y-5 lg:col-span-1">

                <!-- Education -->
                @if($portfolio->educations && count($portfolio->educations) > 0)
                    <section id="education" class="section-card">
                        <h2 class="section-title">Education</h2>

                        <div class="space-y-5">
                            @foreach($portfolio->educations as $edu)
                                <article class="border-l-2 border-purple-300 pl-4">
                                    <h3 class="break-words font-bold text-gray-900">
                                        {{ $edu->school }}
                                    </h3>

                                    @if($edu->degree)
                                        <p class="mt-1 text-sm leading-6 text-gray-700">
                                            {{ $edu->degree }}
                                        </p>
                                    @endif

                                    @if($edu->start_year || $edu->end_year)
                                        <p class="muted mt-2 text-xs">
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

                <!-- Skills -->
                @if($portfolio->skills && count($portfolio->skills) > 0)
                    <section id="skills" class="section-card">
                        <h2 class="section-title">Skills & Strengths</h2>

                        <div class="flex flex-wrap gap-2">
                            @foreach($portfolio->skills as $skill)
                                <span class="skill-tag">
                                    {{ $skill->skill_name }}
                                </span>
                            @endforeach
                        </div>
                    </section>
                @endif

                <!-- Social Links -->
                @if($portfolio->socials && count($portfolio->socials) > 0)
                    <section id="social-links" class="section-card">
                        <h2 class="section-title">Find Me Online</h2>

                        <div class="flex flex-col items-start gap-3">
                            @foreach($portfolio->socials as $social)
                                <a
                                    href="{{ $social->url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="social-link max-w-full"
                                >
                                    {{ ucfirst($social->platform) }}
                                    <span aria-hidden="true">↗</span>
                                </a>
                            @endforeach
                        </div>
                    </section>
                @endif

            </div>

            <!-- Right Column -->
            <div class="space-y-5 lg:col-span-2">

                <!-- Projects -->
                @if($portfolio->projects && count($portfolio->projects) > 0)
                    <section id="projects" class="section-card">
                        <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                            <h2 class="section-title mb-0">Featured Projects</h2>

                            <span class="rounded-full px-3 py-1 text-xs font-bold text-purple-700"
                                  style="background:#F3EEFF">
                                {{ count($portfolio->projects) }}
                                {{ count($portfolio->projects) === 1 ? 'project' : 'projects' }}
                            </span>
                        </div>

                        <div class="space-y-4">
                            @foreach($portfolio->projects as $project)
                                <article class="project-card">
                                    <h3 class="break-words text-base font-bold text-gray-900">
                                        {{ $project->project_title }}
                                    </h3>

                                    @if($project->technologies)
                                        <p class="mt-3 text-sm leading-6 text-purple-800">
                                            <span class="font-bold">Technologies:</span>
                                            {{ $project->technologies }}
                                        </p>
                                    @endif

                                    @if($project->description)
                                        <p class="mt-3 whitespace-pre-line text-sm leading-7 text-gray-700">{{ $project->description }}</p>
                                    @endif

                                    @if($project->project_link)
                                        <a
                                            href="{{ $project->project_link }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="project-link"
                                        >
                                            View Project
                                            <span aria-hidden="true">↗</span>
                                        </a>
                                    @endif
                                </article>
                            @endforeach
                        </div>
                    </section>
                @endif

                <!-- Work Experience -->
                @if($portfolio->experiences && count($portfolio->experiences) > 0)
                    <section id="experience" class="section-card">
                        <h2 class="section-title">Work Experience</h2>

                        <div class="space-y-5">
                            @foreach($portfolio->experiences as $exp)
                                <article class="border-l-2 border-purple-300 pl-4">
                                    <h3 class="break-words font-bold text-gray-900">
                                        {{ $exp->job_title }}
                                        @if($exp->company)
                                            <span class="font-medium text-gray-600">
                                                at {{ $exp->company }}
                                            </span>
                                        @endif
                                    </h3>

                                    <p class="muted mt-2 text-xs">
                                        {{ $exp->start_date ?: 'Start date not specified' }}
                                        –
                                        {{ $exp->end_date ?: 'Present' }}
                                    </p>

                                    @if($exp->description)
                                        <p class="mt-3 whitespace-pre-line text-sm leading-7 text-gray-700">{{ $exp->description }}</p>
                                    @endif
                                </article>
                            @endforeach
                        </div>
                    </section>
                @endif

                <!-- Empty State -->
                @if(
                    (!$portfolio->educations || count($portfolio->educations) === 0) &&
                    (!$portfolio->skills || count($portfolio->skills) === 0) &&
                    (!$portfolio->projects || count($portfolio->projects) === 0) &&
                    (!$portfolio->experiences || count($portfolio->experiences) === 0) &&
                    (!$portfolio->socials || count($portfolio->socials) === 0)
                )
                    <section class="section-card text-center">
                        <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl text-2xl"
                             style="background:#EEEAFD">
                            ✦
                        </div>

                        <h2 class="text-lg font-bold text-gray-900">
                            Your portfolio starts here
                        </h2>

                        <p class="muted mt-2 text-sm leading-6">
                            Add your education, skills, projects, and experience
                            to make your portfolio more complete.
                        </p>

                        <a href="{{ route('portfolios.edit', $portfolio->id) }}"
                           class="primary-button mt-5">
                            Complete My Portfolio
                        </a>
                    </section>
                @endif

            </div>
        </div>

        <!-- Footer -->
        <footer class="py-8 text-center">
            <p class="text-xs font-semibold tracking-wide text-purple-700">
                B.O.R.N.FOLIO
            </p>
            <p class="muted mt-1 text-xs">
                Your story. Your skills. Your future.
            </p>
            <a href="#top"
               class="no-print mt-3 inline-block text-xs font-semibold text-purple-700 hover:underline">
                Back to top ↑
            </a>
        </footer>

    </main>
</body>
</html>