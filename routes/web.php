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
        $query->where('year', '>=', request()->input('year'));
    }
    if (request()->filled('price')) {
        $query->where('price', '<=', request()->input('price'));
    }

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


//Auth
Route::get('/register', [\App\Http\Controllers\RegisteredUserController::class, 'create']);
Route::post('/register', [\App\Http\Controllers\RegisteredUserController::class, 'store']);

Route::get('/login', [\App\Http\Controllers\SessionController::class, 'create'])->name('login');
Route::post('/login', [\App\Http\Controllers\SessionController::class, 'store']);
Route::post('/logout', [\App\Http\Controllers\SessionController::class, 'destroy']);

Route::get('/my-applications', function (){
    $user = \App\Models\User::find(\Illuminate\Support\Facades\Auth::user()->id);
    $posts = $user->post;

    return view('my-application', ['posts' => $posts]);
});

Route::delete('/my-applications/{post}', function (\App\Models\Post $post){


    $post->delete();

    return redirect('/my-applications');

});


Route::resource('posts', \App\Http\Controllers\PostController::class)->middleware('auth')->except(['show']);
Route::get('posts/{post}', [\App\Http\Controllers\PostController::class, 'show']);
