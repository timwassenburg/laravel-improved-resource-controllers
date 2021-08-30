<?php

namespace TimWassenburg\ImprovedResourceControllers;

use Illuminate\Foundation\Providers\ArtisanServiceProvider;

class ImprovedResourceControllersServiceProvider extends ArtisanServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->mergeConfigFrom(__DIR__.'/../config/crud.php', 'crud');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../stubs' => resource_path('stubs'),
            ], 'stubs');

            $this->publishes([
                __DIR__ . '/../config/crud.php' => config_path('crud.php'),
            ], 'config');
        }
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerControllerMakeCommand()
    {
        $this->app->singleton('command.controller.make', function ($app) {
            return new ControllerCrudCommand($app['files']);
        });
    }
}
