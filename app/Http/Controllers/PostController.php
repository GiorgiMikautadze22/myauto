<?php

namespace App\Http\Controllers;

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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
