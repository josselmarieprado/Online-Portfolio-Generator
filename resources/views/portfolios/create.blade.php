<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Portfolio | B.O.R.N.FOLIO</title>

    <style>
        :root {
            --primary: #1976d2;
            --primary-dark: #125eaa;
            --background: #f5f8fc;
            --surface: #ffffff;
            --text: #202733;
            --muted: #687386;
            --border: #e2e8f0;
            --danger: #dc3545;
            --danger-bg: #fff2f3;
            --success: #16834a;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
            line-height: 1.6;
        }

        button, input, textarea, select { font: inherit; }
        a { text-decoration: none; }

        /* NAVIGATION */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255,255,255,.97);
            border-bottom: 1px solid var(--border);
        }

        .nav-inner {
            width: min(1250px, calc(100% - 36px));
            min-height: 72px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: #244e7b;
            font-size: 20px;
            font-weight: 800;
            white-space: nowrap;
        }

        .brand-icon {
            color: var(--primary);
            font-size: 24px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 42px;
            padding: 10px 16px;
            border: 1px solid #d6e0eb;
            border-radius: 9px;
            background: #fff;
            color: #244e7b;
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
        }

        .nav-button:hover {
            background: #eaf3ff;
            border-color: var(--primary);
            color: var(--primary-dark);
        }

        .nav-button.primary {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }

        .nav-button.primary:hover {
            background: var(--primary-dark);
        }

        /* PAGE */
        .container {
            width: min(1080px, calc(100% - 32px));
            margin: auto;
            padding: 35px 0 60px;
        }

        .page-heading { margin-bottom: 24px; }

        .eyebrow {
            display: inline-block;
            margin-bottom: 12px;
            padding: 6px 12px;
            border-radius: 30px;
            background: #eaf3ff;
            color: var(--primary-dark);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        h1 {
            margin: 0 0 12px;
            font-size: clamp(29px, 4vw, 42px);
            line-height: 1.2;
            letter-spacing: -1px;
        }

        .gradient-text { color: var(--primary); }

        .subtitle {
            max-width: 720px;
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
            padding: 17px 20px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #fff;
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
            padding: 7px 11px;
            border-radius: 30px;
            background: #eaf3ff;
            color: var(--primary-dark);
            font-size: 10px;
            font-weight: 800;
        }

        .form-card {
            padding: 30px;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: #fff;
            box-shadow: 0 12px 35px rgba(31,65,105,.06);
        }

        .section {
            padding: 26px 0;
            border-top: 1px solid var(--border);
        }

        .section:first-child {
            padding-top: 0;
            border-top: 0;
        }

        .section-heading {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            margin-bottom: 20px;
        }

        .section-number {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            width: 39px;
            height: 39px;
            border-radius: 11px;
            background: #eaf3ff;
            color: var(--primary-dark);
            font-weight: 800;
        }

        .section-heading h2 {
            margin: 0 0 4px;
            font-size: 19px;
        }

        .section-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 17px;
        }

        .field { min-width: 0; margin-bottom: 16px; }
        .field:last-child { margin-bottom: 0; }
        .full { grid-column: 1 / -1; }

        .field label {
            display: block;
            margin-bottom: 7px;
            color: #344054;
            font-size: 12px;
            font-weight: 700;
        }

        .required { color: var(--danger); }

        input:not([type="radio"]):not([type="checkbox"]):not([type="file"]),
        textarea,
        select {
            display: block;
            width: 100%;
            min-height: 44px;
            padding: 11px 13px;
            border: 1px solid #cfd8e3;
            border-radius: 9px;
            outline: none;
            background: #fff;
            color: var(--text);
            font-size: 13px;
            transition: border-color .2s, box-shadow .2s;
        }

        input[type="file"] {
            display: block;
            width: 100%;
            padding: 11px;
            border: 1px solid #cfd8e3;
            border-radius: 9px;
            background: #fff;
            font-size: 12px;
        }

        input::placeholder, textarea::placeholder { color: #98a2b3; }

        input:focus, textarea:focus, select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(25,118,210,.12);
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        /* RED VALIDATION */
        .invalid-field,
        input.invalid-field,
        textarea.invalid-field,
        select.invalid-field,
        .templates.invalid-field {
            border: 1.5px solid var(--danger) !important;
            background-color: var(--danger-bg) !important;
            box-shadow: 0 0 0 3px rgba(220,53,69,.08) !important;
        }

        .error {
            margin-top: 6px;
            color: var(--danger);
            font-size: 12px;
            font-weight: 600;
        }

        .error-summary {
            margin-bottom: 22px;
            padding: 15px 18px;
            border: 1px solid #f1b9c0;
            border-radius: 11px;
            background: var(--danger-bg);
            color: #a32030;
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
        }

        /* PHOTO */
        .photo-box {
            display: grid;
            grid-template-columns: 110px minmax(0,1fr);
            align-items: center;
            gap: 20px;
            padding: 18px;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: #f9fbfe;
        }

        .photo-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100px;
            height: 100px;
            overflow: hidden;
            border: 2px solid #d5e5f8;
            border-radius: 50%;
            background: #eaf3ff;
            color: var(--primary-dark);
            font-size: 17px;
            font-weight: 800;
        }

        .photo-placeholder img {
            display: none;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-placeholder.has-image img { display: block; }
        .photo-placeholder.has-image span { display: none; }

        /* REPEATABLE ENTRIES */
        .entry {
            margin-bottom: 14px;
            padding: 18px;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: #fbfcfe;
        }

        .entry-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 16px;
        }

        .entry-header h3 {
            margin: 0;
            color: #244e7b;
            font-size: 14px;
        }

        .empty-message {
            margin: 0 0 14px;
            padding: 15px;
            border: 1px dashed #cfd8e3;
            border-radius: 10px;
            background: #fbfcfe;
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
            border: 1px solid var(--primary);
            border-radius: 9px;
            background: var(--primary);
            color: #fff;
            font-size: 12px;
            font-weight: 800;
            text-align: center;
            cursor: pointer;
            transition: .2s;
        }

        .btn:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-secondary {
            background: #fff;
            color: #244e7b;
            border-color: #cfd8e3;
        }

        .btn-secondary:hover {
            background: #eaf3ff;
            color: var(--primary-dark);
            border-color: var(--primary);
        }

        .btn-remove {
            min-height: 31px;
            padding: 6px 10px;
            border-color: #f1b9c0;
            background: #fff2f3;
            color: var(--danger);
            font-size: 11px;
        }

        .btn-remove:hover {
            border-color: var(--danger);
            background: #ffe4e7;
            color: #a32030;
        }

        .add-button { margin-top: 2px; }

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
            padding: 3px;
            border: 1px solid transparent;
            border-radius: 14px;
        }

        .template-option {
            position: relative;
            min-width: 0;
            overflow: hidden;
            border: 2px solid var(--border);
            border-radius: 13px;
            background: #fff;
            transition: .2s;
        }

        .template-option:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(31,65,105,.09);
        }

        .template-option:has(input:checked) {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(25,118,210,.10);
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
            accent-color: var(--primary);
            cursor: pointer;
        }

        .template-preview {
            display: flex;
            min-height: 165px;
            align-items: center;
            justify-content: center;
            padding: 15px;
        }

        .simple-preview { background: linear-gradient(135deg,#eaf3ff,#d6e6fa); }
        .modern-preview { background: linear-gradient(135deg,#1769c2,#0d47a1); }
        .creative-preview { background: linear-gradient(135deg,#092c2d,#155e59); }

        .mock-page {
            width: 100%;
            min-height: 125px;
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 6px 15px rgba(0,0,0,.10);
        }

        .modern-preview .mock-page { border-top: 4px solid #60a5fa; }
        .creative-preview .mock-page {
            border-color: #155e59;
            background: #123c3c;
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
            background: linear-gradient(135deg,#dbeafe,#60a5fa);
        }

        .mock-heading {
            color: #244e7b;
            font-size: 8px;
            font-weight: 800;
        }

        .mock-subheading { color: #64748b; font-size: 7px; }
        .creative-preview .mock-heading { color: #e6fffb; }
        .creative-preview .mock-subheading { color: #b7dcd7; }

        .mock-line {
            width: 100%;
            height: 4px;
            margin: 7px 0;
            border-radius: 8px;
            background: #e2e8f0;
        }

        .mock-line.short {
            width: 48%;
            height: 5px;
            background: #1976d2;
        }

        .mock-line.medium { width: 72%; }
        .creative-preview .mock-line { background: #356866; }
        .creative-preview .mock-line.short { background: #53b8a8; }

        .mock-section-title {
            margin: 9px 0 5px;
            color: #1976d2;
            font-size: 7px;
            font-weight: 800;
        }

        .creative-preview .mock-section-title { color: #9cebdc; }

        .mock-tag {
            display: inline-block;
            margin: 4px 3px 0 0;
            padding: 3px 6px;
            border-radius: 4px;
            background: #dbeafe;
            color: #125eaa;
            font-size: 7px;
            font-weight: 700;
        }

        .creative-preview .mock-tag {
            background: #245451;
            color: #e6fffb;
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
            background: #eaf3ff;
            color: #125eaa;
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .template-info h3 { margin: 0 0 7px; font-size: 15px; }

        .template-info p {
            margin: 0;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
        }

        .selected-hint {
            display: none;
            margin-top: 12px;
            color: var(--primary-dark);
            font-size: 10px;
            font-weight: 800;
        }

        .template-option:has(input:checked) .selected-hint { display: block; }

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
            background: #fff;
            color: var(--muted);
            font-size: 12px;
            text-align: center;
        }

        .footer p { margin: 0; }

        @media (max-width: 800px) {
            .nav-inner { flex-wrap: wrap; padding: 12px 0; gap: 12px; }
            .nav-links { gap: 8px; }
            .templates { grid-template-columns: 1fr; }
            .template-preview { min-height: 180px; }
            .form-card { padding: 23px; }
        }

        @media (max-width: 560px) {
            .nav-inner {
                width: calc(100% - 24px);
                justify-content: flex-start;
            }

            .brand { font-size: 17px; }
            .nav-links { width: 100%; }
            .nav-button { min-height: 38px; padding: 8px 10px; font-size: 11px; }
            .container { width: calc(100% - 24px); padding-top: 25px; }
            .grid { grid-template-columns: 1fr; gap: 0; }
            .full { grid-column: auto; }
            .form-card { padding: 17px; border-radius: 15px; }
            .section { padding: 22px 0; }
            .photo-box { grid-template-columns: 1fr; }
            .progress-card { align-items: flex-start; flex-direction: column; }
            .entry { padding: 14px; }
            .form-actions { align-items: stretch; flex-direction: column; }
            .form-actions .btn { width: 100%; }
        }
    </style>
</head>

<body>

{{-- NAVIGATION: BACK TO HOME + MANAGE PORTFOLIOS, NO LOG OUT --}}
<header class="navbar">
    <div class="nav-inner">

        <a href="{{ url('/') }}" class="brand">
            <span class="brand-icon">▣</span>
            <span>B.O.R.N.FOLIO</span>
        </a>

        <nav class="nav-links" aria-label="Main navigation">
            <a href="{{ url('/') }}" class="nav-button">
                <span aria-hidden="true">&larr;</span>
                Back to Home
            </a>

            <a href="{{ route('portfolios.index') }}" class="nav-button">
                <span aria-hidden="true">&#9776;</span>
                Manage Portfolios
            </a>
        </nav>

    </div>
</header>

<main class="container">

    <div class="page-heading">
        <span class="eyebrow">YOUR FUTURE, YOUR PORTFOLIO</span>

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

        <form method="POST"
              action="{{ route('portfolios.store') }}"
              enctype="multipart/form-data"
              id="portfolioForm">
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
                        <input type="file"
                               id="profile_picture"
                               name="profile_picture"
                               accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">

                        <p class="help-text">JPG, JPEG, PNG, or WEBP. Maximum size: 2 MB.</p>

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
                        <label for="full_name">Full Name <span class="required">*</span></label>
                        <input type="text" id="full_name" name="full_name"
                               value="{{ old('full_name') }}"
                               maxlength="255" placeholder="Enter your full name" required>
                        @error('full_name') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="field">
                        <label for="professional_title">Professional Title</label>
                        <input type="text" id="professional_title" name="professional_title"
                               value="{{ old('professional_title') }}"
                               maxlength="255" placeholder="e.g. Web Developer">
                        @error('professional_title') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" id="email" name="email"
                               value="{{ old('email') }}"
                               maxlength="255" placeholder="you@example.com" required>
                        @error('email') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="field">
                        <label for="contact_number">Phone</label>
                        <input type="tel" id="contact_number" name="contact_number"
                               value="{{ old('contact_number') }}"
                               maxlength="50" placeholder="Your contact number">
                        @error('contact_number') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="field full">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address"
                               value="{{ old('address') }}"
                               maxlength="255" placeholder="City, Province">
                        @error('address') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="field full">
                        <label for="about_me">About Me</label>
                        <textarea id="about_me" name="about_me"
                                  placeholder="Introduce yourself, your interests, and your career goals...">{{ old('about_me') }}</textarea>
                        @error('about_me') <div class="error">{{ $message }}</div> @enderror
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
                    @foreach (old('educations', []) as $i => $edu)
                        <div class="entry">
                            <div class="entry-header">
                                <h3>Education</h3>
                                <button type="button" class="btn btn-remove" onclick="removeEntry(this)">Remove</button>
                            </div>

                            <div class="grid">
                                <div class="field">
                                    <label>School / University</label>
                                    <input type="text" name="educations[{{ $i }}][school]"
                                           value="{{ $edu['school'] ?? '' }}" maxlength="255"
                                           placeholder="School name">
                                    @error("educations.$i.school") <div class="error">{{ $message }}</div> @enderror
                                </div>

                                <div class="field">
                                    <label>Degree / Course</label>
                                    <input type="text" name="educations[{{ $i }}][degree]"
                                           value="{{ $edu['degree'] ?? '' }}" maxlength="255"
                                           placeholder="e.g. BS Information Technology">
                                    @error("educations.$i.degree") <div class="error">{{ $message }}</div> @enderror
                                </div>

                                <div class="field">
                                    <label>Start Date</label>
                                    <input type="date" name="educations[{{ $i }}][start_date]"
                                           value="{{ $edu['start_date'] ?? '' }}">
                                    @error("educations.$i.start_date") <div class="error">{{ $message }}</div> @enderror
                                </div>

                                <div class="field">
                                    <label>End Date</label>
                                    <input type="date" name="educations[{{ $i }}][end_date]"
                                           value="{{ $edu['end_date'] ?? '' }}">
                                    <p class="help-text">Leave blank if still studying.</p>
                                    @error("educations.$i.end_date") <div class="error">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn add-button" onclick="addEducation()">+ Add Education</button>
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
                    @foreach (old('skills', []) as $i => $skill)
                        <div class="skill-row">
                            <div class="field">
                                <input type="text" name="skills[{{ $i }}][skill_name]"
                                       value="{{ $skill['skill_name'] ?? '' }}"
                                       maxlength="255" placeholder="e.g. HTML, CSS, Laravel"
                                       aria-label="Skill name">
                                @error("skills.$i.skill_name") <div class="error">{{ $message }}</div> @enderror
                            </div>
                            <button type="button" class="btn btn-remove" onclick="removeEntry(this)">Remove</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn add-button" onclick="addSkill()">+ Add Skill</button>
            </section>

            {{-- 05 WORK EXPERIENCE --}}
            <section class="section">
                <div class="section-heading">
                    <div class="section-number">05</div>
                    <div>
                        <h2>Work Experience</h2>
                        <p>Add a previous or current job, internship, or relevant experience.</p>
                    </div>
                </div>

                <div id="experienceContainer">
                    @foreach (old('experiences', []) as $i => $exp)
                        <div class="entry">
                            <div class="entry-header">
                                <h3>Work Experience</h3>
                                <button type="button" class="btn btn-remove" onclick="removeEntry(this)">Remove</button>
                            </div>

                            <div class="grid">
                                <div class="field">
                                    <label>Job Title</label>
                                    <input type="text" name="experiences[{{ $i }}][job_title]"
                                           value="{{ $exp['job_title'] ?? '' }}" maxlength="255"
                                           placeholder="e.g. Web Developer Intern">
                                    @error("experiences.$i.job_title") <div class="error">{{ $message }}</div> @enderror
                                </div>

                                <div class="field">
                                    <label>Company / Organization</label>
                                    <input type="text" name="experiences[{{ $i }}][company]"
                                           value="{{ $exp['company'] ?? '' }}" maxlength="255"
                                           placeholder="Company name">
                                    @error("experiences.$i.company") <div class="error">{{ $message }}</div> @enderror
                                </div>

                                <div class="field">
                                    <label>Start Date</label>
                                    <input type="date" name="experiences[{{ $i }}][start_date]"
                                           value="{{ $exp['start_date'] ?? '' }}">
                                    @error("experiences.$i.start_date") <div class="error">{{ $message }}</div> @enderror
                                </div>

                                <div class="field">
                                    <label>End Date</label>
                                    <input type="date" name="experiences[{{ $i }}][end_date]"
                                           value="{{ $exp['end_date'] ?? '' }}">
                                    <p class="help-text">Leave blank if currently working there.</p>
                                    @error("experiences.$i.end_date") <div class="error">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn add-button" onclick="addExperience()">+ Add Work Experience</button>
            </section>

            {{-- 06 PROJECTS: EMPTY BY DEFAULT --}}
            <section class="section">
                <div class="section-heading">
                    <div class="section-number">06</div>
                    <div>
                        <h2>Projects</h2>
                        <p>Add school projects, personal projects, or completed work.</p>
                    </div>
                </div>

                <div id="projectContainer">
                    @foreach (old('projects', []) as $i => $project)
                        <div class="entry">
                            <div class="entry-header">
                                <h3>Project</h3>
                                <button type="button" class="btn btn-remove" onclick="removeEntry(this)">Remove Project</button>
                            </div>

                            <div class="field">
                                <label>Project Title</label>
                                <input type="text" name="projects[{{ $i }}][project_title]"
                                       value="{{ $project['project_title'] ?? '' }}"
                                       maxlength="255" placeholder="e.g. Student Portfolio Website">
                                @error("projects.$i.project_title") <div class="error">{{ $message }}</div> @enderror
                            </div>

                            <div class="field">
                                <label>Description</label>
                                <textarea name="projects[{{ $i }}][description]"
                                          placeholder="Describe your project and what you accomplished...">{{ $project['description'] ?? '' }}</textarea>
                                @error("projects.$i.description") <div class="error">{{ $message }}</div> @enderror
                            </div>

                            <div class="field">
                                <label>Project URL</label>
                                <input type="url" name="projects[{{ $i }}][project_url]"
                                       value="{{ $project['project_url'] ?? '' }}"
                                       maxlength="2048" placeholder="https://example.com">
                                @error("projects.$i.project_url") <div class="error">{{ $message }}</div> @enderror
                            </div>

                            <div class="field">
                                <label>Technologies Used</label>
                                <input type="text" name="projects[{{ $i }}][technologies_used]"
                                       value="{{ $project['technologies_used'] ?? '' }}"
                                       maxlength="1000" placeholder="HTML, CSS, Laravel">
                                @error("projects.$i.technologies_used") <div class="error">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    @endforeach
                </div>

                <p class="empty-message" id="projectEmptyMessage"
                   @if (count(old('projects', [])) > 0) hidden @endif>
                    No projects added yet. Click "+ Add Project" when you're ready.
                </p>

                <button type="button" class="btn add-button" onclick="addProject()">+ Add Project</button>
            </section>

            {{-- 07 SOCIAL LINKS --}}
            <section class="section">
                <div class="section-heading">
                    <div class="section-number">07</div>
                    <div>
                        <h2>Social Links</h2>
                        <p>Add a platform name and its profile URL.</p>
                    </div>
                </div>

                <div id="socialContainer">
                    @foreach (old('socials', []) as $i => $social)
                        <div class="entry">
                            <div class="entry-header">
                                <h3>Social Link</h3>
                                <button type="button" class="btn btn-remove" onclick="removeEntry(this)">Remove</button>
                            </div>

                            <div class="grid">
                                <div class="field">
                                    <label>Platform Name</label>
                                    <input type="text" name="socials[{{ $i }}][platform_name]"
                                           value="{{ $social['platform_name'] ?? '' }}"
                                           maxlength="255" placeholder="e.g. LinkedIn, GitHub">
                                    @error("socials.$i.platform_name") <div class="error">{{ $message }}</div> @enderror
                                </div>

                                <div class="field">
                                    <label>Profile URL</label>
                                    <input type="url" name="socials[{{ $i }}][url]"
                                           value="{{ $social['url'] ?? '' }}"
                                           maxlength="2048" placeholder="https://example.com/your-profile">
                                    @error("socials.$i.url") <div class="error">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn add-button" onclick="addSocial()">+ Add Social Link</button>
            </section>

            {{-- 08 TEMPLATE SELECTION --}}
            <section class="section">
                <div class="section-heading">
                    <div class="section-number">08</div>
                    <div>
                        <h2>Choose Your Portfolio Template</h2>
                        <p>Select the design you want to use for your portfolio.</p>
                    </div>
                </div>

                <p class="template-intro">Choose one template before creating your portfolio.</p>

                @php
                    $selectedTemplate = old('template', 'simple');
                @endphp

                <div class="templates" id="templateOptions">

                    {{-- SIMPLE --}}
                    <article class="template-option">
                        <input class="template-select"
                               type="radio" id="template_simple"
                               name="template" value="simple"
                               {{ $selectedTemplate === 'simple' ? 'checked' : '' }} required>

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
                                <p>A clean, minimal layout that highlights your biography, education, skills, and experience.</p>
                                <span class="selected-hint">✓ Selected design</span>
                            </div>
                        </label>
                    </article>

                    {{-- MODERN --}}
                    <article class="template-option">
                        <input class="template-select"
                               type="radio" id="template_modern"
                               name="template" value="modern"
                               {{ $selectedTemplate === 'modern' ? 'checked' : '' }}>

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
                                <p>A polished design for students, job seekers, and professionals showcasing their achievements.</p>
                                <span class="selected-hint">✓ Selected design</span>
                            </div>
                        </label>
                    </article>

                    {{-- CREATIVE --}}
                    <article class="template-option">
                        <input class="template-select"
                               type="radio" id="template_creative"
                               name="template" value="creative"
                               {{ $selectedTemplate === 'creative' ? 'checked' : '' }}>

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
                                <p>A distinctive style for designers, developers, artists, and expressive portfolios.</p>
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
                <a href="{{ url('/') }}" class="btn btn-secondary">← Back to Home</a>
                <a href="{{ route('portfolios.index') }}" class="btn btn-secondary">Manage Portfolios</a>
                <button type="submit" class="btn" id="submitButton">Create Portfolio →</button>
            </div>

        </form>
    </section>
</main>

<footer class="footer">
    <p>&copy; {{ date('Y') }} B.O.R.N.FOLIO. Build your portfolio, share your story.</p>
</footer>

<script>
    let educationIndex = {{ count(old('educations', [])) }};
    let skillIndex = {{ count(old('skills', [])) }};
    let experienceIndex = {{ count(old('experiences', [])) }};
    let projectIndex = {{ count(old('projects', [])) }};
    let socialIndex = {{ count(old('socials', [])) }};

    function removeEntry(button) {
        const entry = button.closest('.entry, .skill-row');
        if (entry) entry.remove();
        updateProjectEmptyMessage();
    }

    function updateProjectEmptyMessage() {
        const container = document.getElementById('projectContainer');
        const message = document.getElementById('projectEmptyMessage');
        if (container && message) {
            message.hidden = container.querySelectorAll('.entry').length > 0;
        }
    }

    function addEducation() {
        const i = educationIndex++;
        document.getElementById('educationContainer').insertAdjacentHTML('beforeend', `
            <div class="entry">
                <div class="entry-header">
                    <h3>Education</h3>
                    <button type="button" class="btn btn-remove" onclick="removeEntry(this)">Remove</button>
                </div>
                <div class="grid">
                    <div class="field">
                        <label>School / University</label>
                        <input type="text" name="educations[${i}][school]" maxlength="255" placeholder="School name">
                    </div>
                    <div class="field">
                        <label>Degree / Course</label>
                        <input type="text" name="educations[${i}][degree]" maxlength="255" placeholder="e.g. BS Information Technology">
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
        document.getElementById('skillContainer').insertAdjacentHTML('beforeend', `
            <div class="skill-row">
                <div class="field">
                    <input type="text" name="skills[${i}][skill_name]" maxlength="255"
                           placeholder="e.g. HTML, CSS, Laravel" aria-label="Skill name">
                </div>
                <button type="button" class="btn btn-remove" onclick="removeEntry(this)">Remove</button>
            </div>
        `);
    }

    function addExperience() {
        const i = experienceIndex++;
        document.getElementById('experienceContainer').insertAdjacentHTML('beforeend', `
            <div class="entry">
                <div class="entry-header">
                    <h3>Work Experience</h3>
                    <button type="button" class="btn btn-remove" onclick="removeEntry(this)">Remove</button>
                </div>
                <div class="grid">
                    <div class="field">
                        <label>Job Title</label>
                        <input type="text" name="experiences[${i}][job_title]" maxlength="255" placeholder="e.g. Web Developer Intern">
                    </div>
                    <div class="field">
                        <label>Company / Organization</label>
                        <input type="text" name="experiences[${i}][company]" maxlength="255" placeholder="Company name">
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
                    <button type="button" class="btn btn-remove" onclick="removeEntry(this)">Remove Project</button>
                </div>
                <div class="field">
                    <label>Project Title</label>
                    <input type="text" name="projects[${i}][project_title]" maxlength="255" placeholder="e.g. Student Portfolio Website">
                </div>
                <div class="field">
                    <label>Description</label>
                    <textarea name="projects[${i}][description]" placeholder="Describe your project and what you accomplished..."></textarea>
                </div>
                <div class="field">
                    <label>Project URL</label>
                    <input type="url" name="projects[${i}][project_url]" maxlength="2048" placeholder="https://example.com">
                </div>
                <div class="field">
                    <label>Technologies Used</label>
                    <input type="text" name="projects[${i}][technologies_used]" maxlength="1000" placeholder="HTML, CSS, Laravel">
                </div>
            </div>
        `);

        updateProjectEmptyMessage();

        const entries = container.querySelectorAll('.entry');
        entries[entries.length - 1].scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    function addSocial() {
        const i = socialIndex++;
        document.getElementById('socialContainer').insertAdjacentHTML('beforeend', `
            <div class="entry">
                <div class="entry-header">
                    <h3>Social Link</h3>
                    <button type="button" class="btn btn-remove" onclick="removeEntry(this)">Remove</button>
                </div>
                <div class="grid">
                    <div class="field">
                        <label>Platform Name</label>
                        <input type="text" name="socials[${i}][platform_name]" maxlength="255" placeholder="e.g. LinkedIn, GitHub">
                    </div>
                    <div class="field">
                        <label>Profile URL</label>
                        <input type="url" name="socials[${i}][url]" maxlength="2048" placeholder="https://example.com/your-profile">
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

        const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

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

    // CLIENT-SIDE VALIDATION WITH RED BORDERS
    const portfolioForm = document.getElementById('portfolioForm');

    function clearClientError(field) {
        field.classList.remove('invalid-field');
        field.removeAttribute('aria-invalid');

        const wrapper = field.closest('.field');
        if (wrapper) {
            const error = wrapper.querySelector('.client-error');
            if (error) error.remove();
        }
    }

    function showClientError(field, message) {
        field.classList.add('invalid-field');
        field.setAttribute('aria-invalid', 'true');

        const wrapper = field.closest('.field');
        if (wrapper && !wrapper.querySelector('.client-error')) {
            const error = document.createElement('div');
            error.className = 'error client-error';
            error.textContent = message;
            wrapper.appendChild(error);
        }
    }

    portfolioForm.addEventListener('input', function (event) {
        const field = event.target;
        if (field.matches('input, textarea, select')) {
            clearClientError(field);
        }
    });

    portfolioForm.addEventListener('change', function (event) {
        const field = event.target;
        if (field.matches('input, textarea, select')) {
            clearClientError(field);

            if (field.name === 'template') {
                document.getElementById('templateOptions').classList.remove('invalid-field');
            }
        }
    });

    portfolioForm.addEventListener('submit', function (event) {
        let firstInvalid = null;

        portfolioForm.querySelectorAll('.invalid-field').forEach(field => {
            field.classList.remove('invalid-field');
        });

        portfolioForm.querySelectorAll('.client-error').forEach(error => error.remove());

        const requiredFields = portfolioForm.querySelectorAll(
            'input[required]:not([type="radio"]), textarea[required], select[required]'
        );

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                showClientError(field, 'This field is required.');

                if (!firstInvalid) firstInvalid = field;
            } else if (field.type === 'email' && !field.validity.valid) {
                showClientError(field, 'Please enter a valid email address.');

                if (!firstInvalid) firstInvalid = field;
            }
        });

        const emailField = document.getElementById('email');

        if (emailField.value.trim() && !emailField.validity.valid) {
            showClientError(emailField, 'Please enter a valid email address.');
            if (!firstInvalid) firstInvalid = emailField;
        }

        const templateSelected = portfolioForm.querySelector('input[name="template"]:checked');
        const templateOptions = document.getElementById('templateOptions');

        if (!templateSelected) {
            templateOptions.classList.add('invalid-field');

            if (!firstInvalid) firstInvalid = templateOptions;
        } else {
            templateOptions.classList.remove('invalid-field');
        }

        // Date end must not be earlier than start.
        portfolioForm.querySelectorAll('input[type="date"]').forEach(start => {
            if (!start.name.endsWith('[start_date]') || !start.value) return;

            const endName = start.name.replace('[start_date]', '[end_date]');
            const end = portfolioForm.querySelector(
                `input[name="${endName}"]`
            );

            if (end && end.value && end.value < start.value) {
                showClientError(end, 'End date must be on or after the start date.');
                if (!firstInvalid) firstInvalid = end;
            }
        });

        if (firstInvalid) {
            event.preventDefault();

            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });

            if (typeof firstInvalid.focus === 'function') {
                firstInvalid.focus({ preventScroll: true });
            }
        }
    });

    updateProjectEmptyMessage();
</script>

</body>
</html>
