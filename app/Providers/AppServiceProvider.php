<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Blade;
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
        // http://i.imgur.com/bXahP6S.jpg
        Schema::defaultStringLength(191);

        Blade::directive('activeRequest', function($route) {
            return "<?php echo strpos(request()->route()->getName(), {$route}) === 0 ? 'active' : ''; ?>";
        });

        Blade::directive('activeRequestUri', function($route) {
            return "<?php echo request()->is({$route}) ? 'active' : ''; ?>";
        });
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
