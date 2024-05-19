<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makes = ['Acura', 'Alfa Romeo', 'Audi', 'BMW', 'Dodge', 'Mercedes-Benz', 'Porsche', 'Tesla', 'Toyota'];

        foreach ($makes as $make) {
            Brand::create(['brand' => $make]);
        }
    }
}
