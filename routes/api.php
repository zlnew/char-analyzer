<?php

declare(strict_types=1);

use App\Http\Controllers\CharMatchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('char-match', CharMatchController::class)->name('char-match');
});
