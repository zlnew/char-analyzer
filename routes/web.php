<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', AppController::class)->name('index');

Route::get('/{catchall?}', AppController::class)
    ->where('catchall', '^(?!api|storage).*$')
    ->name('catchall');
