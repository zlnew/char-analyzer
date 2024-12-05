<?php

declare(strict_types=1);

use App\Models\CharAnalysis;

use function Pest\Laravel\assertDatabaseMissing;

it('can get recent char analyses', function () {
    $expectedStructure = [
        'id',
        'input_one',
        'input_two',
        'percentage',
    ];

    $charAnalyses = CharAnalysis::factory(5)->create();

    actingAsUser()
        ->getJson(route('api.char-analyses.index'))
        ->assertOk()
        ->assertJsonStructure([
            '*' => $expectedStructure,
        ])
        ->assertJson($charAnalyses->toArray());

});

it('can delete char analysis', function () {
    /** @var CharAnalysis $charAnalysis * */
    $charAnalysis = CharAnalysis::factory()->create();

    actingAsUser()
        ->deleteJson(route('api.char-analyses.destroy', $charAnalysis))
        ->assertOk()
        ->assertJsonFragment([
            'Data deleted successfully',
        ]);

    assertDatabaseMissing('char_analyses', ['id' => $charAnalysis->id]);
});
