<?php

namespace App\Providers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Mail::extend('resend-http', function () {
       return new ResendHttpTransport(config('services.resend.key'));
   });
    }
}
