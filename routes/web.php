<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\BookRequestController;
use App\Http\Controllers\CountryController;

Route::resource(
    'country',
    CountryController::class
);
Route::resource('country', CountryController::class);

Route::get('/', function () {
    return view('welcome');
});

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

Route::prefix('books')->name('books.')->group(function () {
    Route::get('/', [BookRequestController::class, 'list'])->name('list');
    Route::get('/create', [BookRequestController::class, 'create'])->name('create');
    Route::post('/', [BookRequestController::class, 'store'])->name('store');
});
