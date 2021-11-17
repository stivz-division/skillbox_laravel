<?php

namespace App\Providers;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        view()->composer('layout.sidebar', function (View $view) {
            $view->with('cloudTags', Tag::get());
        });

        Blade::if('admin', function () {
            return auth()->user()->isAdmin();
        });
    }
}
