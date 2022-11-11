<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
//use View;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
 
        View::composer('*', function($view)
        {

            $categories = Category::orderBy('created_at', 'DESC')->get();
            $posts = Movie::withCount('comments')->having('comments_count', '>', 5)->take(3)->get();
            $view->with('categories', $categories)->with('posts', $posts);
        });
    }
}
