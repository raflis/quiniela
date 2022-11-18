<?php

namespace App\Providers;

use App\Models\Admin\Slider;
use Illuminate\Support\Carbon;
use App\Models\Admin\PageField;
use Illuminate\Support\Facades\URL;
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

        if(env('FORCE_HTTPS', true)) {
            URL::forceScheme('https');
        }

        Carbon::setUTF8(true);
        Carbon::setLocale(config('app.locale'));
        setlocale(LC_ALL, 'es_MX', 'es', 'ES', 'es_MX.utf8');

        view()->composer('web.partials.header',function($view){
            $view->with([
                'pagefield' => PageField::find(1),
                'sliders' => Slider::where('draft', 0)->orderBy('order', 'Asc')->get()
            ]);
        });

        view()->composer('web.partials.footer',function($view){
            $view->with('pagefield', PageField::find(1));
        });

        Paginator::useBootstrap();
    }
}
