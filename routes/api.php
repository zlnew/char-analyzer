<?php

declare(strict_types=1);

use App\Http\Controllers\CharMatchController;
use Illuminate\Support\Facades\Route;

Route::post('char-match', CharMatchController::class)->name('char-match');
