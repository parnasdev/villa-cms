<?php


namespace packages\Villa\src\Provider;

use Illuminate\Support\ServiceProvider;
use PrsModules\Vila\src\Command\VilaInstall;
use PrsModules\Vila\src\Repository\Admin\ResidenceInterface;
use PrsModules\Vila\src\Repository\Admin\ResidenceService;
use PrsModules\Vila\src\Repository\Admin\ResidenceSpecificationInterface;
use PrsModules\Vila\src\Repository\Admin\ResidenceSpecificationService;

class VilaServiceProvider extends  ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(getModulePath('Vila') . 'Database/Migrations');

        $this->publishes([
            getModulePath('Vila') . 'config/vila.php' => config_path('vila.php'),
        ], 'config');

        $this->mergeConfigFrom(
            getModulePath('Vila') . 'config/vila.php', "vila"
        );

        $this->app->router->group([
            'namespace' => 'PrsModules\Vila\src\Controllers',
            'prefix' => 'v1/vila'
        ], function ($router) {
            require __DIR__.'/../routes/web.php';
            require __DIR__.'/../routes/admin.php';
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                VilaInstall::class,
            ]);
        }

        $this->app->bind(ResidenceInterface::class  , ResidenceService::class);
        $this->app->bind(ResidenceSpecificationInterface::class  , ResidenceSpecificationService::class);
    }

}
