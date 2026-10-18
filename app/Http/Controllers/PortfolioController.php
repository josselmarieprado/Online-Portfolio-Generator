<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Throwable;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $portfolios = Portfolio::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('portfolios.index', compact('portfolios'));
    }

    public function create(): View
    {
        return view('portfolios.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->portfolioRules());

        $photoPath = null;

        if ($request->hasFile('profile_picture')) {
            $photoPath = $request->file('profile_picture')
                ->store('portfolio-photos', 'public');
        }

        try {
            $portfolio = DB::transaction(function () use (
                $validated,
                $photoPath
            ) {
                $portfolio = Portfolio::create([
                    'user_id' => auth()->id(),
                    'full_name' => $validated['full_name'],
                    'professional_title' =>
                        $validated['professional_title'] ?? null,
                    'email' => $validated['email'],
                    'phone' => $validated['contact_number'] ?? null,
                    'address' => $validated['address'] ?? null,
                    'about_me' => $validated['about_me'] ?? null,
                    'template' => $validated['template'],
                    'photo' => $photoPath,
                ]);

                $this->syncPortfolioDetails($portfolio, $validated);

                return $portfolio;
            });
        } catch (Throwable $exception) {
            if ($photoPath !== null) {
                Storage::disk('public')->delete($photoPath);
            }

            throw $exception;
        }

        return redirect()
            ->route('portfolios.show', $portfolio)
            ->with('success', 'Portfolio created successfully.');
    }

    public function show(Portfolio $portfolio): View
    {
        $this->authorizeOwnership($portfolio);

        $portfolio->load([
            'educations',
            'skills',
            'projects',
            'experiences',
            'socialLinks',
        ]);

        return view('portfolios.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio): View
    {
        $this->authorizeOwnership($portfolio);

        $portfolio->load([
            'educations',
            'skills',
            'projects',
            'experiences',
            'socialLinks',
        ]);

        return view('portfolios.edit', compact('portfolio'));
    }

    public function update(
        Request $request,
        Portfolio $portfolio
    ): RedirectResponse {
        $this->authorizeOwnership($portfolio);

        $validated = $request->validate($this->portfolioRules());

        $oldPhotoPath = $portfolio->photo;
        $newPhotoPath = null;

        if ($request->hasFile('profile_picture')) {
            $newPhotoPath = $request->file('profile_picture')
                ->store('portfolio-photos', 'public');
        }

        try {
            DB::transaction(function () use (
                $portfolio,
                $validated,
                $newPhotoPath
            ) {
                $updateData = [
                    'full_name' => $validated['full_name'],
                    'professional_title' =>
                        $validated['professional_title'] ?? null,
                    'email' => $validated['email'],
                    'phone' => $validated['contact_number'] ?? null,
                    'address' => $validated['address'] ?? null,
                    'about_me' => $validated['about_me'] ?? null,
                    'template' => $validated['template'],
                ];

                if ($newPhotoPath !== null) {
                    $updateData['photo'] = $newPhotoPath;
                }

                $portfolio->update($updateData);

                $this->syncPortfolioDetails($portfolio, $validated);
            });
        } catch (Throwable $exception) {
            if ($newPhotoPath !== null) {
                Storage::disk('public')->delete($newPhotoPath);
            }

            throw $exception;
        }

        if ($newPhotoPath !== null && $oldPhotoPath !== null) {
            Storage::disk('public')->delete($oldPhotoPath);
        }

        return redirect()
            ->route('portfolios.show', $portfolio)
            ->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(
        Portfolio $portfolio
    ): RedirectResponse {
        $this->authorizeOwnership($portfolio);

        $photoPath = $portfolio->photo;

        DB::transaction(function () use ($portfolio) {
            $portfolio->delete();
        });

        if ($photoPath !== null) {
            Storage::disk('public')->delete($photoPath);
        }

        return redirect()
            ->route('portfolios.index')
            ->with('success', 'Portfolio deleted successfully.');
    }

    /**
     * Validation rules shared by create and edit.
     */
    private function portfolioRules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'professional_title' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'contact_number' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'about_me' => ['nullable', 'string'],

            'template' => [
                'required',
                'string',
                'in:simple,modern,creative',
            ],

            'profile_picture' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            // Education
            'educations' => ['nullable', 'array'],
            'educations.*.school' => [
                'nullable', 'string', 'max:255',
            ],
            'educations.*.degree' => [
                'nullable', 'string', 'max:255',
            ],
            'educations.*.start_date' => [
                'nullable', 'date',
            ],
            'educations.*.end_date' => [
                'nullable',
                'date',
                'after_or_equal:educations.*.start_date',
            ],

            // Skills
            'skills' => ['nullable', 'array'],
            'skills.*.skill_name' => [
                'nullable', 'string', 'max:255',
            ],

            // Projects
            'projects' => ['nullable', 'array'],
            'projects.*.project_title' => [
                'nullable', 'string', 'max:255',
            ],
            'projects.*.description' => [
                'nullable', 'string',
            ],
            'projects.*.project_url' => [
                'nullable', 'url', 'max:2048',
            ],
            'projects.*.technologies' => [
                'nullable', 'string',
            ],

            // Work experience
            'experiences' => ['nullable', 'array'],
            'experiences.*.job_title' => [
                'nullable', 'string', 'max:255',
            ],
            'experiences.*.company' => [
                'nullable', 'string', 'max:255',
            ],
            'experiences.*.start_date' => [
                'nullable', 'date',
            ],
            'experiences.*.end_date' => [
                'nullable', 'date',
                'after_or_equal:experiences.*.start_date',
            ],

            // Social links
            'socials' => ['nullable', 'array'],
            'socials.*.platform_name' => [
                'nullable', 'string', 'max:255',
            ],
            'socials.*.url' => [
                'nullable', 'url', 'max:2048',
            ],
        ];
    }

    /**
     * Replace the portfolio's related entries with the submitted entries.
     * The caller must execute this inside a database transaction.
     */
    private function syncPortfolioDetails(
        Portfolio $portfolio,
        array $validated
    ): void {
        // Education
        $portfolio->educations()->delete();

        foreach ($validated['educations'] ?? [] as $edu) {
            $school = trim($edu['school'] ?? '');
            $degree = trim($edu['degree'] ?? '');

            if ($school === '' && $degree === '') {
                continue;
            }

            if ($school === '') {
                throw ValidationException::withMessages([
                    'educations' =>
                        'Please enter a school name for each education entry.',
                ]);
            }

            $portfolio->educations()->create([
                'school_name' => $school,
                'degree' => $degree !== '' ? $degree : null,
                'start_date' => !empty($edu['start_date'])
                    ? $edu['start_date']
                    : null,
                'end_date' => !empty($edu['end_date'])
                    ? $edu['end_date']
                    : null,
            ]);
        }

        // Skills
        $portfolio->skills()->delete();

        foreach ($validated['skills'] ?? [] as $skill) {
            $name = trim($skill['skill_name'] ?? '');

            if ($name !== '') {
                $portfolio->skills()->create([
                    'skill_name' => $name,
                ]);
            }
        }

        // Projects
        $portfolio->projects()->delete();

        foreach ($validated['projects'] ?? [] as $project) {
            $title = trim($project['project_title'] ?? '');

            if ($title === '') {
                continue;
            }

            $portfolio->projects()->create([
                'project_name' => $title,
                'description' => $project['description'] ?? null,
                'project_url' => $project['project_url'] ?? null,
                'technologies' => $project['technologies'] ?? null,
            ]);
        }

        // Work experience
        $portfolio->experiences()->delete();

        foreach ($validated['experiences'] ?? [] as $exp) {
            $jobTitle = trim($exp['job_title'] ?? '');
            $company = trim($exp['company'] ?? '');

            if ($jobTitle === '' && $company === '') {
                continue;
            }

            if ($company === '') {
                throw ValidationException::withMessages([
                    'experiences' =>
                        'Please enter a company name for each experience entry.',
                ]);
            }

            $portfolio->experiences()->create([
                'job_title' => $jobTitle !== '' ? $jobTitle : null,
                'company_name' => $company,
                'start_date' => !empty($exp['start_date'])
                    ? $exp['start_date']
                    : null,
                'end_date' => !empty($exp['end_date'])
                    ? $exp['end_date']
                    : null,
            ]);
        }

        // Social links
        $portfolio->socialLinks()->delete();

        foreach ($validated['socials'] ?? [] as $social) {
            $platformName = trim($social['platform_name'] ?? '');
            $url = trim($social['url'] ?? '');

            if ($platformName === '' && $url === '') {
                continue;
            }

            if ($platformName === '' || $url === '') {
                throw ValidationException::withMessages([
                    'socials' =>
                        'Please provide both a platform name and a URL for each social link.',
                ]);
            }

            $portfolio->socialLinks()->create([
                'platform_name' => $platformName,
                'url' => $url,
            ]);
        }
    }

    private function authorizeOwnership(
        Portfolio $portfolio
    ): void {
        abort_unless(
            (int) $portfolio->user_id === (int) auth()->id(),
            403,
            'You are not allowed to access this portfolio.'
        );
    }
}
