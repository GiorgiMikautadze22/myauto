<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $super_vip = Role::find(1)->post;
    $vip_plus = Role::find(2)->post;
    $vip = Role::find(3)->post;

    $brands = Brand::all();
    $models = Car::all();

    $query = Post::query();

    if (request()->filled('make')) {
        $query->where('make', 'like', '%' . request()->input('make') . '%');
    }
    if (request()->filled('model')) {
        $query->where('model', 'like', '%' . request()->input('model') . '%');
    }
    if (request()->filled('year_min')) {
        $query->where('year', '>=', request()->input('year_min'));
    }
    if (request()->filled('year_max')) {
        $query->where('year', '<=', request()->input('year_max'));
    }
    if (request()->filled('price_min')) {
        $query->where('price', '>=', request()->input('price_min'));
    }
    if (request()->filled('price_max')) {
        $query->where('price', '<=', request()->input('price_max'));
    }

    $posts = $query->paginate(12);
    $recently_added = Post::orderBy('created_at', 'desc')->take(6)->get();

    return view('home', [
        'posts' => $posts,
        'super_vip' => $super_vip,
        'vip_plus' => $vip_plus,
        'vip' => $vip,
        'brands' => $brands,
        'models' => $models,
        'recently_added' => $recently_added
    ]);
});

Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
Route::post('/posts/{post}/unlike', [PostController::class, 'unlike'])->name('posts.unlike');


Route::get('/models/{makeId}', [CarController::class, 'getModelsByMake']);
Route::get('/filter-cars/{brand}', [CarController::class, 'getModelsForFilter']);


//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/my-applications', function () {
    $user = User::find(Auth::user()->id);
    $posts = $user->post;

    return view('my-application', ['posts' => $posts]);
});

Route::get('/favorites', function (){

    $user = User::find(Auth::user()->id);
    $posts = $user->likes;


    return view('favorites', ['posts' => $posts]);
});

Route::delete('/my-applications/{post}', function (Post $post) {


    $post->delete();

    return redirect('/my-applications');

});


Route::resource('posts', PostController::class)->middleware('auth')->except(['show']);
Route::get('posts/{post}', [PostController::class, 'show']);
