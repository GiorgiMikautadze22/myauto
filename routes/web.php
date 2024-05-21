<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;


Route::get('/', function () {
    $super_vip = \App\Models\Role::find(1)->post;
    $vip_plus = \App\Models\Role::find(2)->post;
    $vip = \App\Models\Role::find(3)->post;

    return view('home', [
        'posts' => \App\Models\Post::Paginate(12),
        'super_vip' => $super_vip,
        'vip_plus' => $vip_plus,
        'vip' => $vip
    ]);
});



Route::get('/models/{makeId}', [CarController::class, 'getModelsByMake']);

Route::resource('posts', \App\Http\Controllers\PostController::class);
