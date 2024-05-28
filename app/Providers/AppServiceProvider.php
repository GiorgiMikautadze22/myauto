<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\Gate::define('edit-post', function (User $user, Post $post){
            return $post->user->is($user);
        });
    }
}
