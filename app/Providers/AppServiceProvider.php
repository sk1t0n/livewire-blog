<?php

namespace App\Providers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(PostService::class, function () {
            return new PostService(Post::with('tags'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
