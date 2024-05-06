<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $cars = \App\Models\Car::all();
    return view('cars.index', [
        'cars' => \App\Models\Car::Paginate(12)
    ]);
});

Route::get('/{id}', function ($id) {
    $car = \App\Models\Car::find($id);

    return view('cars.show', [
        'car' => $car
    ]);
});
