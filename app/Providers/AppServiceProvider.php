<?php

namespace App\Providers;

use App\Info;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
        Schema::defaultStringLength(191);
        Paginator::useBootstrapThree();
        Blade::withoutDoubleEncoding();
        Carbon::setLocale('es'); 
        try {
            $info = Info::find(1);
            view()->share('school_info', $info);
        } catch (\Throwable $th) {
            //throw $th;
        }
       
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
