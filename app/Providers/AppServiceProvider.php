<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     *
     * 后执行
     */
    public function boot()
    {
        //       767/4=191
        Schema::defaultStringLength(191);
        Blade::component('components.alert','alert');
//        Blade::withoutDoubleEncoding();
        DB::listen(function ($query){
            $query->sql;
        });

        \View::composer('layout.sidebar',function ($view){

            $topics=\App\Topic::all();
            $view->with('topics',$topics);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     *
     * 先执行
     */
    public function register()
    {
        //
    }
}
