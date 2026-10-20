<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Portfolio | B.O.R.N.FOLIO</title>

    <style>
        :root {
            --lavender-light: #EEEAFD;
            --lavender-soft: #D8CAF6;
            --lavender-medium: #C2A9EF;
            --lavender-purple: #AC88E8;
            --lavender-deep: #9667DE;
            --purple-dark: #7045B5;
            --background: #F8F6FF;
            --surface: #FFFFFF;
            --text: #302344;
            --muted: #786D8D;
            --border: #E5DCF5;
            --danger: #D94462;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(
                    circle at top right,
                    rgba(194, 169, 239, 0.22),
                    transparent 35%
                ),
                var(--background);
            color: var(--text);
            line-height: 1.6;
        }

        button, input, textarea, select {
            font: inherit;
        }

        a {
            text-decoration: none;
        }

        /* NAVIGATION */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
            width: 100%;
            min-height: 72px;
            background: rgba(255, 255, 255, 0.97);
            border-bottom: 1px solid var(--border);
        }

        .nav-inner {
            width: min(1250px, calc(100% - 40px));
            min-height: 72px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 22px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: #38294F;
            font-size: 21px;
            font-weight: 800;
            white-space: nowrap;
        }

        .brand-icon {
            color: var(--lavender-deep);
            font-size: 23px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
        }

        .nav-links a {
            position: relative;
            padding: 24px 0;
            color: #655777;
            font-size: 13px;
            font-weight: 700;
            transition: color .2s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--lavender-deep);
        }

        .nav-links a.active::after {
            position: absolute;
            bottom: 15px;
            left: 0;
            width: 100%;
            height: 2px;
            border-radius: 5px;
            background: var(--lavender-deep);
            content: "";
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 10px 17px;
            border: 1px solid var(--lavender-soft);
            border-radius: 11px;
            background: white;
            color: var(--purple-dark);
            font-size: 12px;
            font-weight: 800;
            transition: .2s;
        }

        .nav-button:hover {
            background: var(--lavender-light);
        }

        .nav-button.primary {
            background: var(--lavender-deep);
            border-color: var(--lavender-deep);
            color: white;
        }

        .nav-button.primary:hover {
            background: var(--purple-dark);
        }

        /* PAGE */

        .container {
            width: min(1100px, calc(100% - 36px));
            margin: auto;
            padding: 35px 0 60px;
        }

        .page-heading {
            margin-bottom: 25px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            padding: 7px 13px;
            border: 1px solid var(--lavender-soft);
            border-radius: 30px;
            background: var(--lavender-light);
            color: var(--purple-dark);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .eyebrow-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--lavender-deep);
        }

        h1 {
            margin: 0 0 12px;
            font-size: clamp(29px, 4vw, 43px);
            line-height: 1.2;
            letter-spacing: -1.3px;
        }

        .gradient-text {
            color: var(--lavender-deep);
        }

        .subtitle {
            max-width: 700px;
            margin: 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
        }

        .progress-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 22px;
            padding: 18px 20px;
            border: 1px solid var(--border);
            border-radius: 15px;
            background: rgba(255,255,255,.9);
        }

        .progress-copy strong {
            display: block;
            font-size: 14px;
        }

        .progress-copy span {
            color: var(--muted);
            font-size: 12px;
        }

        .progress-label {
            flex-shrink: 0;
            padding: 7px 12px;
            border-radius: 30px;
            background: var(--lavender-light);
            color: var(--purple-dark);
            font-size: 10px;
            font-weight: 800;
        }

        .form-card {
            padding: 30px;
            border: 1px solid var(--border);
            border-radius: 22px;
            background: white;
            box-shadow: 0 14px 45px rgba(112,69,181,.07);
        }

        .section {
            padding: 27px 0;
            border-top: 1px solid var(--border);
        }

        .section:first-child {
            padding-top: 0;
            border-top: none;
        }

        .section-heading {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            margin-bottom: 21px;
        }

        .section-number {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: var(--lavender-light);
            color: var(--purple-dark);
            font-size: 15px;
            font-weight: 800;
        }

        .section-heading h2 {
            margin: 0 0 5px;
            font-size: 19px;
            line-height: 1.4;
        }

        .section-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.7;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 17px;
        }

        .field {
            min-width: 0;
            margin-bottom: 17px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .full {
            grid-column: 1 / -1;
        }

        .field label {
            display: block;
            margin-bottom: 7px;
            color: #44365A;
            font-size: 12px;
            font-weight: 700;
        }

        .required {
            color: var(--danger);
        }

        input:not([type="radio"]):not([type="checkbox"]):not([type="file"]),
        textarea,
        select {
            display: block;
            width: 100%;
            min-height: 45px;
            padding: 11px 13px;
            border: 1px solid #DCD2EF;
            border-radius: 10px;
            outline: none;
            background: white;
            color: var(--text);
            font-size: 13px;
            transition: border-color .2s, box-shadow .2s;
        }

        input[type="file"] {
            display: block;
            width: 100%;
            padding: 12px;
            border: 1px solid #DCD2EF;
            border-radius: 10px;
            background: white;
            color: var(--muted);
            font-size: 12px;
        }

        input::placeholder,
        textarea::placeholder {
            color: #A49AB5;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: var(--lavender-deep);
            box-shadow: 0 0 0 3px rgba(172,136,232,.15);
        }

        textarea {
            min-height: 115px;
            resize: vertical;
        }

        /* INVALID FIELDS */

        .invalid-field,
        input.invalid-field,
        textarea.invalid-field,
        select.invalid-field {
            border: 1.5px solid var(--danger) !important;
            background-color: #FFF8FA !important;
            box-shadow: 0 0 0 3px rgba(217,68,98,.08) !important;
        }

        .error {
            margin-top: 6px;
            color: var(--danger);
            font-size: 12px;
        }

        .error-summary {
            margin-bottom: 22px;
            padding: 16px 19px;
            border: 1px solid #F3C6D0;
            border-radius: 12px;
            background: #FFF2F4;
            color: #982B42;
            font-size: 13px;
        }

        .error-summary ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        .help-text {
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        /* PHOTO */

        .photo-box {
            display: grid;
            grid-template-columns: 112px minmax(0,1fr);
            align-items: center;
            gap: 22px;
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 15px;
            background: #FBF9FF;
        }

        .photo-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 105px;
            height: 105px;
            overflow: hidden;
            border: 3px solid var(--lavender-soft);
            border-radius: 50%;
            background: var(--lavender-light);
            color: var(--purple-dark);
            font-size: 22px;
            font-weight: 800;
        }

        .photo-placeholder img {
            display: none;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-placeholder.has-image img {
            display: block;
        }

        .photo-placeholder.has-image span {
            display: none;
        }

        /* REPEATED ENTRIES */

        .entry {
            margin-bottom: 15px;
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 15px;
            background: #FCFAFF;
        }

        .entry-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
        }

        .entry-header h3 {
            margin: 0;
            color: var(--purple-dark);
            font-size: 14px;
        }

        .empty-message {
            margin: 0 0 14px;
            padding: 15px;
            border: 1px dashed var(--lavender-soft);
            border-radius: 12px;
            background: #FCFAFF;
            color: var(--muted);
            font-size: 12px;
        }

        /* BUTTONS */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 42px;
            padding: 10px 16px;
            border: 1px solid var(--lavender-deep);
            border-radius: 10px;
            background: var(--lavender-deep);
            color: white;
            font-size: 12px;
            font-weight: 800;
            text-align: center;
            cursor: pointer;
            transition: .2s;
        }

        .btn:hover {
            background: var(--purple-dark);
            border-color: var(--purple-dark);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: white;
            color: var(--purple-dark);
            border-color: var(--lavender-soft);
        }

        .btn-secondary:hover {
            background: var(--lavender-light);
            color: var(--purple-dark);
            border-color: var(--lavender-purple);
        }

        .btn-remove {
            min-height: 31px;
            padding: 6px 10px;
            border-color: #F5D0D8;
            background: #FFF2F4;
            color: var(--danger);
            font-size: 11px;
        }

        .btn-remove:hover {
            background: #FFE5EA;
            border-color: #F0B8C5;
            color: #B92D49;
        }

        .add-button {
            margin-top: 2px;
        }

        .skill-row {
            display: grid;
            grid-template-columns: minmax(0,1fr) auto;
            align-items: start;
            gap: 10px;
            margin-bottom: 12px;
        }

        /* TEMPLATE SELECTION */

        .template-intro {
            margin: -5px 0 18px;
            color: var(--muted);
            font-size: 12px;
        }

        .templates {
            display: grid;
            grid-template-columns: repeat(3,minmax(0,1fr));
            gap: 15px;
        }

        .template-option {
            position: relative;
            min-width: 0;
            overflow: hidden;
            border: 2px solid var(--border);
            border-radius: 15px;
            background: white;
            transition: border-color .2s, box-shadow .2s, transform .2s;
        }

        .template-option:hover {
            transform: translateY(-2px);
            box-shadow: 0 9px 24px rgba(112,69,181,.10);
        }

        .template-option:has(input:checked) {
            border-color: var(--lavender-deep);
            box-shadow: 0 0 0 3px rgba(172,136,232,.15);
        }

        .template-option > label {
            display: flex;
            height: 100%;
            flex-direction: column;
            margin: 0;
            cursor: pointer;
        }

        .template-select {
            position: absolute;
            z-index: 2;
            top: 12px;
            right: 12px;
            width: 19px;
            height: 19px;
            accent-color: var(--lavender-deep);
            cursor: pointer;
        }

        .template-preview {
            display: flex;
            min-height: 165px;
            align-items: center;
            justify-content: center;
            padding: 15px;
        }

        .simple-preview {
            background: linear-gradient(135deg,#EEEAFD,#D8CAF6);
        }

        .modern-preview {
            background: linear-gradient(135deg,#C2A9EF,#AC88E8);
        }

        .creative-preview {
            background: linear-gradient(135deg,#AC88E8,#7045B5);
        }

        .mock-page {
            width: 100%;
            min-height: 125px;
            padding: 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            box-shadow: 0 6px 15px rgba(48,35,68,.12);
        }

        .modern-preview .mock-page {
            border-top: 4px solid var(--lavender-deep);
        }

        .creative-preview .mock-page {
            border-color: #7045B5;
            background: #35274B;
        }

        .mock-profile {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
        }

        .mock-avatar {
            flex-shrink: 0;
            width: 27px;
            height: 27px;
            border-radius: 50%;
            background: linear-gradient(135deg,#D8CAF6,#AC88E8);
        }

        .mock-heading {
            color: #49356B;
            font-size: 8px;
            font-weight: 800;
        }

        .mock-subheading {
            color: #887A9C;
            font-size: 7px;
        }

        .creative-preview .mock-heading {
            color: #E6D9FF;
        }

        .creative-preview .mock-subheading {
            color: #C7B6E5;
        }

        .mock-line {
            width: 100%;
            height: 4px;
            margin: 7px 0;
            border-radius: 8px;
            background: #E7E0F3;
        }

        .mock-line.short {
            width: 48%;
            height: 5px;
            background: var(--lavender-deep);
        }

        .mock-line.medium {
            width: 72%;
        }

        .creative-preview .mock-line {
            background: #65527E;
        }

        .creative-preview .mock-line.short {
            background: #AC88E8;
        }

        .mock-section-title {
            margin: 9px 0 5px;
            color: #74559E;
            font-size: 7px;
            font-weight: 800;
        }

        .creative-preview .mock-section-title {
            color: #D8CAF6;
        }

        .mock-tag {
            display: inline-block;
            margin: 4px 3px 0 0;
            padding: 3px 6px;
            border-radius: 4px;
            background: var(--lavender-light);
            color: var(--purple-dark);
            font-size: 7px;
            font-weight: 700;
        }

        .creative-preview .mock-tag {
            background: #57416F;
            color: #EEEAFD;
        }

        .template-info {
            display: flex;
            flex: 1;
            flex-direction: column;
            align-items: flex-start;
            padding: 15px;
        }

        .template-label {
            display: inline-block;
            margin-bottom: 8px;
            padding: 5px 8px;
            border-radius: 20px;
            background: var(--lavender-light);
            color: var(--purple-dark);
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .template-info h3 {
            margin: 0 0 7px;
            font-size: 15px;
        }

        .template-info p {
            margin: 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
        }

        .selected-hint {
            display: none;
            margin-top: 12px;
            color: var(--purple-dark);
            font-size: 10px;
            font-weight: 800;
        }

        .template-option:has(input:checked) .selected-hint {
            display: block;
        }

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 25px;
            padding-top: 23px;
            border-top: 1px solid var(--border);
        }

        .footer {
            padding: 22px 16px;
            border-top: 1px solid var(--border);
            background: white;
            color: var(--muted);
            font-size: 12px;
            text-align: center;
        }

        .footer p {
            margin: 0;
        }

        @media (max-width: 800px) {
            .nav-inner {
                flex-wrap: wrap;
                padding: 12px 0;
                gap: 12px;
            }

            .nav-links {
                order: 3;
                width: 100%;
                gap: 25px;
            }

            .nav-links a {
                padding: 8px 0;
            }

            .nav-links a.active::after {
                bottom: 1px;
            }

            .templates {
                grid-template-columns: 1fr;
            }

            .template-preview {
                min-height: 180px;
            }

            .form-card {
                padding: 23px;
            }
        }

        @media (max-width: 560px) {
            .nav-inner {
                width: calc(100% - 24px);
            }

            .brand {
                font-size: 17px;
            }

            .nav-actions {
                gap: 5px;
            }

            .nav-button {
                min-height: 36px;
                padding: 7px 9px;
                font-size: 10px;
            }

            .nav-links {
                justify-content: flex-start;
                gap: 22px;
            }

            .container {
                width: calc(100% - 24px);
                padding-top: 25px;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .full {
                grid-column: auto;
            }

            .form-card {
                padding: 17px;
                border-radius: 16px;
            }

            .section {
                padding: 22px 0;
            }

            .section-heading h2 {
                font-size: 17px;
            }

            .photo-box {
                grid-template-columns: 1fr;
            }

            .photo-placeholder {
                width: 95px;
                height: 95px;
            }

            .progress-card {
                align-items: flex-start;
                flex-direction: column;
            }

            .entry {
                padding: 14px;
            }

            .form-actions {
                align-items: stretch;
                flex-direction: column;
            }

            .form-actions .btn {
                width: 100%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

{{-- NAVIGATION: NO LOG OUT BUTTON --}}
<header class="navbar">
    <div class="nav-inner">

        <a href="{{ url('/') }}" class="brand">
            <span class="brand-icon">▣</span>
            <span>B.O.R.N.FOLIO</span>
        </a>

        <nav class="nav-links" aria-label="Main navigation">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('portfolios.index') }}">Manage Portfolios</a>
        </nav>

        <div class="nav-actions">
            <a href="{{ route('portfolios.create') }}"
               class="nav-button primary">
                + New Portfolio
            </a>
        </div>

    </div>
</header>

<main class="container">

    <div class="page-heading">
        <span class="eyebrow">
            <span class="eyebrow-dot"></span>
            YOUR FUTURE, YOUR PORTFOLIO
        </span>

        <h1>
            Create Your Portfolio
            <span class="gradient-text">in Minutes.</span>
        </h1>

        <p class="subtitle">
            Add your personal information, education, skills, work experience,
            projects, and social links. Then choose a design that represents you.
        </p>
    </div>

    <div class="progress-card">
        <div class="progress-copy">
            <strong>Build your professional profile</strong>
            <span>Complete the sections below and select your preferred design.</span>
        </div>

        <span class="progress-label">CREATE PORTFOLIO</span>
    </div>

    <section class="form-card">

        @if ($errors->any())
            <div class="error-summary" role="alert">
                <strong>Please correct the following errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            method="POST"
            action="{{ route('portfolios.store') }}"
            enctype="multipart/form-data"
            id="portfolioForm"
        >
            @csrf

            {{-- 01 PROFILE PHOTO --}}
            <section class="section">
                <div class="section-heading">
                    <div class="section-number">01</div>
                    <div>
                        <h2>Profile Photo</h2>
                        <p>Add a photo to personalize your portfolio.</p>
                    </div>
                </div>

                <div class="photo-box">
                    <div class="photo-placeholder" id="photoPlaceholder">
                        <span>PHOTO</span>
                        <img id="photoPreview" src="" alt="Profile photo preview">
                    </div>

                    <div class="field">
                        <label for="profile_picture">Upload Profile Photo</label>
                        <input
                            type="file"
                            id="profile_picture"
                            name="profile_picture"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                        >
                        <p class="help-text">
                            JPG, JPEG, PNG, or WEBP. Maximum size: 2 MB.
                        </p>

                        @error('profile_picture')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </section>

            {{-- 02 PERSONAL INFORMATION --}}
            <section class="section">
                <div class="section-heading">
                    <div class="section-number">02</div>
                    <div>
                        <h2>Personal Information</h2>
                        <p>Tell visitors who you are and what you do.</p>
                    </div>
                </div>

                <div class="grid">
                    <div class="field">
                        <label for="full_name">
                            Full Name <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            id="full_name"
                            name="full_name"
                            value="{{ old('full_name') }}"
                            maxlength="255"
                            placeholder="Enter your full name"
                            required
                        >
                        @error('full_name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="professional_title">Professional Title</label>
                        <input
                            type="text"
                            id="professional_title"
                            name="professional_title"
                            value="{{ old('professional_title') }}"
                            maxlength="255"
                            placeholder="e.g. Web Developer"
                        >
                        @error('professional_title')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">
                            Email <span class="required">*</span>
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            maxlength="255"
                            placeholder="you@example.com"
                            required
                        >
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="contact_number">Phone</label>
                        <input
                            type="tel"
                            id="contact_number"
                            name="contact_number"
                            value="{{ old('contact_number') }}"
                            maxlength="50"
                            placeholder="Your contact number"
                        >
                        @error('contact_number')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field full">
                        <label for="address">Address</label>
                        <input
                            type="text"
                            id="address"
                            name="address"
                            value="{{ old('address') }}"
                            maxlength="255"
                            placeholder="City, Province"
                        >
                        @error('address')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field full">
                        <label for="about_me">About Me</label>
                        <textarea
                            id="about_me"
                            name="about_me"
                            placeholder="Introduce yourself, your interests, and your career goals..."
                        >{{ old('about_me') }}</textarea>
                        @error('about_me')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </section>

            {{-- 03 EDUCATION --}}
            <section class="section">
                <div class="section-heading">
                    <div class="section-number">03</div>
                    <div>
                        <h2>Education</h2>
                        <p>Add your school, degree, and dates. You can add multiple entries.</p>
                    </div>
                </div>

                <div id="educationContainer">
                    @php
                        $educationItems = old('educations', []);
                    @endphp

                    @foreach ($educationItems as $i => $edu)
                        <div class="entry">
                            <div class="entry-header">
                                <h3>Education</h3>
                                <button type="button" class="btn btn-remove"
                                        onclick="removeEntry(this)">
                                    Remove
                                </button>
                            </div>

                            <div class="grid">
                                <div class="field">
                                    <label>School / University</label>
                                    <input type="text"
                                           name="educations[{{ $i }}][school]"
                                           value="{{ $edu['school'] ?? '' }}"
                                           maxlength="255"
                                           placeholder="School name">
                                </div>

                                <div class="field">
                                    <label>Degree / Course</label>
                                    <input type="text"
                                           name="educations[{{ $i }}][degree]"
                                           value="{{ $edu['degree'] ?? '' }}"
                                           maxlength="255"
                                           placeholder="e.g. BS Information Technology">
                                </div>

                                <div class="field">
                                    <label>Start Date</label>
                                    <input type="date"
                                           name="educations[{{ $i }}][start_date]"
                                           value="{{ $edu['start_date'] ?? '' }}">
                                </div>

                                <div class="field">
                                    <label>End Date</label>
                                    <input type="date"
                                           name="educations[{{ $i }}][end_date]"
                                           value="{{ $edu['end_date'] ?? '' }}">
                                    <p class="help-text">Leave blank if still studying.</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn add-button" onclick="addEducation()">
                    + Add Education
                </button>
            </section>

            {{-- 04 SKILLS --}}
            <section class="section">
                <div class="section-heading">
                    <div class="section-number">04</div>
                    <div>
                        <h2>Skills</h2>
                        <p>Add technical skills, tools, or other abilities.</p>
                    </div>
                </div>

                <div id="skillContainer">
                    @php
                        $skillItems = old('skills', []);
                    @endphp

                    @foreach ($skillItems as $i => $skill)
                        <div class="skill-row">
                            <div class="field">
                                <input
                                    type="text"
                                    name="skills[{{ $i }}][skill_name]"
                                    value="{{ $skill['skill_name'] ?? '' }}"
                                    maxlength="255"
                                    placeholder="e.g. HTML, CSS, Laravel"
                                    aria-label="Skill name"
                                >
                            </div>

                            <button type="button" class="btn btn-remove"
                                    onclick="removeEntry(this)">
                                Remove
                            </button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn add-button" onclick="addSkill()">
                    + Add Skill
                </button>
            </section>

            {{-- 05 WORK EXPERIENCE --}}
            <section class="section">
                <div class="section-heading">
                    <div class="section-number">05</div>
                    <div>
                        <h2>Work Experience</h2>
                        <p>Add your previous or current job, internship, or relevant experience.</p>
                    </div>
                </div>

                <div id="experienceContainer">
                    @php
                        $experienceItems = old('experiences', []);
                    @endphp

                    @foreach ($experienceItems as $i => $exp)
                        <div class="entry">
                            <div class="entry-header">
                                <h3>Work Experience</h3>
                                <button type="button" class="btn btn-remove"
                                        onclick="removeEntry(this)">
                                    Remove
                                </button>
                            </div>

                            <div class="grid">
                                <div class="field">
                                    <label>Job Title</label>
                                    <input type="text"
                                           name="experiences[{{ $i }}][job_title]"
                                           value="{{ $exp['job_title'] ?? '' }}"
                                           maxlength="255"
                                           placeholder="e.g. Web Developer Intern">
                                </div>

                                <div class="field">
                                    <label>Company / Organization</label>
                                    <input type="text"
                                           name="experiences[{{ $i }}][company]"
                                           value="{{ $exp['company'] ?? '' }}"
                                           maxlength="255"
                                           placeholder="Company name">
                                </div>

                                <div class="field">
                                    <label>Start Date</label>
                                    <input type="date"
                                           name="experiences[{{ $i }}][start_date]"
                                           value="{{ $exp['start_date'] ?? '' }}">
                                </div>

                                <div class="field">
                                    <label>End Date</label>
                                    <input type="date"
                                           name="experiences[{{ $i }}][end_date]"
                                           value="{{ $exp['end_date'] ?? '' }}">
                                    <p class="help-text">Leave blank if currently working there.</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn add-button" onclick="addExperience()">
                    + Add Work Experience
                </button>
            </section>

            {{-- 06 PROJECTS: EMPTY UNTIL USER ADDS ONE --}}
            <section class="section">
                <div class="section-heading">
                    <div class="section-number">06</div>
                    <div>
                        <h2>Projects</h2>
                        <p>Add school projects, personal projects, or completed work.</p>
                    </div>
                </div>

                <div id="projectContainer">
                    @php
                        $projectItems = old('projects', []);
                    @endphp

                    @foreach ($projectItems as $i => $project)
                        <div class="entry">
                            <div class="entry-header">
                                <h3>Project</h3>
                                <button type="button" class="btn btn-remove"
                                        onclick="removeEntry(this)">
                                    Remove Project
                                </button>
                            </div>

                            <div class="field">
                                <label>Project Title</label>
                                <input
                                    type="text"
                                    name="projects[{{ $i }}][project_title]"
                                    value="{{ $project['project_title'] ?? '' }}"
                                    maxlength="255"
                                    placeholder="e.g. Student Portfolio Website"
                                >
                            </div>

                            <div class="field">
                                <label>Description</label>
                                <textarea
                                    name="projects[{{ $i }}][description]"
                                    placeholder="Describe your project, its purpose, and what you accomplished..."
                                >{{ $project['description'] ?? '' }}</textarea>
                            </div>

                            <div class="field">
                                <label>Project URL</label>
                                <input
                                    type="url"
                                    name="projects[{{ $i }}][project_url]"
                                    value="{{ $project['project_url'] ?? '' }}"
                                    maxlength="2048"
                                    placeholder="https://example.com"
                                >
                            </div>

                            <div class="field">
                                <label>Technologies Used</label>
                                <input
                                    type="text"
                                    name="projects[{{ $i }}][technologies_used]"
                                    value="{{ $project['technologies_used'] ?? '' }}"
                                    maxlength="1000"
                                    placeholder="HTML, CSS, Laravel"
                                >
                            </div>
                        </div>
                    @endforeach
                </div>

                <p class="empty-message" id="projectEmptyMessage"
                   @if (count($projectItems) > 0) hidden @endif>
                    No projects added yet. Click "+ Add Project" when you're ready.
                </p>

                <button type="button" class="btn add-button" onclick="addProject()">
                    + Add Project
                </button>
            </section>

            {{-- 07 SOCIAL LINKS --}}
            <section class="section">
                <div class="section-heading">
                    <div class="section-number">07</div>
                    <div>
                        <h2>Social Links</h2>
                        <p>Add a platform name and its complete profile URL.</p>
                    </div>
                </div>

                <div id="socialContainer">
                    @php
                        $socialItems = old('socials', []);
                    @endphp

                    @foreach ($socialItems as $i => $social)
                        <div class="entry">
                            <div class="entry-header">
                                <h3>Social Link</h3>
                                <button type="button" class="btn btn-remove"
                                        onclick="removeEntry(this)">
                                    Remove
                                </button>
                            </div>

                            <div class="grid">
                                <div class="field">
                                    <label>Platform Name</label>
                                    <input type="text"
                                           name="socials[{{ $i }}][platform_name]"
                                           value="{{ $social['platform_name'] ?? '' }}"
                                           maxlength="255"
                                           placeholder="e.g. LinkedIn, GitHub">
                                </div>

                                <div class="field">
                                    <label>Profile URL</label>
                                    <input type="url"
                                           name="socials[{{ $i }}][url]"
                                           value="{{ $social['url'] ?? '' }}"
                                           maxlength="2048"
                                           placeholder="https://example.com/your-profile">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn add-button" onclick="addSocial()">
                    + Add Social Link
                </button>
            </section>

            {{-- 08 TEMPLATE SELECTION --}}
            <section class="section">
                <div class="section-heading">
                    <div class="section-number">08</div>
                    <div>
                        <h2>
                            Choose Your Portfolio Design
                            <span class="required">*</span>
                        </h2>
                        <p>Select a design for your portfolio.</p>
                    </div>
                </div>

                <p class="template-intro">
                    Choose Simple for a clean look, Modern for a professional style,
                    or Creative for a bold presentation.
                </p>

                @php
                    $selectedTemplate = old(
                        'template',
                        request()->query('template', 'simple')
                    );

                    if (!in_array($selectedTemplate, ['simple', 'modern', 'creative'], true)) {
                        $selectedTemplate = 'simple';
                    }
                @endphp

                <div class="templates">

                    {{-- SIMPLE --}}
                    <article class="template-option">
                        <input
                            class="template-select"
                            type="radio"
                            id="template_simple"
                            name="template"
                            value="simple"
                            {{ $selectedTemplate === 'simple' ? 'checked' : '' }}
                            required
                        >

                        <label for="template_simple">
                            <div class="template-preview simple-preview">
                                <div class="mock-page">
                                    <div class="mock-profile">
                                        <div class="mock-avatar"></div>
                                        <div>
                                            <div class="mock-heading">YOUR NAME</div>
                                            <div class="mock-subheading">Personal Portfolio</div>
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
                                    A clean, minimal layout that highlights your biography,
                                    education, skills, and experience.
                                </p>
                                <span class="selected-hint">✓ Selected design</span>
                            </div>
                        </label>
                    </article>

                    {{-- MODERN --}}
                    <article class="template-option">
                        <input
                            class="template-select"
                            type="radio"
                            id="template_modern"
                            name="template"
                            value="modern"
                            {{ $selectedTemplate === 'modern' ? 'checked' : '' }}
                        >

                        <label for="template_modern">
                            <div class="template-preview modern-preview">
                                <div class="mock-page">
                                    <div class="mock-profile">
                                        <div class="mock-avatar"></div>
                                        <div>
                                            <div class="mock-heading">YOUR NAME</div>
                                            <div class="mock-subheading">Professional Profile</div>
                                        </div>
                                    </div>
                                    <div class="mock-line short"></div>
                                    <div class="mock-section-title">EXPERIENCE</div>
                                    <div class="mock-line"></div>
                                    <div class="mock-line medium"></div>
                                    <div class="mock-section-title">SELECTED PROJECTS</div>
                                    <div class="mock-line"></div>
                                    <span class="mock-tag">Career</span>
                                    <span class="mock-tag">Projects</span>
                                </div>
                            </div>

                            <div class="template-info">
                                <span class="template-label">Professional</span>
                                <h3>Modern Template</h3>
                                <p>
                                    A polished design for students, job seekers, and
                                    professionals showcasing their achievements.
                                </p>
                                <span class="selected-hint">✓ Selected design</span>
                            </div>
                        </label>
                    </article>

                    {{-- CREATIVE --}}
                    <article class="template-option">
                        <input
                            class="template-select"
                            type="radio"
                            id="template_creative"
                            name="template"
                            value="creative"
                            {{ $selectedTemplate === 'creative' ? 'checked' : '' }}
                        >

                        <label for="template_creative">
                            <div class="template-preview creative-preview">
                                <div class="mock-page">
                                    <div class="mock-profile">
                                        <div class="mock-avatar"></div>
                                        <div>
                                            <div class="mock-heading">YOUR NAME</div>
                                            <div class="mock-subheading">Creative Portfolio</div>
                                        </div>
                                    </div>
                                    <div class="mock-line short"></div>
                                    <div class="mock-section-title">MY CREATIVE WORK</div>
                                    <div class="mock-line"></div>
                                    <div class="mock-line medium"></div>
                                    <div class="mock-section-title">FEATURED PROJECTS</div>
                                    <div class="mock-line"></div>
                                    <span class="mock-tag">Design</span>
                                    <span class="mock-tag">Ideas</span>
                                </div>
                            </div>

                            <div class="template-info">
                                <span class="template-label">Bold &amp; Creative</span>
                                <h3>Creative Template</h3>
                                <p>
                                    A distinctive style for designers, developers, artists,
                                    and expressive portfolios.
                                </p>
                                <span class="selected-hint">✓ Selected design</span>
                            </div>
                        </label>
                    </article>

                </div>

                @error('template')
                    <div class="error">{{ $message }}</div>
                @enderror
            </section>

            {{-- FORM ACTIONS --}}
            <div class="form-actions">
                <a href="{{ route('portfolios.index') }}" class="btn btn-secondary">
                    Manage Portfolios
                </a>

                <button type="submit" class="btn" id="submitButton">
                    Create Portfolio →
                </button>
            </div>

        </form>
    </section>
</main>

<footer class="footer">
    <p>
        &copy; {{ date('Y') }} B.O.R.N.FOLIO.
        Build your portfolio, share your story.
    </p>
</footer>

<script>
    let educationIndex = {{ count(old('educations', [])) }};
    let skillIndex = {{ count(old('skills', [])) }};
    let experienceIndex = {{ count(old('experiences', [])) }};
    let projectIndex = {{ count(old('projects', [])) }};
    let socialIndex = {{ count(old('socials', [])) }};

    function removeEntry(button) {
        const entry = button.closest('.entry, .skill-row');

        if (entry) {
            entry.remove();
        }

        updateProjectEmptyMessage();
    }

    function updateProjectEmptyMessage() {
        const container = document.getElementById('projectContainer');
        const message = document.getElementById('projectEmptyMessage');

        message.hidden = container.querySelectorAll('.entry').length > 0;
    }

    function addEducation() {
        const i = educationIndex++;
        const container = document.getElementById('educationContainer');

        container.insertAdjacentHTML('beforeend', `
            <div class="entry">
                <div class="entry-header">
                    <h3>Education</h3>
                    <button type="button" class="btn btn-remove"
                            onclick="removeEntry(this)">Remove</button>
                </div>

                <div class="grid">
                    <div class="field">
                        <label>School / University</label>
                        <input type="text" name="educations[${i}][school]"
                               maxlength="255" placeholder="School name">
                    </div>

                    <div class="field">
                        <label>Degree / Course</label>
                        <input type="text" name="educations[${i}][degree]"
                               maxlength="255"
                               placeholder="e.g. BS Information Technology">
                    </div>

                    <div class="field">
                        <label>Start Date</label>
                        <input type="date" name="educations[${i}][start_date]">
                    </div>

                    <div class="field">
                        <label>End Date</label>
                        <input type="date" name="educations[${i}][end_date]">
                        <p class="help-text">Leave blank if still studying.</p>
                    </div>
                </div>
            </div>
        `);
    }

    function addSkill() {
        const i = skillIndex++;
        const container = document.getElementById('skillContainer');

        container.insertAdjacentHTML('beforeend', `
            <div class="skill-row">
                <div class="field">
                    <input type="text" name="skills[${i}][skill_name]"
                           maxlength="255"
                           placeholder="e.g. HTML, CSS, Laravel"
                           aria-label="Skill name">
                </div>
                <button type="button" class="btn btn-remove"
                        onclick="removeEntry(this)">Remove</button>
            </div>
        `);
    }

    function addExperience() {
        const i = experienceIndex++;
        const container = document.getElementById('experienceContainer');

        container.insertAdjacentHTML('beforeend', `
            <div class="entry">
                <div class="entry-header">
                    <h3>Work Experience</h3>
                    <button type="button" class="btn btn-remove"
                            onclick="removeEntry(this)">Remove</button>
                </div>

                <div class="grid">
                    <div class="field">
                        <label>Job Title</label>
                        <input type="text" name="experiences[${i}][job_title]"
                               maxlength="255"
                               placeholder="e.g. Web Developer Intern">
                    </div>

                    <div class="field">
                        <label>Company / Organization</label>
                        <input type="text" name="experiences[${i}][company]"
                               maxlength="255" placeholder="Company name">
                    </div>

                    <div class="field">
                        <label>Start Date</label>
                        <input type="date" name="experiences[${i}][start_date]">
                    </div>

                    <div class="field">
                        <label>End Date</label>
                        <input type="date" name="experiences[${i}][end_date]">
                        <p class="help-text">Leave blank if currently working there.</p>
                    </div>
                </div>
            </div>
        `);
    }

    function addProject() {
        const i = projectIndex++;
        const container = document.getElementById('projectContainer');

        container.insertAdjacentHTML('beforeend', `
            <div class="entry">
                <div class="entry-header">
                    <h3>Project</h3>
                    <button type="button" class="btn btn-remove"
                            onclick="removeEntry(this)">Remove Project</button>
                </div>

                <div class="field">
                    <label>Project Title</label>
                    <input type="text"
                           name="projects[${i}][project_title]"
                           maxlength="255"
                           placeholder="e.g. Student Portfolio Website">
                </div>

                <div class="field">
                    <label>Description</label>
                    <textarea name="projects[${i}][description]"
                              placeholder="Describe your project, its purpose, and what you accomplished..."></textarea>
                </div>

                <div class="field">
                    <label>Project URL</label>
                    <input type="url"
                           name="projects[${i}][project_url]"
                           maxlength="2048"
                           placeholder="https://example.com">
                </div>

                <div class="field">
                    <label>Technologies Used</label>
                    <input type="text"
                           name="projects[${i}][technologies_used]"
                           maxlength="1000"
                           placeholder="HTML, CSS, Laravel">
                </div>
            </div>
        `);

        updateProjectEmptyMessage();

        const entries = container.querySelectorAll('.entry');
        entries[entries.length - 1].scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
    }

    function addSocial() {
        const i = socialIndex++;
        const container = document.getElementById('socialContainer');

        container.insertAdjacentHTML('beforeend', `
            <div class="entry">
                <div class="entry-header">
                    <h3>Social Link</h3>
                    <button type="button" class="btn btn-remove"
                            onclick="removeEntry(this)">Remove</button>
                </div>

                <div class="grid">
                    <div class="field">
                        <label>Platform Name</label>
                        <input type="text"
                               name="socials[${i}][platform_name]"
                               maxlength="255"
                               placeholder="e.g. LinkedIn, GitHub">
                    </div>

                    <div class="field">
                        <label>Profile URL</label>
                        <input type="url"
                               name="socials[${i}][url]"
                               maxlength="2048"
                               placeholder="https://example.com/your-profile">
                    </div>
                </div>
            </div>
        `);
    }

    // PROFILE PHOTO PREVIEW
    const photoInput = document.getElementById('profile_picture');
    const photoPreview = document.getElementById('photoPreview');
    const photoPlaceholder = document.getElementById('photoPlaceholder');

    photoInput.addEventListener('change', function () {
        const file = this.files && this.files[0];

        if (!file) {
            photoPreview.removeAttribute('src');
            photoPlaceholder.classList.remove('has-image');
            return;
        }

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!allowedTypes.includes(file.type)) {
            alert('Please select a JPG, JPEG, PNG, or WEBP image.');
            this.value = '';
            photoPlaceholder.classList.remove('has-image');
            photoPreview.removeAttribute('src');
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert('The profile photo must not exceed 2 MB.');
            this.value = '';
            photoPlaceholder.classList.remove('has-image');
            photoPreview.removeAttribute('src');
            return;
        }

        const reader = new FileReader();

        reader.onload = function (event) {
            photoPreview.src = event.target.result;
            photoPlaceholder.classList.add('has-image');
        };

        reader.readAsDataURL(file);
    });

    // CLIENT-SIDE VALIDATION
    const portfolioForm = document.getElementById('portfolioForm');

    portfolioForm.addEventListener('input', function (event) {
        const field = event.target;

        if (field.matches('input, textarea, select')) {
            field.classList.remove('invalid-field');

            const error = field.parentElement.querySelector('.client-error');

            if (error) {
                error.remove();
            }
        }
    });

    portfolioForm.addEventListener('change', function (event) {
        const field = event.target;

        if (field.matches('input, textarea, select')) {
            field.classList.remove('invalid-field');
        }
    });

    portfolioForm.addEventListener('submit', function (event) {
        let firstInvalid = null;

        portfolioForm.querySelectorAll('.invalid-field').forEach(field => {
            field.classList.remove('invalid-field');
        });

        // Only required controls are marked as missing.
        const requiredFields = portfolioForm.querySelectorAll(
            'input[required]:not([type="radio"]), textarea[required], select[required]'
        );

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('invalid-field');

                if (!firstInvalid) {
                    firstInvalid = field;
                }
            }
        });

        // The selected template is required.
        const templateSelected = portfolioForm.querySelector(
            'input[name="template"]:checked'
        );

        const templateOptions = portfolioForm.querySelector('.templates');

        if (!templateSelected) {
            templateOptions.classList.add('invalid-field');

            if (!firstInvalid) {
                firstInvalid = templateOptions;
            }
        } else {
            templateOptions.classList.remove('invalid-field');
        }

        // Validate date ranges if both dates have been supplied.
        portfolioForm.querySelectorAll('input[type="date"]').forEach(start => {
            if (!start.name.endsWith('[start_date]')) {
                return;
            }

            const endName = start.name.replace('[start_date]', '[end_date]');
            const end = portfolioForm.querySelector(
                `input[name="${endName}"]`
            );

            if (end && start.value && end.value && end.value < start.value) {
                end.classList.add('invalid-field');

                if (!firstInvalid) {
                    firstInvalid = end;
                }
            }
        });

        if (firstInvalid) {
            event.preventDefault();

            firstInvalid.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });

            if (typeof firstInvalid.focus === 'function') {
                firstInvalid.focus({ preventScroll: true });
            }
        }
    });

    // Keep the project empty-state message correct after page load.
    updateProjectEmptyMessage();
</script>

</body>
</html>
