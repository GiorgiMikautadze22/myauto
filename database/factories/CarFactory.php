<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $models = ['ILX', 'MDX', 'RDX', 'Giulia', 'Stelvio', '4C'];

        return [
            'model' => $this->faker->unique()->randomElement($models),
            'brand_id' => Brand::factory(),
        ];
    }
}
