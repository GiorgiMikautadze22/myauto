<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;


Route::get('/', function () {
    $super_vip = \App\Models\Role::find(1)->post;
    $vip_plus = \App\Models\Role::find(2)->post;
    $vip = \App\Models\Role::find(3)->post;

    $brands = \App\Models\Brand::all();
    $models = \App\Models\Car::all();

    $query = \App\Models\Post::query();

    if (request()->filled('make')) {
        $query->where('make', 'like', '%' . request()->input('make') . '%');
    }
    if (request()->filled('model')) {
        $query->where('model', 'like', '%' . request()->input('model') . '%');
    }
    if (request()->filled('year')) {
        $query->where('year', request()->input('year'));
    }
//    if (request()->filled('price')) {
//        $query->where('price', '<=', request()->input('price'));
//    }

    $posts = $query->paginate(12);


    return view('home', [
        'posts' => $posts,
        'super_vip' => $super_vip,
        'vip_plus' => $vip_plus,
        'vip' => $vip,
        'brands' => $brands,
        'models' => $models
    ]);
});


Route::get('/models/{makeId}', [CarController::class, 'getModelsByMake']);
Route::get('/filter-cars/{brand}', [CarController::class, 'getModelsForFilter']);

Route::resource('posts', \App\Http\Controllers\PostController::class);
