<?php

namespace App\Providers;

use App\general_setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        if (env('APP_ENV') == 'production'){
            URL::forceScheme('https');
        }


        Schema::defaultStringLength(191);
        $gn = general_setting::first();
        view()->share('gn',  $gn);
    }
}
