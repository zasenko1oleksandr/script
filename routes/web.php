<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StatsController;
use App\Http\Middleware\TrackVisit;

// Усі маршрути всередині цієї групи автоматично відстежуються трекером
Route::middleware(TrackVisit::class)->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::resource('books', BookController::class);
    Route::resource('country', CountryController::class);

    Route::get(
        '/say/{message?}',
        [SiteController::class, 'say']
    )->name('site.say');

    Route::get(
        '/entry',
        [SiteController::class, 'entry']
    )->name('entry.form');

    Route::post(
        '/entry',
        [SiteController::class, 'entryStore']
    )->name('entry.store');

    Route::view(
        '/about',
        'site.about'
    )->name('site.about');

    Route::view(
        '/contact',
        'site.contact'
    )->name('site.contact');

    // Сторінки статистики
    Route::get('/stats', [StatsController::class, 'pages'])->name('stats.pages');
    Route::get('/stats/detail', [StatsController::class, 'detail'])->name('stats.detail');
    Route::get('/stats/routes', [StatsController::class, 'routeStats'])->name('stats.routes');
});
