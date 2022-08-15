<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
        $categorys = Category::take(5)->get();
        View::share('categorys',$categorys);

        $setting = setting::first();
        View::share('setting',$setting);

    }
}
