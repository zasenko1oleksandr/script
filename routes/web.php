<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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
use App\Http\Controllers\BookRequestController;

Route::prefix('book-request')->name('book-request.')->group(function () {
    Route::get('/list', [BookRequestController::class, 'list'])->name('list');
    Route::get('/', [BookRequestController::class, 'index'])->name('index');
    Route::get('/create', [BookRequestController::class, 'create'])->name('create');
    Route::post('/', [BookRequestController::class, 'store'])->name('store');
});
