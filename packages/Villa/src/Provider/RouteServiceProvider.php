<?php

namespace Packages\Villa\src\Provider;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->routes(function () {

            Route::middleware('web')
                ->prefix('admin')
                ->name('admin.')
                ->namespace($this->namespace)
                ->group(package_path('Villa', 'routes/admin.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(package_path('Villa','routes/web.php'));
        });
    }

}
