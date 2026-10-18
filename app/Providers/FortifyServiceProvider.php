<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // User creation and profile/password updates
        Fortify::createUsersUsing(CreateNewUser::class);

        Fortify::updateUserProfileInformationUsing(
            UpdateUserProfileInformation::class
        );

        Fortify::updateUserPasswordsUsing(
            UpdateUserPassword::class
        );

        Fortify::resetUserPasswordsUsing(
            ResetUserPassword::class
        );

        // Login page
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // Registration page
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // Forgot password page
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        // Reset password page
        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', [
                'request' => $request,
            ]);
        });

        // Login rate limiter
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(
                Str::lower(
                    $request->input(Fortify::username())
                ).'|'.$request->ip()
            );

            return Limit::perMinute(5)->by($throttleKey);
        });
    }
}
