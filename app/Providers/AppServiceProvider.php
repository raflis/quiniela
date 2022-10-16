<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use App\Models\Admin\PageField;
use Illuminate\Pagination\Paginator;
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
        /*$this->app->bind('path.public',function(){
            return'/u842821089/domains/mned.online/public_html';
        });*/

        Carbon::setUTF8(true);
        Carbon::setLocale(config('app.locale'));
        setlocale(LC_ALL, 'es_MX', 'es', 'ES', 'es_MX.utf8');

        /*view()->composer('web.partials.footer',function($view){
            $view->with('pagefield', PageField::find(1));
        });*/

        Paginator::useBootstrap();
    }
}
