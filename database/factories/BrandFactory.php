<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $makes = ['Acura', 'Alfa Romeo', 'Audi', 'BMW', 'Dodge', 'Mercedes-Benz', 'Porsche', 'Tesla', 'Toyota'];

        return [
            'brand' => $this->faker->unique()->randomElement($makes)
        ];
    }
}
