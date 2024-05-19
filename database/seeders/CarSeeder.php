<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $makes = [
//            'Acura' => ['RSX', 'TL', 'MDX'],
//            'Alfa Romeo' => ['Giulia', 'Stelvio'],
//            'Audi' => ['A4', 'Q5', 'R8'],
//            'BMW' => ['3 Series', 'X5', 'M3'],
//            'Dodge' => ['Charger', 'Challenger', 'Durango'],
//            'Mercedes-Benz' => ['C-Class', 'GLE', 'AMG GT'],
//            'Porsche' => ['911', 'Cayenne', 'Panamera'],
//            'Tesla' => ['Model S', 'Model X', 'Model 3'],
//            'Toyota' => ['Camry', 'RAV4', 'Supra']
//        ];
//
//        foreach ($makes as $make => $models) {
//            foreach ($models as $model) {
//                DB::table('cars')->insert([
//                    'make' => $make,
//                    'model' => $model,
//                ]);
//            }
//        }

        $models = ['ILX', 'MDX', 'RDX', 'Giulia', 'Stelvio', '4C', 'A3', 'A4', 'A5', 'A6', '2 Series', '3 Series', '4 Series', 'Challenger', 'Charger', 'Durango', 'A-Class', 'C-Class', 'CLA','911', '718 Boxster', '718 Cayman','Model S', 'Model 3', 'Model X','4Runner', 'Avalon', 'C-HR'];

        foreach ($models as $model) {
            DB::table('cars')->insert(['model' => $model
            ]);
        }
    }
}
