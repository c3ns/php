<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cat = Category::orderBy('position', 'ASC')->get();
        $cat_count = [];
        foreach ($cat as $c){
            $count = Post::where('category', $c->id)->count();
            array_push($cat_count, $count);
        }



        Schema::defaultStringLength(191);

        View::share('cat_list', $cat);
        View::share('cat_count', $cat_count);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
