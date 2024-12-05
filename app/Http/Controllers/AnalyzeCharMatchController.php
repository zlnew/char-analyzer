<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CharMatchRequest;
use App\Models\CharMatch;

class AnalyzeCharMatchController extends Controller
{
    public function __invoke(CharMatchRequest $request)
    {
        $charMatch = new CharMatch($request->all());
        $charMatch->analyze();
        $charMatch->save();

        return response()->json($charMatch);
    }
}
