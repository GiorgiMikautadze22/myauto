<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makes = [
            'Acura' => ['RSX', 'TL', 'MDX'],
            'Alfa Romeo' => ['Giulia', 'Stelvio'],
            'Audi' => ['A4', 'Q5', 'R8'],
            'BMW' => ['3 Series', 'X5', 'M3'],
            'Dodge' => ['Charger', 'Challenger', 'Durango'],
            'Mercedes-Benz' => ['C-Class', 'GLE', 'AMG GT'],
            'Porsche' => ['911', 'Cayenne', 'Panamera'],
            'Tesla' => ['Model S', 'Model X', 'Model 3'],
            'Toyota' => ['Camry', 'RAV4', 'Supra'],
        ];

        foreach ($makes as $makeName => $models) {
            // Create the make
            $make = Brand::create(['brand' => $makeName]);

            // Create each car model for the make
            foreach ($models as $modelName) {
                Car::create(['model' => $modelName, 'brand_id' => $make->id]);
            }
        }
    }
}
