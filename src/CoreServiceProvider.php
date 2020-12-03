<?php

namespace Resto2web\Core;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;
use Resto2web\Core\Common\Middlewares\WebsiteActive;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'core');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'resto2web');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/resto2web/core.php' => config_path('resto2web/core.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/core'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/core'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/core'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);

        }
        $kernel = $this->app->make(Kernel::class);
        $kernel->pushMiddleware(WebsiteActive::class);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/resto2web/core.php', 'resto2web.core');

        // Register the main class to use with the facade
        $this->app->singleton('core', function () {
            return new Core;
        });
    }
}
