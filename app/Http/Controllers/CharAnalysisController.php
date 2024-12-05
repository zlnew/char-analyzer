<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\CharAnalysis;
use Illuminate\Http\JsonResponse;

class CharAnalysisController extends Controller
{
    public function index(): JsonResponse
    {
        $charAnalyses = CharAnalysis::query()->latest()->get();

        return response()->json($charAnalyses);
    }

    public function destroy(CharAnalysis $charAnalysis): JsonResponse
    {
        $charAnalysis->delete();

        return response()->json([
            'message' => 'Data deleted successfully',
        ]);
    }
}
