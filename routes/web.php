<?php

use App\Http\Controllers\SiteController;

Route::get(
    '/say/{message?}',
    [SiteController::class, 'say']
)->name('site.say');
