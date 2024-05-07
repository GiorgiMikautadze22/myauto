<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $cars = \App\Models\Post::all();
    return view('home', [
        'posts' => \App\Models\Post::Paginate(12)
    ]);
});

Route::resource('posts', \App\Http\Controllers\PostController::class);
