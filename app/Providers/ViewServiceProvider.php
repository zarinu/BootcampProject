<?php

namespace App\Providers;


use App\Models\Category;
use Illuminate\Support\Facades\View;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // define global by cluser
        View::composer(['partials.sideBar','userAds.category'], function ($view) {
            $view->with('categories', Category::all());

        });
    }
}
