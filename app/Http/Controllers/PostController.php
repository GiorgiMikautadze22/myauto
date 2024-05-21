<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Upon searching

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //creating a post
        $models = Car::all();
        $brands = Brand::all();
        $categories = [
            "Sedan",
            "SUV",
            "Coupe",
            "Convertible",
            "Hatchback",
            "Wagon",
            "Pickup Truck",
            "Minivan",
            "Sports Car",
            "Luxury Car",
            "Electric Car",
            "Hybrid Car",
            "Diesel Car",
            "Crossover",
            "Compact Car",
            "Subcompact Car"
        ];


//        $brand_models = Brand::find()

        return view('posts.create', ['models' => $models, 'brands' => $brands, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'make' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer'],
            'color' => ['required', 'string', 'max:255'],
            'mileage' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'fuel_type' => ['required', 'string', 'max:255'],
            'transmission' => ['required', 'string', 'max:255'],
            'role_id' => ['required'],
            'description' => ['required', 'string', 'max:2000']
        ]);

        Post::create([
            'make' => $request->input('make'),
            'model' => $request->input('model'),
            'category' => $request->input('category'),
            'year' => $request->input('year'),
            'color' => $request->input('color'),
            'mileage' => $request->input('mileage'),
            'price' => $request->input('price'),
            'fuel_type' => $request->input('fuel_type'),
            'transmission' => $request->input('transmission'),
            'role_id' => $request->input('role_id'),
            'description' => $request->input('description'),
        ]);

        return redirect("");
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //display single post
        return view('posts.show', ['post' => $post]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //edit post
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //send edited post
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //delete
    }
}
