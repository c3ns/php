<?php

namespace App\Providers;

use App\Categorie;
use App\Page;
use App\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        $max_id = Page::max('id');
        $page = Page::find($max_id);
        $pages_count = Page::count();

        $cat = Categorie::get();
        $cat_count = [];
        foreach ($cat as $c){
            $count = Page::where('category_id', $c['id'])->count();
            array_push($cat_count, $count);
        }


        View::share('all_categories', $cat);
        View::share('pages_count', $pages_count);
        View::share('latest_page', $page);
        View::share('cat_count', $cat_count);

        Schema::defaultStringLength(191);
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
