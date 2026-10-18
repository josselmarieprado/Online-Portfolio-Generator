@extends('layouts.app')

@section('title', 'Manage Portfolios | B.O.R.N.FOLIO')

@section('meta_description', 'Manage your saved portfolios with B.O.R.N.FOLIO.')

@push('styles')
<style>
    :root {
        --lavender-light: #EEEAFD;
        --lavender-soft: #D8CAF6;
        --lavender-medium: #C2A9EF;
        --lavender-purple: #AC88E8;
        --lavender-deep: #9667DE;

        --text: #29213B;
        --muted: #756B88;
        --surface: #FFFFFF;
        --border: #E5DCF5;
        --danger: #DC4660;
    }

    * {
        box-sizing: border-box;
    }

    .dashboard {
        width: 100%;
        min-height: calc(100vh - 70px);
        padding: 36px 24px 60px;
        background:
            radial-gradient(
                circle at 100% 0%,
                rgba(194, 169, 239, 0.28),
                transparent 34%
            ),
            var(--lavender-light);
        color: var(--text);
    }

    .dashboard-container {
        width: 100%;
        max-width: 1180px;
        margin: 0 auto;
    }

    /* PAGE HEADER */

    .section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 18px;
        margin-bottom: 28px;
    }

    .section-heading h1 {
        margin: 0 0 9px;
        color: var(--text);
        font-size: 32px;
        font-weight: 800;
        letter-spacing: -0.8px;
    }

    .section-heading p {
        margin: 0;
        color: var(--muted);
        font-size: 14px;
        line-height: 1.7;
    }

    .new-portfolio-btn {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 9px;
        padding: 13px 20px;
        border: 1px solid var(--lavender-deep);
        border-radius: 11px;
        background: var(--lavender-deep);
        color: #FFFFFF;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
        box-shadow: 0 5px 14px rgba(150, 103, 222, 0.20);
        transition: 0.2s ease;
    }

    .new-portfolio-btn:hover {
        background: #8151CC;
        border-color: #8151CC;
        color: #FFFFFF;
        transform: translateY(-2px);
    }

    /* DASHBOARD OVERVIEW */

    .overview-grid {
        display: grid;
        grid-template-columns: 1.35fr 0.85fr;
        gap: 22px;
        margin-bottom: 38px;
    }

    .welcome-panel {
        position: relative;
        overflow: hidden;
        min-height: 210px;
        padding: 30px;
        border: 1px solid var(--lavender-medium);
        border-radius: 20px;
        background: linear-gradient(
            125deg,
            var(--lavender-soft) 0%,
            var(--lavender-medium) 58%,
            var(--lavender-purple) 100%
        );
    }

    .welcome-panel::after {
        content: "";
        position: absolute;
        right: -45px;
        bottom: -95px;
        width: 220px;
        height: 220px;
        border: 30px solid rgba(255, 255, 255, 0.20);
        border-radius: 50%;
        pointer-events: none;
    }

    .welcome-label {
        position: relative;
        z-index: 1;
        display: inline-block;
        margin-bottom: 15px;
        color: #59417E;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.5px;
    }

    .welcome-panel h2 {
        position: relative;
        z-index: 1;
        max-width: 420px;
        margin: 0 0 12px;
        color: #302246;
        font-size: 25px;
        line-height: 1.4;
    }

    .welcome-panel p {
        position: relative;
        z-index: 1;
        max-width: 450px;
        margin: 0;
        color: #514267;
        font-size: 13px;
        line-height: 1.8;
    }

    .stats-panel {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 26px;
        border: 1px solid var(--border);
        border-radius: 20px;
        background: var(--surface);
        box-shadow: 0 5px 20px rgba(68, 45, 105, 0.05);
    }

    .stats-icon {
        display: flex;
        flex-shrink: 0;
        align-items: center;
        justify-content: center;
        width: 66px;
        height: 66px;
        border-radius: 18px;
        background: var(--lavender-light);
        color: var(--lavender-deep);
        font-size: 30px;
    }

    .stats-label {
        margin: 0 0 8px;
        color: var(--muted);
        font-size: 12px;
        font-weight: 600;
    }

    .stats-number {
        margin: 0;
        color: var(--lavender-deep);
        font-size: 36px;
        font-weight: 800;
        line-height: 1.2;
    }

    .stats-description {
        margin: 8px 0 0;
        color: var(--muted);
        font-size: 11px;
    }

    /* PORTFOLIO SECTION */

    .portfolio-section-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 20px;
    }

    .portfolio-section-heading h2 {
        margin: 0;
        color: var(--text);
        font-size: 22px;
        font-weight: 800;
    }

    .portfolio-count {
        display: inline-block;
        padding: 7px 12px;
        border: 1px solid var(--lavender-soft);
        border-radius: 30px;
        background: #FFFFFF;
        color: #6840A7;
        font-size: 12px;
        font-weight: 700;
    }

    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        align-items: stretch;
        gap: 24px;
    }

    /* PORTFOLIO CARD */

    .portfolio-card {
        display: flex;
        flex-direction: column;
        min-width: 0;
        overflow: hidden;
        border: 1px solid var(--border);
        border-radius: 19px;
        background: var(--surface);
        box-shadow: 0 5px 18px rgba(68, 45, 105, 0.045);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .portfolio-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 13px 28px rgba(68, 45, 105, 0.11);
    }

    .card-banner {
        position: relative;
        display: flex;
        min-height: 105px;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: linear-gradient(
            135deg,
            var(--lavender-light),
            var(--lavender-soft)
        );
    }

    .card-banner::before,
    .card-banner::after {
        content: "";
        position: absolute;
        border: 1px solid rgba(255, 255, 255, 0.35);
        border-radius: 50%;
    }

    .card-banner::before {
        width: 145px;
        height: 145px;
        right: -25px;
        top: -85px;
    }

    .card-banner::after {
        width: 90px;
        height: 90px;
        left: -25px;
        bottom: -58px;
    }

    .card-banner.simple {
        background: linear-gradient(
            135deg,
            #EEEAFD,
            #D8CAF6
        );
    }

    .card-banner.modern {
        background: linear-gradient(
            135deg,
            #C2A9EF,
            #AC88E8
        );
    }

    .card-banner.creative {
        background: linear-gradient(
            135deg,
            #AC88E8,
            #9667DE
        );
    }

    .banner-symbol {
        position: relative;
        z-index: 1;
        color: rgba(255, 255, 255, 0.90);
        font-size: 37px;
        font-weight: 800;
        letter-spacing: 2px;
    }

    .card-banner.simple .banner-symbol {
        color: #9667DE;
    }

    .template-badge {
        position: absolute;
        z-index: 2;
        top: 13px;
        right: 13px;
        display: inline-block;
        padding: 7px 10px;
        border: 1px solid rgba(255, 255, 255, 0.75);
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.94);
        color: #6840A7;
        font-size: 10px;
        font-weight: 800;
        text-transform: capitalize;
        white-space: nowrap;
    }

    .card-content {
        display: flex;
        flex: 1;
        flex-direction: column;
        min-width: 0;
        padding: 22px;
    }

    .card-profile {
        display: flex;
        align-items: center;
        gap: 13px;
        margin-bottom: 18px;
    }

    .portfolio-icon {
        display: flex;
        flex-shrink: 0;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        overflow: hidden;
        border: 3px solid var(--lavender-light);
        border-radius: 50%;
        background: var(--lavender-light);
        color: var(--lavender-deep);
        font-size: 23px;
        font-weight: 800;
    }

    .portfolio-icon img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-initial {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }

    .portfolio-card h3 {
        overflow-wrap: anywhere;
        margin: 0 0 6px;
        color: var(--text);
        font-size: 16px;
        font-weight: 800;
        line-height: 1.5;
    }

    .professional-title {
        overflow-wrap: anywhere;
        min-height: 21px;
        margin: 0 0 16px;
        color: var(--muted);
        font-size: 13px;
        line-height: 1.6;
    }

    .portfolio-email {
        overflow-wrap: anywhere;
        min-height: 42px;
        margin: 0;
        padding-top: 14px;
        border-top: 1px solid var(--border);
        color: var(--muted);
        font-size: 12px;
        line-height: 1.6;
    }

    /* ACTION BUTTONS */

    .card-actions {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-top: auto;
        padding-top: 17px;
    }

    .card-actions form {
        display: flex;
        width: 100%;
        margin: 0;
    }

    .card-actions .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-height: 40px;
        padding: 10px 14px;
        border: 1px solid var(--border);
        border-radius: 9px;
        background: #FFFFFF;
        color: var(--text);
        text-align: center;
        text-decoration: none;
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.4;
        cursor: pointer;
        transition: background 0.2s, color 0.2s, border-color 0.2s;
    }

    .card-actions .btn-view {
        border-color: var(--lavender-deep);
        background: var(--lavender-deep);
        color: #FFFFFF;
    }

    .card-actions .btn-view:hover {
        border-color: #8151CC;
        background: #8151CC;
        color: #FFFFFF;
    }

    .card-actions .btn-edit:hover {
        border-color: var(--lavender-purple);
        background: var(--lavender-light);
        color: #6840A7;
    }

    .card-actions .btn-danger {
        border-color: #F4C8D0;
        background: #FFF5F7;
        color: var(--danger);
    }

    .card-actions .btn-danger:hover {
        border-color: var(--danger);
        background: #FDE7EC;
        color: #B91C3A;
    }

    /* ALERTS */

    .success-message,
    .error-message {
        padding: 14px 18px;
        margin-bottom: 22px;
        border-radius: 10px;
        font-size: 14px;
        line-height: 1.6;
    }

    .success-message {
        border: 1px solid #B8E6C7;
        background: #F0FFF4;
        color: #166534;
    }

    .error-message {
        border: 1px solid #F4C8D0;
        background: #FFF1F2;
        color: #991B1B;
    }

    .error-message ul {
        margin-bottom: 0;
    }

    /* EMPTY STATE */

    .empty-state {
        padding: 55px 24px;
        border: 1px dashed var(--lavender-medium);
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.80);
        text-align: center;
    }

    .empty-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 70px;
        height: 70px;
        margin: 0 auto 20px;
        border-radius: 21px;
        background: var(--lavender-light);
        color: var(--lavender-deep);
        font-size: 35px;
    }

    .empty-state h2 {
        margin: 0 0 12px;
        color: var(--text);
        font-size: 22px;
    }

    .empty-state p {
        max-width: 430px;
        margin: 0 auto 24px;
        color: var(--muted);
        font-size: 14px;
        line-height: 1.8;
    }

    /* PAGINATION */

    .pagination {
        margin-top: 28px;
        overflow-x: auto;
    }

    .pagination nav {
        max-width: 100%;
    }

    .pagination a,
    .pagination span {
        color: var(--lavender-deep);
    }

    /* RESPONSIVE LAYOUT */

    @media (max-width: 950px) {
        .overview-grid {
            grid-template-columns: 1fr;
        }

        .portfolio-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .dashboard {
            padding: 26px 15px 40px;
        }

        .section-heading {
            align-items: stretch;
            flex-direction: column;
        }

        .section-heading h1 {
            font-size: 27px;
        }

        .new-portfolio-btn {
            width: 100%;
        }

        .welcome-panel {
            min-height: auto;
            padding: 24px;
        }

        .welcome-panel h2 {
            font-size: 22px;
        }

        .stats-panel {
            padding: 22px;
        }

        .portfolio-grid {
            grid-template-columns: 1fr;
        }

        .portfolio-section-heading h2 {
            font-size: 20px;
        }

        .card-content {
            padding: 20px;
        }
    }
</style>
@endpush

@section('content')

<main class="dashboard">
    <div class="dashboard-container">

        {{-- PAGE HEADER --}}
        <header class="section-heading">
            <div>
                <h1 id="portfolios-heading">My Portfolios</h1>
                <p>
                    Manage all your professional portfolios in one place.
                </p>
            </div>

            <a
                href="{{ route('portfolios.create') }}"
                class="new-portfolio-btn"
            >
                <span aria-hidden="true">＋</span>
                New Portfolio
            </a>
        </header>

        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div class="success-message" role="status">
                {{ session('success') }}
            </div>
        @endif

        {{-- VALIDATION ERRORS --}}
        @if ($errors->any())
            <div class="error-message" role="alert">
                <strong>Please check the following:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- DASHBOARD OVERVIEW --}}
        <section class="overview-grid" aria-label="Portfolio overview">

            <div class="welcome-panel">
                <span class="welcome-label">YOUR PERSONAL BRAND</span>

                <h2>
                    Your next opportunity starts with your portfolio.
                </h2>

                <p>
                    Keep your experience, education, skills, and projects
                    organized. Update your professional profile whenever
                    you need to.
                </p>
            </div>

            <div class="stats-panel">
                <div class="stats-icon" aria-hidden="true">▤</div>

                <div>
                    <p class="stats-label">Total Saved Portfolios</p>

                    <p class="stats-number">
                        {{ $portfolios->count() }}
                    </p>

                    <p class="stats-description">
                        Portfolios in your collection
                    </p>
                </div>
            </div>

        </section>

        {{-- PORTFOLIO COLLECTION --}}
        <section aria-labelledby="saved-portfolios-heading">

            <div class="portfolio-section-heading">
                <h2 id="saved-portfolios-heading">
                    Your Saved Portfolios
                </h2>

                <span class="portfolio-count">
                    {{ $portfolios->count() }}
                    {{ $portfolios->count() === 1 ? 'Portfolio' : 'Portfolios' }}
                </span>
            </div>

            @if (isset($portfolios) && $portfolios->count() > 0)

                <div class="portfolio-grid">

                    @foreach ($portfolios as $portfolio)

                        @php
                            $template = strtolower(
                                $portfolio->template ?: 'simple'
                            );

                            $allowedTemplates = [
                                'simple',
                                'modern',
                                'creative'
                            ];

                            $templateClass = in_array(
                                $template,
                                $allowedTemplates,
                                true
                            ) ? $template : 'simple';

                            $photoPath = $portfolio->photo ?? null;

                            $photoUrl = null;

                            if ($photoPath) {
                                $photoUrl = \Illuminate\Support\Str::startsWith(
                                    $photoPath,
                                    ['http://', 'https://', '/']
                                )
                                    ? $photoPath
                                    : asset('storage/' . $photoPath);
                            }

                            $portfolioName = $portfolio->full_name
                                ?: 'Unnamed Portfolio';

                            $initial = strtoupper(
                                substr($portfolioName, 0, 1)
                            );
                        @endphp

                        <article class="portfolio-card">

                            {{-- TEMPLATE BANNER --}}
                            <div class="card-banner {{ $templateClass }}">

                                <span class="banner-symbol" aria-hidden="true">
                                    B.
                                </span>

                                <span class="template-badge">
                                    {{ ucfirst($templateClass) }} Template
                                </span>

                            </div>

                            <div class="card-content">

                                {{-- PROFILE --}}
                                <div class="card-profile">

                                    <div class="portfolio-icon">

                                        @if ($photoUrl)
                                            <img
                                                src="{{ $photoUrl }}"
                                                alt="{{ $portfolioName }} profile photo"
                                                loading="lazy"
                                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                            >

                                            <span
                                                class="profile-initial"
                                                aria-hidden="true"
                                                style="display:none;"
                                            >
                                                {{ $initial }}
                                            </span>
                                        @else
                                            <span
                                                class="profile-initial"
                                                aria-hidden="true"
                                            >
                                                {{ $initial }}
                                            </span>
                                        @endif

                                    </div>

                                    <div>
                                        <h3>{{ $portfolioName }}</h3>

                                        <p class="professional-title">
                                            {{ $portfolio->professional_title
                                                ?: 'No professional title added' }}
                                        </p>
                                    </div>

                                </div>

                                {{-- EMAIL --}}
                                <p class="portfolio-email">
                                    {{ $portfolio->email ?: 'No email added' }}
                                </p>

                                {{-- ACTIONS --}}
                                <div class="card-actions">

                                    <a
                                        href="{{ route('portfolios.show', $portfolio) }}"
                                        class="btn btn-view"
                                    >
                                        View Portfolio
                                    </a>

                                    <a
                                        href="{{ route('portfolios.edit', $portfolio) }}"
                                        class="btn btn-edit"
                                    >
                                        Edit Portfolio
                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ route('portfolios.destroy', $portfolio) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this portfolio? This action cannot be undone.');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger"
                                        >
                                            Delete Portfolio
                                        </button>
                                    </form>

                                </div>

                            </div>
                        </article>

                    @endforeach

                </div>

                {{-- PAGINATION --}}
                @if (method_exists($portfolios, 'links'))
                    <div class="pagination">
                        {{ $portfolios->links() }}
                    </div>
                @endif

            @else

                {{-- EMPTY STATE --}}
                <div class="empty-state">

                    <div class="empty-icon" aria-hidden="true">＋</div>

                    <h2>No portfolios yet</h2>

                    <p>
                        You haven't created a portfolio yet. Start building
                        your professional profile and showcase your skills,
                        education, experience, and projects.
                    </p>

                    <a
                        href="{{ route('portfolios.create') }}"
                        class="new-portfolio-btn"
                    >
                        ＋ Create Your First Portfolio
                    </a>

                </div>

            @endif

        </section>

    </div>
</main>

@endsection