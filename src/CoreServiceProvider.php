<?php

namespace Resto2web\Core;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Resto2web\Core\Admin\Middleware\AdminMiddleware;
use Resto2web\Core\Admin\Middleware\AdminSeoMiddleware;
use Resto2web\Core\Console\Commands\PublishAdminAssets;
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
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('admin', AdminMiddleware::class);
        $router->aliasMiddleware('admin-seo', AdminSeoMiddleware::class);

        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'core');
        $this->loadViewsFrom(__DIR__.'/../resources/views/app', 'resto2web');
        $this->loadViewsFrom(__DIR__.'/../resources/views/auth', 'resto2web-auth');
        $this->loadViewsFrom(__DIR__.'/../resources/views/admin', 'resto2web-admin');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/auth.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/admin.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/resto2web/core.php' => config_path('resto2web/core.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/core'),
            ], 'views');*/

            // Publishing assets.
            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/core'),
            ], 'assets');

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/core'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                PublishAdminAssets::class
            ]);

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

        $this->app->singleton('Resto2WebGuard', function () {
            return config('auth.defaults.guard', 'web');
        });
    }

}
