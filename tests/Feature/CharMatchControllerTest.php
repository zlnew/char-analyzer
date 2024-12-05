<?php

declare(strict_types=1);

use function Pest\Laravel\assertDatabaseHas;

it('can calculate char match', function (string $charOne, string $charTwo, float $percentage) {
    $request = [
        'char_one' => $charOne,
        'char_two' => $charTwo,
    ];

    actingAsUser()->post(route('api.char-match'), $request)
        ->assertOk()
        ->assertJson([
            'char_one' => $charOne,
            'char_two' => $charTwo,
            'percentage' => $percentage,
        ]);

    assertDatabaseHas('char_analyses', [
        'char_one' => $charOne,
        'char_two' => $charTwo,
        'percentage' => $percentage,
    ]);
})->with('char_matches');
