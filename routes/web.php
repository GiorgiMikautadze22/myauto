<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;


Route::get('/', function () {
    $cars = \App\Models\Post::all();


    return view('home', [
        'posts' => \App\Models\Post::Paginate(12)
    ]);
});



Route::get('/models/{makeId}', [CarController::class, 'getModelsByMake']);

Route::resource('posts', \App\Http\Controllers\PostController::class);
