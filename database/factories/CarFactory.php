<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\car>
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
//        return [
//            'make' => ['Acura',
//                'Alfa Romeo',
//                'Audi',
//                'BMW',
//                'Dodge',
//                'Mercedes-Benz',
//                'Porsche',
//                'Tesla',
//                'Toyota',
//                ],
//            'model' => [
//                'Acura' => [
//                    'Acura ILX',
//                    'Acura ILX',
//                    'Acura RLX',
//                    'Acura NSX'
//                ],
//                'Alfa Romeo' => [
//                    'Alfa Romeo Giulia',
//                    'Alfa Romeo Stelvio',
//                    'Alfa Romeo Giulietta',
//                    'Alfa Romeo 4C',
//                    'Alfa Romeo 8C Competizione'
//                ],
//                'Audi' => [
//                    'Audi A1',
//                    'Audi A3',
//                    'Audi A4',
//                    'Audi R8',
//                    'Audi e-tron'
//                ],
//                'BMW' => [
//                    'BMW 1 Series',
//                    'BMW 2 Series',
//                    'BMW X2',
//                    'BMW i8'
//                ],
//                'Dodge'=> [
//                    'Dodge Charger',
//                    'Dodge Challenger',
//                    'Dodge Viper',
//                ],
//                'Mercedes-Benz' => [
//                    'Mercedes-Benz A-Class',
//                    'Mercedes-Benz CLS-Class',
//                    'Mercedes-Benz G-Class'
//                ],
//                'Porsche' => [
//                    'Porsche 911',
//                    'Porsche Panamera',
//                    'Porsche 718 Cayman'
//                ],
//                'Tesla' => [
//                    'Tesla Model S',
//                    'Tesla Model 3',
//                    'Tesla Model X'
//                ]
//            ],
//        ];

        $makes = ['Acura', 'Alfa Romeo', 'Audi', 'BMW', 'Dodge', 'Mercedes-Benz', 'Porsche', 'Tesla', 'Toyota'];


        // Initialize an empty array to store the created records
        $records = [];

        foreach ($makes as $make) {
            $records[] = [
                'make' => $make,
                // Add other fields as needed
            ];
        }

        return $records;

    }
}
