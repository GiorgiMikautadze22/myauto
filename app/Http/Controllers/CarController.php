<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function getModelsByMake($makeId)
    {
        $models = Car::where('brand_id', $makeId)->get();
        return response()->json($models);
    }

    public function getModelsForFilter($brand)
    {
        // Fetch models for the given brand from the database
        $models = Model::where('brand', $brand)->pluck('model_name', 'id');

        return response()->json($models);
    }

}
