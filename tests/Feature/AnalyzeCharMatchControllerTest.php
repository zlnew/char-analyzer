<?php

declare(strict_types=1);

use function Pest\Laravel\assertDatabaseHas;

it('can analyze character match percentage', function (string $inputOne, string $inputTwo, float $percentage) {
    $request = [
        'input_one' => $inputOne,
        'input_two' => $inputTwo,
    ];

    actingAsUser()->post(route('api.char-match.analyze'), $request)
        ->assertOk()
        ->assertJson([
            'input_one' => $inputOne,
            'input_two' => $inputTwo,
            'percentage' => $percentage,
        ]);

    assertDatabaseHas('char_analyses', [
        'input_one' => $inputOne,
        'input_two' => $inputTwo,
        'percentage' => $percentage,
    ]);
})->with('char_matches');
