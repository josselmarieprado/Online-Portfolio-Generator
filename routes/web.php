<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
| Show the B.O.R.N.FOLIO landing page to all visitors,
| including authenticated users.
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Portfolio Management
|--------------------------------------------------------------------------
| Only authenticated users can create, view, edit,
| update, and delete their portfolios.
*/

Route::middleware('auth')->group(function () {
    Route::resource('portfolios', PortfolioController::class);
});
