<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'make' => $this->faker->randomElement(['Acura',
                'Alfa Romeo',
                'Audi',
                'BMW',
                'Buick',
                'Cadillac',
                'Chevrolet',
                'Chrysler',
                'Dodge',
                'Fiat',
                'Ford',
                'Genesis',
                'GMC',
                'Honda',
                'Hyundai',
                'Infiniti',
                'Jaguar',
                'Jeep',
                'Kia',
                'Land Rover',
                'Lexus',
                'Lincoln',
                'Mazda',
                'Mercedes-Benz',
                'Mini',
                'Mitsubishi',
                'Nissan',
                'Porsche',
                'Ram',
                'Subaru',
                'Tesla',
                'Toyota',
                'Volkswagen',
                'Volvo']),
//            'model' => $this->faker->randomElement(),
            'year' => $this->faker->numberBetween(1990, 2023),
            'cost' => $this->faker->numberBetween(0, 1000000),
            'category' => $this->faker->randomElement(['Sedans', 'SUV', 'Coupes', 'Convertibles', 'Hatchbacks', 'Trucks', 'Vans', 'Crossovers', 'Sports cars
', 'Electric Vehicles']),
            'steering_wheel' => $this->faker->randomElement(['left', 'right']),
            'transmission' => $this->faker->randomElement(['automatic', 'mechanic'])
        ];
    }
}
