<?php

namespace App\Providers;

use App\Category;
use App\Comment;
use App\Post;
use App\Slider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('pages._sidebar', function ($view) {
            $view->with('popularPosts', Post::getPopularPosts());
            $view->with('featuredPosts', Post::getFeaturedPosts());
            $view->with('recentPosts', Post::getRecentPosts());
            $view->with('categories', Category::all());
        });

        view()->composer('admin._sidebar', function ($view) {
            $view->with('newCommentsCount', Comment::where('status', 0)->count());
        });

        view()->composer('partials.footslider', function ($view) {
            $view->with('getSliders', Slider::getSliders());
        });
    }
}
