<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Portfolio | B.O.R.N.FOLIO</title>

    <style>
        :root {
            --bg: #F3EEFA;
            --surface: #FFFFFF;
            --surface-soft: #EEEAFD;
            --primary: #9667E0;
            --primary-dark: #7747C5;
            --accent: #AC88E8;
            --text: #29204F;
            --muted: #71658F;
            --border: #DED2F6;
            --danger: #B4233D;
            --danger-bg: #FFF0F2;
            --success: #3B7655;
            --success-bg: #EAF7EF;
            --shadow: 0 12px 35px rgba(91, 61, 145, .08);
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            padding: 36px 20px;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #F8F5FF 0%, #EEE8FC 100%);
            color: var(--text);
            line-height: 1.6;
        }

        button, input, textarea, select { font: inherit; }

        .container {
            width: 100%;
            max-width: 990px;
            margin: 0 auto;
        }

        .page-heading { margin-bottom: 25px; }

        .eyebrow {
            display: inline-block;
            padding: 7px 13px;
            margin: 0 0 12px;
            color: var(--primary-dark);
            background: #EEE8FF;
            border: 1px solid #D9C8FF;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .page-heading h1 {
            margin: 0 0 12px;
            color: var(--text);
            font-size: clamp(30px, 5vw, 40px);
            font-weight: 800;
            line-height: 1.2;
        }

        .page-heading h1 span { color: var(--primary); }

        .subtitle {
            max-width: 690px;
            margin: 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
        }

        .intro-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 18px 20px;
            margin-bottom: 22px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: rgba(255, 255, 255, .9);
        }

        .intro-card strong {
            display: block;
            margin-bottom: 3px;
            font-size: 13px;
        }

        .intro-card p {
            margin: 0;
            color: var(--muted);
            font-size: 11px;
        }

        .intro-badge {
            flex-shrink: 0;
            padding: 7px 12px;
            border-radius: 30px;
            background: #EEE8FF;
            color: var(--primary-dark);
            font-size: 10px;
            font-weight: 800;
        }

        .card {
            padding: 28px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: var(--shadow);
        }

        .section {
            padding: 25px 0;
            border-bottom: 1px solid var(--border);
        }

        .section:first-child { padding-top: 0; }
        .section:last-of-type { border-bottom: 0; }

        .section-heading {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 22px;
        }

        .section-number {
            display: flex;
            flex: 0 0 38px;
            width: 38px;
            height: 38px;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #EEE8FF;
            color: var(--primary-dark);
            font-size: 14px;
            font-weight: 800;
        }

        .section-heading h2 {
            margin: 0 0 4px;
            color: var(--text);
            font-size: 21px;
            font-weight: 800;
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
            gap: 0 20px;
        }

        .date-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0 18px;
        }

        .field { min-width: 0; margin-bottom: 19px; }
        .full { grid-column: 1 / -1; }

        label {
            display: block;
            margin-bottom: 7px;
            color: var(--text);
            font-size: 13px;
            font-weight: 700;
        }

        .required { color: var(--primary-dark); }

        input:not([type="radio"]):not([type="checkbox"]),
        textarea,
        select {
            display: block;
            width: 100%;
            min-height: 44px;
            padding: 11px 13px;
            border: 1px solid #D9C8F5;
            border-radius: 10px;
            outline: none;
            background: #FFFFFF;
            color: var(--text);
            font-size: 13px;
            transition: border-color .2s, box-shadow .2s;
        }

        input[type="file"] { padding: 10px !important; }

        input:focus, textarea:focus, select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(150, 103, 224, .15);
        }

        textarea { min-height: 115px; resize: vertical; }

        input[type="radio"] { accent-color: var(--primary); }

        .help-text {
            display: block;
            margin-top: 7px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .photo-box {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #FBF9FF;
        }

        .photo-preview {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .photo-preview img {
            display: block;
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 3px solid #D9C8FF;
            border-radius: 50%;
            background: #EEE8FF;
        }

        .photo-placeholder {
            display: flex;
            width: 100px;
            height: 100px;
            flex: 0 0 100px;
            align-items: center;
            justify-content: center;
            border: 2px solid #D9C8FF;
            border-radius: 50%;
            background: #EEE8FF;
            color: var(--primary-dark);
            font-size: 20px;
            font-weight: 800;
        }

        .photo-upload { flex: 1; min-width: 220px; margin: 0; }

        .entry {
            padding: 20px;
            margin-bottom: 16px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #FBF9FF;
        }

        .entry-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 18px;
        }

        .entry-header h3 {
            margin: 0;
            color: var(--primary-dark);
            font-size: 15px;
        }

        .error {
            margin-top: 6px;
            color: var(--danger);
            font-size: 12px;
        }

        .error-summary, .success-message {
            padding: 15px 18px;
            margin-bottom: 22px;
            border-radius: 12px;
            font-size: 13px;
        }

        .error-summary {
            border: 1px solid #F1C9D0;
            background: var(--danger-bg);
            color: var(--danger);
        }

        .error-summary ul { padding-left: 20px; margin-bottom: 0; }

        .success-message {
            border: 1px solid #CDE7D5;
            background: var(--success-bg);
            color: var(--success);
        }

        .template-intro {
            margin: -8px 0 22px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .templates {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            align-items: stretch;
            gap: 17px;
        }

        .template {
            position: relative;
            display: flex;
            min-width: 0;
            flex-direction: column;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 15px;
            background: var(--surface);
            cursor: pointer;
            transition: transform .2s, border-color .2s, box-shadow .2s;
        }

        .template:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(91, 61, 145, .12);
        }

        .template:has(input:checked) {
            border: 2px solid var(--primary);
            box-shadow: 0 0 0 3px rgba(150, 103, 224, .12);
        }

        .template-radio {
            position: absolute;
            top: 13px;
            right: 13px;
            z-index: 2;
            width: 19px;
            height: 19px;
            cursor: pointer;
        }

        .preview-area {
            display: flex;
            height: 165px;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 16px;
        }

        .simple-area {
            background: linear-gradient(135deg, #EEEAFD, #D8CAF6);
        }

        .modern-area {
            background: linear-gradient(135deg, #D8CAF6, #AC88E8);
        }

        .creative-area {
            background: linear-gradient(135deg, #AC88E8, #9667E0);
        }

        .mini-page {
            width: 100%;
            max-width: 270px;
            height: 132px;
            padding: 12px;
            overflow: hidden;
            border-radius: 8px;
            background: #FFFFFF;
            box-shadow: 0 5px 15px rgba(41, 32, 79, .13);
        }

        .modern-area .mini-page { border-top: 4px solid #9667E0; }

        .creative-area .mini-page {
            border: 1px solid #7650B3;
            background: #29204F;
            color: #FFFFFF;
        }

        .mini-profile {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 9px;
        }

        .mini-avatar {
            width: 28px;
            height: 28px;
            flex-shrink: 0;
            border-radius: 50%;
            background: linear-gradient(135deg, #AC88E8, #EEEAFD);
        }

        .modern-area .mini-avatar {
            background: linear-gradient(135deg, #7747C5, #D8CAF6);
        }

        .creative-area .mini-avatar {
            background: linear-gradient(135deg, #CDB8FA, #9667E0);
        }

        .mini-name {
            margin-bottom: 3px;
            color: #29204F;
            font-size: 9px;
            font-weight: 800;
        }

        .mini-subtitle { color: #71658F; font-size: 7px; }

        .creative-area .mini-name { color: #E9DEFF; }
        .creative-area .mini-subtitle { color: #D2C0F5; }

        .mini-accent {
            width: 45%;
            height: 5px;
            margin-bottom: 8px;
            border-radius: 4px;
            background: #9667E0;
        }

        .modern-area .mini-accent { background: #7747C5; }
        .creative-area .mini-accent { background: #CDB8FA; }

        .mini-heading {
            margin: 6px 0;
            color: #7747C5;
            font-size: 7px;
            font-weight: 800;
        }

        .creative-area .mini-heading { color: #E9DEFF; }

        .mini-line {
            height: 4px;
            margin-bottom: 4px;
            border-radius: 4px;
            background: #E5DDF4;
        }

        .mini-line.short { width: 70%; }
        .creative-area .mini-line { background: #574477; }

        .mini-tags { display: flex; gap: 4px; margin-top: 7px; }

        .mini-tag {
            padding: 3px 5px;
            border-radius: 4px;
            background: #EEE8FF;
            color: #7747C5;
            font-size: 6px;
            font-weight: 700;
        }

        .creative-area .mini-tag {
            background: #574477;
            color: #F0E7FF;
        }

        .template-content {
            display: flex;
            flex: 1;
            flex-direction: column;
            padding: 16px;
        }

        .template-badge {
            align-self: flex-start;
            padding: 5px 9px;
            margin-bottom: 10px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .5px;
        }

        .simple-badge, .modern-badge, .creative-badge {
            color: #7747C5;
            background: #EEE8FF;
        }

        .template-title {
            margin: 0 0 8px;
            color: var(--text);
            font-size: 18px;
        }

        .template-description {
            flex: 1;
            margin: 0 0 17px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        .template-select {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: auto;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: #F1EBFF;
            color: var(--primary-dark);
            text-align: center;
            font-size: 12px;
            font-weight: 800;
        }

        .template:has(input:checked) .template-select {
            border-color: var(--primary);
            background: var(--primary);
            color: #FFFFFF;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            padding-top: 28px;
        }

        .btn {
            display: inline-flex;
            min-height: 44px;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border: 1px solid transparent;
            border-radius: 9px;
            background: var(--primary);
            color: #FFFFFF;
            text-align: center;
            text-decoration: none;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: background .2s, transform .2s;
        }

        .btn:hover { background: var(--primary-dark); }

        .btn:focus-visible {
            outline: 3px solid #CDB8FA;
            outline-offset: 3px;
        }

        .secondary {
            border-color: var(--border);
            background: #FFFFFF;
            color: var(--primary-dark);
        }

        .secondary:hover {
            background: #F3EEFA;
            color: var(--primary-dark);
        }

        .add-btn {
            margin: 0 0 8px;
            border-color: var(--border);
            background: #EEE8FF;
            color: var(--primary-dark);
        }

        .add-btn:hover {
            background: #DED2F6;
            color: var(--primary-dark);
        }

        .remove-btn {
            min-height: 35px;
            padding: 8px 12px;
            border-color: #F1C9D0;
            background: var(--danger-bg);
            color: var(--danger);
            font-size: 11px;
        }

        .remove-btn:hover {
            background: #FADDE2;
            color: var(--danger);
        }

        @media (max-width: 850px) {
            .templates { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .card { padding: 24px; }
        }

        @media (max-width: 600px) {
            body { padding: 22px 12px; }

            .card {
                padding: 18px;
                border-radius: 15px;
            }

            .intro-card { align-items: flex-start; }
            .intro-badge { font-size: 9px; }

            .grid, .date-grid, .templates { grid-template-columns: 1fr; }
            .full { grid-column: auto; }
            .section { padding: 22px 0; }
            .entry { padding: 15px; }
            .photo-upload { min-width: 100%; }

            .actions { flex-direction: column; }
            .actions .btn { width: 100%; }
        }
    </style>
</head>

<body>
<main class="container">

    <header class="page-heading">
        <p class="eyebrow">YOUR FUTURE, YOUR PORTFOLIO</p>
        <h1>Edit Your Portfolio <span>with Ease.</span></h1>
        <p class="subtitle">
            Update your personal information, education, skills, work experience,
            projects, and social links. Then choose a design that represents you.
        </p>
    </header>

    <div class="intro-card">
        <div>
            <strong>Update your professional profile</strong>
            <p>Review your information and select your preferred portfolio design.</p>
        </div>
        <span class="intro-badge">EDIT PORTFOLIO</span>
    </div>

    @if (session('success'))
        <div class="success-message" role="status">
            {{ session('success') }}
        </div>
    @endif

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

    <section class="card">
        <form method="POST"
              action="{{ route('portfolios.update', $portfolio) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- 01 PROFILE PHOTO -->
            <div class="section">
                <div class="section-heading">
                    <span class="section-number">01</span>
                    <div>
                        <h2>Profile Photo</h2>
                        <p>Add a photo to personalize your portfolio.</p>
                    </div>
                </div>

                <div class="photo-box">
                    @if ($portfolio->photo)
                        <div class="photo-preview">
                            <img src="{{ asset('storage/' . $portfolio->photo) }}"
                                 alt="Current profile photo">
                        </div>
                    @else
                        <div class="photo-placeholder" id="photo-placeholder">PHOTO</div>
                    @endif

                    <div class="field photo-upload">
                        <label for="profile_picture">Upload Profile Photo</label>
                        <input id="profile_picture"
                               type="file"
                               name="profile_picture"
                               accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                        <span class="help-text">
                            JPG, JPEG, PNG, or WEBP. Maximum size: 2 MB.
                            Leave empty to keep your current photo.
                        </span>
                        @error('profile_picture')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div id="new-photo-preview" class="photo-preview"
                     style="display:none; margin-top:16px;">
                    <img id="new-photo-image" src="" alt="New profile photo preview">
                    <div>
                        <strong>New profile photo</strong>
                        <span class="help-text">This photo will be uploaded when you save.</span>
                    </div>
                </div>
            </div>

            <!-- 02 PERSONAL INFORMATION -->
            <div class="section">
                <div class="section-heading">
                    <span class="section-number">02</span>
                    <div>
                        <h2>Personal Information</h2>
                        <p>Tell visitors who you are and what you do.</p>
                    </div>
                </div>

                <div class="grid">
                    <div class="field">
                        <label for="full_name">Full Name <span class="required">*</span></label>
                        <input id="full_name" name="full_name" required maxlength="255"
                               value="{{ old('full_name', $portfolio->full_name) }}">
                        @error('full_name') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="field">
                        <label for="professional_title">Professional Title</label>
                        <input id="professional_title" name="professional_title" maxlength="255"
                               value="{{ old('professional_title', $portfolio->professional_title) }}"
                               placeholder="e.g. Web Developer">
                        @error('professional_title') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email Address <span class="required">*</span></label>
                        <input id="email" type="email" name="email" required maxlength="255"
                               value="{{ old('email', $portfolio->email) }}">
                        @error('email') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="field">
                        <label for="contact_number">Phone Number</label>
                        <input id="contact_number" name="contact_number" maxlength="255"
                               value="{{ old('contact_number', $portfolio->phone) }}"
                               placeholder="Your contact number">
                        @error('contact_number') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="field full">
                        <label for="address">Address</label>
                        <input id="address" name="address" maxlength="255"
                               value="{{ old('address', $portfolio->address) }}"
                               placeholder="City, Province, Country">
                        @error('address') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <div class="field full">
                        <label for="about_me">About Me</label>
                        <textarea id="about_me" name="about_me"
                                  placeholder="Write a short introduction about yourself...">{{ old('about_me', $portfolio->about_me) }}</textarea>
                        @error('about_me') <div class="error">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <!-- 03 EDUCATION -->
            <div class="section">
                <div class="section-heading">
                    <span class="section-number">03</span>
                    <div>
                        <h2>Education</h2>
                        <p>Add your school, course, and study dates.</p>
                    </div>
                </div>

                @php
                    $educationItems = old('educations', $portfolio->educations->map(fn ($item) => [
                        'school' => $item->school_name,
                        'degree' => $item->degree,
                        'start_date' => $item->start_date
                            ? \Illuminate\Support\Carbon::parse($item->start_date)->format('Y-m-d')
                            : '',
                        'end_date' => $item->end_date
                            ? \Illuminate\Support\Carbon::parse($item->end_date)->format('Y-m-d')
                            : '',
                    ])->toArray());
                @endphp

                <div id="education-list">
                    @foreach ($educationItems as $i => $edu)
                        <div class="entry">
                            <div class="entry-header">
                                <h3>Education {{ $loop->iteration }}</h3>
                                <button type="button" class="btn remove-btn"
                                        onclick="removeEntry(this)">Remove</button>
                            </div>

                            <div class="grid">
                                <div class="field">
                                    <label for="school_{{ $i }}">School Name</label>
                                    <input id="school_{{ $i }}"
                                           name="educations[{{ $i }}][school]"
                                           maxlength="255"
                                           value="{{ $edu['school'] ?? '' }}">
                                </div>
                                <div class="field">
                                    <label for="degree_{{ $i }}">Degree / Course</label>
                                    <input id="degree_{{ $i }}"
                                           name="educations[{{ $i }}][degree]"
                                           maxlength="255"
                                           value="{{ $edu['degree'] ?? '' }}">
                                </div>
                            </div>

                            <div class="date-grid">
                                <div class="field">
                                    <label for="education_start_date_{{ $i }}">Start Date</label>
                                    <input type="date" id="education_start_date_{{ $i }}"
                                           name="educations[{{ $i }}][start_date]"
                                           value="{{ $edu['start_date'] ?? '' }}">
                                    @error("educations.$i.start_date")
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label for="education_end_date_{{ $i }}">End Date</label>
                                    <input type="date" id="education_end_date_{{ $i }}"
                                           name="educations[{{ $i }}][end_date]"
                                           value="{{ $edu['end_date'] ?? '' }}">
                                    <span class="help-text">Leave blank if you are currently studying.</span>
                                    @error("educations.$i.end_date")
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn add-btn" onclick="addEducation()">+ Add Education</button>
                @error('educations') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- 04 SKILLS -->
            <div class="section">
                <div class="section-heading">
                    <span class="section-number">04</span>
                    <div>
                        <h2>Skills</h2>
                        <p>Highlight your technical and professional abilities.</p>
                    </div>
                </div>

                @php
                    $skillItems = old('skills', $portfolio->skills->map(fn ($item) => [
                        'skill_name' => $item->skill_name,
                    ])->toArray());
                @endphp

                <div id="skills-list">
                    @foreach ($skillItems as $i => $skill)
                        <div class="entry">
                            <div class="entry-header">
                                <h3>Skill {{ $loop->iteration }}</h3>
                                <button type="button" class="btn remove-btn"
                                        onclick="removeEntry(this)">Remove</button>
                            </div>
                            <div class="field">
                                <label for="skill_{{ $i }}">Skill Name</label>
                                <input id="skill_{{ $i }}"
                                       name="skills[{{ $i }}][skill_name]"
                                       maxlength="255"
                                       value="{{ $skill['skill_name'] ?? '' }}"
                                       placeholder="e.g. HTML, CSS, Laravel">
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn add-btn" onclick="addSkill()">+ Add Skill</button>
                @error('skills') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- 05 WORK EXPERIENCE -->
            <div class="section">
                <div class="section-heading">
                    <span class="section-number">05</span>
                    <div>
                        <h2>Work Experience</h2>
                        <p>Include your previous roles and employment dates.</p>
                    </div>
                </div>

                @php
                    $experienceItems = old('experiences', $portfolio->experiences->map(fn ($item) => [
                        'job_title' => $item->job_title,
                        'company' => $item->company_name,
                        'start_date' => $item->start_date
                            ? \Illuminate\Support\Carbon::parse($item->start_date)->format('Y-m-d')
                            : '',
                        'end_date' => $item->end_date
                            ? \Illuminate\Support\Carbon::parse($item->end_date)->format('Y-m-d')
                            : '',
                    ])->toArray());
                @endphp

                <div id="experience-list">
                    @foreach ($experienceItems as $i => $exp)
                        <div class="entry">
                            <div class="entry-header">
                                <h3>Experience {{ $loop->iteration }}</h3>
                                <button type="button" class="btn remove-btn"
                                        onclick="removeEntry(this)">Remove</button>
                            </div>

                            <div class="grid">
                                <div class="field">
                                    <label for="job_title_{{ $i }}">Job Title</label>
                                    <input id="job_title_{{ $i }}"
                                           name="experiences[{{ $i }}][job_title]"
                                           maxlength="255"
                                           value="{{ $exp['job_title'] ?? '' }}"
                                           placeholder="e.g. Junior Developer">
                                </div>
                                <div class="field">
                                    <label for="company_{{ $i }}">Company Name</label>
                                    <input id="company_{{ $i }}"
                                           name="experiences[{{ $i }}][company]"
                                           maxlength="255"
                                           value="{{ $exp['company'] ?? '' }}"
                                           placeholder="Company or organization">
                                </div>
                            </div>

                            <div class="date-grid">
                                <div class="field">
                                    <label for="experience_start_date_{{ $i }}">Start Date</label>
                                    <input type="date" id="experience_start_date_{{ $i }}"
                                           name="experiences[{{ $i }}][start_date]"
                                           value="{{ $exp['start_date'] ?? '' }}">
                                    @error("experiences.$i.start_date")
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label for="experience_end_date_{{ $i }}">End Date</label>
                                    <input type="date" id="experience_end_date_{{ $i }}"
                                           name="experiences[{{ $i }}][end_date]"
                                           value="{{ $exp['end_date'] ?? '' }}">
                                    <span class="help-text">Leave blank if you currently work there.</span>
                                    @error("experiences.$i.end_date")
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn add-btn" onclick="addExperience()">+ Add Experience</button>
                @error('experiences') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- 06 PROJECTS -->
            <div class="section">
                <div class="section-heading">
                    <span class="section-number">06</span>
                    <div>
                        <h2>Projects</h2>
                        <p>Showcase your work and the technologies you used.</p>
                    </div>
                </div>

                @php
                    $projectItems = old('projects', $portfolio->projects->map(fn ($item) => [
                        'project_title' => $item->project_name,
                        'description' => $item->description,
                        'project_url' => $item->project_url,
                        'technologies' => $item->technologies,
                    ])->toArray());
                @endphp

                <div id="project-list">
                    @foreach ($projectItems as $i => $project)
                        <div class="entry">
                            <div class="entry-header">
                                <h3>Project {{ $loop->iteration }}</h3>
                                <button type="button" class="btn remove-btn"
                                        onclick="removeEntry(this)">Remove</button>
                            </div>

                            <div class="field">
                                <label for="project_title_{{ $i }}">Project Title</label>
                                <input id="project_title_{{ $i }}"
                                       name="projects[{{ $i }}][project_title]"
                                       maxlength="255"
                                       value="{{ $project['project_title'] ?? '' }}"
                                       placeholder="Project name">
                            </div>

                            <div class="field">
                                <label for="project_description_{{ $i }}">Description</label>
                                <textarea id="project_description_{{ $i }}"
                                          name="projects[{{ $i }}][description]"
                                          placeholder="Describe the project and your contribution...">{{ $project['description'] ?? '' }}</textarea>
                            </div>

                            <div class="grid">
                                <div class="field">
                                    <label for="project_url_{{ $i }}">Project URL</label>
                                    <input id="project_url_{{ $i }}" type="url"
                                           name="projects[{{ $i }}][project_url]"
                                           value="{{ $project['project_url'] ?? '' }}"
                                           placeholder="https://example.com">
                                </div>
                                <div class="field">
                                    <label for="technologies_{{ $i }}">Technologies Used</label>
                                    <input id="technologies_{{ $i }}"
                                           name="projects[{{ $i }}][technologies]"
                                           value="{{ $project['technologies'] ?? '' }}"
                                           placeholder="HTML, CSS, Laravel">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn add-btn" onclick="addProject()">+ Add Project</button>
                @error('projects') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- 07 SOCIAL LINKS -->
            <div class="section">
                <div class="section-heading">
                    <span class="section-number">07</span>
                    <div>
                        <h2>Social Links</h2>
                        <p>Connect visitors to your social and professional accounts.</p>
                    </div>
                </div>

                @php
                    $socialItems = old('socials', $portfolio->socialLinks->map(fn ($item) => [
                        'platform_name' => $item->platform_name,
                        'url' => $item->url,
                    ])->toArray());
                @endphp

                <div id="social-list">
                    @foreach ($socialItems as $i => $social)
                        <div class="entry">
                            <div class="entry-header">
                                <h3>Social Link {{ $loop->iteration }}</h3>
                                <button type="button" class="btn remove-btn"
                                        onclick="removeEntry(this)">Remove</button>
                            </div>

                            <div class="grid">
                                <div class="field">
                                    <label for="social_platform_{{ $i }}">Platform Name</label>
                                    <input id="social_platform_{{ $i }}"
                                           name="socials[{{ $i }}][platform_name]"
                                           maxlength="255"
                                           value="{{ $social['platform_name'] ?? '' }}"
                                           placeholder="e.g. Facebook, LinkedIn">
                                </div>
                                <div class="field">
                                    <label for="social_url_{{ $i }}">Profile URL</label>
                                    <input id="social_url_{{ $i }}" type="url"
                                           name="socials[{{ $i }}][url]"
                                           value="{{ $social['url'] ?? '' }}"
                                           placeholder="https://...">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="btn add-btn" onclick="addSocial()">+ Add Social Link</button>
                @error('socials') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- 08 TEMPLATE SELECTION -->
            <div class="section">
                <div class="section-heading">
                    <span class="section-number">08</span>
                    <div>
                        <h2>Choose Your Portfolio Design</h2>
                        <p>Keep your current design or select a different template.</p>
                    </div>
                </div>

                <p class="template-intro">
                    Choose Simple, Modern, or Creative. Your selected design will be saved
                    when you click Save Changes.
                </p>

                @php
                    $allowedTemplates = ['simple', 'modern', 'creative'];
                    $selectedTemplate = strtolower(old('template', $portfolio->template ?? 'simple'));

                    if (!in_array($selectedTemplate, $allowedTemplates, true)) {
                        $selectedTemplate = 'simple';
                    }
                @endphp

                <div class="templates">
                    <label class="template">
                        <input class="template-radio" type="radio" name="template"
                               value="simple" @checked($selectedTemplate === 'simple') required>

                        <div class="preview-area simple-area">
                            <div class="mini-page">
                                <div class="mini-profile">
                                    <div class="mini-avatar"></div>
                                    <div>
                                        <div class="mini-name">YOUR NAME</div>
                                        <div class="mini-subtitle">Personal Portfolio</div>
                                    </div>
                                </div>
                                <div class="mini-accent"></div>
                                <div class="mini-heading">ABOUT ME</div>
                                <div class="mini-line"></div>
                                <div class="mini-line short"></div>
                                <div class="mini-tags">
                                    <span class="mini-tag">Skills</span>
                                    <span class="mini-tag">Projects</span>
                                </div>
                            </div>
                        </div>

                        <div class="template-content">
                            <span class="template-badge simple-badge">CLEAN &amp; MINIMAL</span>
                            <h3 class="template-title">Simple Template</h3>
                            <p class="template-description">
                                A clean, minimal design that highlights your biography,
                                education, skills, and experience.
                            </p>
                            <span class="template-select">Select Simple</span>
                        </div>
                    </label>

                    <label class="template">
                        <input class="template-radio" type="radio" name="template"
                               value="modern" @checked($selectedTemplate === 'modern') required>

                        <div class="preview-area modern-area">
                            <div class="mini-page">
                                <div class="mini-profile">
                                    <div class="mini-avatar"></div>
                                    <div>
                                        <div class="mini-name">YOUR NAME</div>
                                        <div class="mini-subtitle">Professional Profile</div>
                                    </div>
                                </div>
                                <div class="mini-accent"></div>
                                <div class="mini-heading">EXPERIENCE</div>
                                <div class="mini-line"></div>
                                <div class="mini-line short"></div>
                                <div class="mini-heading">SELECTED PROJECTS</div>
                                <div class="mini-line"></div>
                                <div class="mini-tags">
                                    <span class="mini-tag">Career</span>
                                    <span class="mini-tag">Projects</span>
                                </div>
                            </div>
                        </div>

                        <div class="template-content">
                            <span class="template-badge modern-badge">PROFESSIONAL</span>
                            <h3 class="template-title">Modern Template</h3>
                            <p class="template-description">
                                A polished, structured layout for students, job seekers,
                                and professionals presenting their achievements.
                            </p>
                            <span class="template-select">Select Modern</span>
                        </div>
                    </label>

                    <label class="template">
                        <input class="template-radio" type="radio" name="template"
                               value="creative" @checked($selectedTemplate === 'creative') required>

                        <div class="preview-area creative-area">
                            <div class="mini-page">
                                <div class="mini-profile">
                                    <div class="mini-avatar"></div>
                                    <div>
                                        <div class="mini-name">YOUR NAME</div>
                                        <div class="mini-subtitle">Creative Portfolio</div>
                                    </div>
                                </div>
                                <div class="mini-accent"></div>
                                <div class="mini-heading">MY CREATIVE WORK</div>
                                <div class="mini-line"></div>
                                <div class="mini-line short"></div>
                                <div class="mini-heading">FEATURED PROJECTS</div>
                                <div class="mini-line"></div>
                                <div class="mini-tags">
                                    <span class="mini-tag">Design</span>
                                    <span class="mini-tag">Ideas</span>
                                </div>
                            </div>
                        </div>

                        <div class="template-content">
                            <span class="template-badge creative-badge">BOLD &amp; CREATIVE</span>
                            <h3 class="template-title">Creative Template</h3>
                            <p class="template-description">
                                A distinctive design for designers, developers, artists,
                                and anyone wanting a more expressive portfolio.
                            </p>
                            <span class="template-select">Select Creative</span>
                        </div>
                    </label>
                </div>

                @error('template') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- FORM ACTIONS -->
            <div class="actions">
                <button type="submit" class="btn">Save Changes</button>
                <a href="{{ route('portfolios.show', $portfolio) }}"
                   class="btn secondary">Cancel</a>
            </div>
        </form>
    </section>
</main>

<script>
    let educationIndex = {{ count($educationItems) }};
    let skillIndex = {{ count($skillItems) }};
    let experienceIndex = {{ count($experienceItems) }};
    let projectIndex = {{ count($projectItems) }};
    let socialIndex = {{ count($socialItems) }};

    function removeEntry(button) {
        const entry = button.closest('.entry');
        if (entry) entry.remove();
    }

    function addEducation() {
        const i = educationIndex++;

        document.getElementById('education-list').insertAdjacentHTML('beforeend', `
            <div class="entry">
                <div class="entry-header">
                    <h3>Education</h3>
                    <button type="button" class="btn remove-btn" onclick="removeEntry(this)">Remove</button>
                </div>
                <div class="grid">
                    <div class="field">
                        <label for="school_${i}">School Name</label>
                        <input id="school_${i}" name="educations[${i}][school]" maxlength="255">
                    </div>
                    <div class="field">
                        <label for="degree_${i}">Degree / Course</label>
                        <input id="degree_${i}" name="educations[${i}][degree]" maxlength="255">
                    </div>
                </div>
                <div class="date-grid">
                    <div class="field">
                        <label for="education_start_date_${i}">Start Date</label>
                        <input type="date" id="education_start_date_${i}" name="educations[${i}][start_date]">
                    </div>
                    <div class="field">
                        <label for="education_end_date_${i}">End Date</label>
                        <input type="date" id="education_end_date_${i}" name="educations[${i}][end_date]">
                        <span class="help-text">Leave blank if you are currently studying.</span>
                    </div>
                </div>
            </div>
        `);
    }

    function addSkill() {
        const i = skillIndex++;

        document.getElementById('skills-list').insertAdjacentHTML('beforeend', `
            <div class="entry">
                <div class="entry-header">
                    <h3>Skill</h3>
                    <button type="button" class="btn remove-btn" onclick="removeEntry(this)">Remove</button>
                </div>
                <div class="field">
                    <label for="skill_${i}">Skill Name</label>
                    <input id="skill_${i}" name="skills[${i}][skill_name]" maxlength="255"
                           placeholder="e.g. HTML, CSS, Laravel">
                </div>
            </div>
        `);
    }

    function addExperience() {
        const i = experienceIndex++;

        document.getElementById('experience-list').insertAdjacentHTML('beforeend', `
            <div class="entry">
                <div class="entry-header">
                    <h3>Work Experience</h3>
                    <button type="button" class="btn remove-btn" onclick="removeEntry(this)">Remove</button>
                </div>
                <div class="grid">
                    <div class="field">
                        <label for="job_title_${i}">Job Title</label>
                        <input id="job_title_${i}" name="experiences[${i}][job_title]" maxlength="255">
                    </div>
                    <div class="field">
                        <label for="company_${i}">Company Name</label>
                        <input id="company_${i}" name="experiences[${i}][company]" maxlength="255">
                    </div>
                </div>
                <div class="date-grid">
                    <div class="field">
                        <label for="experience_start_date_${i}">Start Date</label>
                        <input type="date" id="experience_start_date_${i}" name="experiences[${i}][start_date]">
                    </div>
                    <div class="field">
                        <label for="experience_end_date_${i}">End Date</label>
                        <input type="date" id="experience_end_date_${i}" name="experiences[${i}][end_date]">
                        <span class="help-text">Leave blank if you currently work there.</span>
                    </div>
                </div>
            </div>
        `);
    }

    function addProject() {
        const i = projectIndex++;

        document.getElementById('project-list').insertAdjacentHTML('beforeend', `
            <div class="entry">
                <div class="entry-header">
                    <h3>Project</h3>
                    <button type="button" class="btn remove-btn" onclick="removeEntry(this)">Remove</button>
                </div>
                <div class="field">
                    <label for="project_title_${i}">Project Title</label>
                    <input id="project_title_${i}" name="projects[${i}][project_title]" maxlength="255">
                </div>
                <div class="field">
                    <label for="project_description_${i}">Description</label>
                    <textarea id="project_description_${i}" name="projects[${i}][description]"></textarea>
                </div>
                <div class="grid">
                    <div class="field">
                        <label for="project_url_${i}">Project URL</label>
                        <input id="project_url_${i}" type="url" name="projects[${i}][project_url]"
                               placeholder="https://example.com">
                    </div>
                    <div class="field">
                        <label for="technologies_${i}">Technologies Used</label>
                        <input id="technologies_${i}" name="projects[${i}][technologies]"
                               placeholder="HTML, CSS, Laravel">
                    </div>
                </div>
            </div>
        `);
    }

    function addSocial() {
        const i = socialIndex++;

        document.getElementById('social-list').insertAdjacentHTML('beforeend', `
            <div class="entry">
                <div class="entry-header">
                    <h3>Social Link</h3>
                    <button type="button" class="btn remove-btn" onclick="removeEntry(this)">Remove</button>
                </div>
                <div class="grid">
                    <div class="field">
                        <label for="social_platform_${i}">Platform Name</label>
                        <input id="social_platform_${i}" name="socials[${i}][platform_name]"
                               maxlength="255" placeholder="e.g. Facebook, LinkedIn">
                    </div>
                    <div class="field">
                        <label for="social_url_${i}">Profile URL</label>
                        <input id="social_url_${i}" type="url" name="socials[${i}][url]"
                               placeholder="https://...">
                    </div>
                </div>
            </div>
        `);
    }

    // Profile photo preview and validation
    const photoInput = document.getElementById('profile_picture');
    const photoPreview = document.getElementById('new-photo-preview');
    const photoImage = document.getElementById('new-photo-image');
    let previewUrl = null;

    photoInput.addEventListener('change', function () {
        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }

        const file = this.files && this.files[0];

        if (!file) {
            photoPreview.style.display = 'none';
            photoImage.removeAttribute('src');
            return;
        }

        const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

        if (!allowedTypes.includes(file.type)) {
            alert('Please select a JPG, PNG, or WEBP image.');
            this.value = '';
            photoPreview.style.display = 'none';
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert('The image must not exceed 2 MB.');
            this.value = '';
            photoPreview.style.display = 'none';
            return;
        }

        previewUrl = URL.createObjectURL(file);
        photoImage.src = previewUrl;
        photoPreview.style.display = 'flex';
    });

    window.addEventListener('beforeunload', function () {
        if (previewUrl) URL.revokeObjectURL(previewUrl);
    });
</script>
</body>
</html>
