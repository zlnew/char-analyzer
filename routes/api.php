<?php

declare(strict_types=1);

use App\Http\Controllers\AnalyzeCharMatchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('char-match/analyze', AnalyzeCharMatchController::class)->name('char-match.analyze');
});
