<?php

namespace Database\Factories;

use App\Models\CharAnalysis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CharAnalysis>
 */
class CharAnalysisFactory extends Factory
{
    protected $model = CharAnalysis::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'input_one' => fake()->name(),
            'input_two' => fake()->name(),
            'percentage' => random_int(0, 100),
        ];
    }
}
